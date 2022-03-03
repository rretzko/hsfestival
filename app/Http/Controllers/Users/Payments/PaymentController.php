<?php

namespace App\Http\Controllers\Users\Payments;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Barryvdh\DomPDF\Facade AS PDF;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::currentEvent();
        return view('users.payments.index',compact('event'));
    }

    /**
     * Download invoice pdf
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        $event = Event::currentEvent();
        $filename = 'hsf_invoice_'.date('Ymd_Gis',strtotime('NOW')).'.pdf';
        $schoolid = auth()->user()->school->id;

        $invoiceid = $event->id.'_'.auth()->id().'_'.$schoolid.'_hsf';

        $pdf = PDF::loadView('users.pdfs.invoice',
            compact('invoiceid', 'event'))
            ->setPaper('letter','portrait');

        return $pdf->download($filename);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
