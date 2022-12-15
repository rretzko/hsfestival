<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Event;
use App\Models\Sightreading;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SightreadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.sightreadings.index', [
            'event' => CurrentEvent::currentEvent(),
            'examples' => auth()->user()->sightreadings,
            'sightreadings' => Sightreading::orderByDesc('year_of')->get(),
            'school' => auth()->user()->school,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validation
        $inputs = $request->validate([
            'sightreadings' => ['nullable','array'],
            'sightreadings.*' =>['nullable', 'numeric'],
        ]);

        //store sightreadings
        if($request['sightreadings']) {
            auth()->user()->sightreadings()->attach($request['sightreadings']);
        }else{
            auth()->user()->sightreadings()->detach();
        }

        //download pdf invoice/quote
        $pdf = $this->pdf($request['sightreadings']);

        //email requested docs
        $this->emailSightReadingAttachments($request['sightreadings'], $pdf);

        session()->flash('sent', 'Please check your email for the requested sight reading samples.');

        return $this->index();
    }

    /** END OF PUBLIC FUNCTIONS **************************************************/

    private function emailSightReadingAttachments(array $sightreadings, $pdf): void
    {
        $data = [];
        $data['email'] = 'rick@mfrholdings.com';
        $data['title'] = 'Requested Sight Reading Materials';
        $data['body'] = '';

        $files = [];
        foreach($sightreadings AS $sightreading){

            $sr = Sightreading::find($sightreading);

            $path = 'assets/sightreadings/'.$sr->year_of.'.pdf';

            $files[] = public_path($path);
        }

        Mail::send('emails.sightReadingEmail', $data, function($message) use($data, $files, $pdf){
           $message->to($data['email'], $data['email'])
           ->subject($data['title']);

           foreach($files AS $file){
               $message->attach($file);
           }

           $message->attachData($pdf->output(), 'invoice_quote.pdf');

        });
    }

    public function pdf(array $sightreadings)
    {
        $event = CurrentEvent::currentEvent();
        $filename = 'sightreadings_invoice_quote_'.date('Ymd_Gis').'.pdf';
        $invoiceid = $event->id.'_'.date('Ynd_Gis');
        $pdfs = Sightreading::find($sightreadings);
        $payment_due = (count($sightreadings) * 50);

        $pdf = PDF::loadView('users.sightreadings.pdfs.invoiceQuote',
            compact('event','invoiceid','payment_due', 'pdfs', 'sightreadings'));

        return $pdf;
    }
}
