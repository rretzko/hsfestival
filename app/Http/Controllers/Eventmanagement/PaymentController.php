<?php

namespace App\Http\Controllers\Eventmanagement;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Payment;
use App\Models\Paymenttype;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('eventmanagement.payments.index',
        [
            'payments' => Payment::where('event_id', Event::currentEvent()->id)->get(),
            'paymenttypes' => Paymenttype::all(),
            'users' => User::excludeBots(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $this->validation($request);

        Payment::create([
            'amount' => $inputs['amount'],
            'comments' => $inputs['comments'],
            'event_id' => Event::currentEvent()->id,
            'paymenttype_id' => $inputs['paymenttype_id'],
            'payment_number' => $inputs['payment_number'],
            'user_id' => $inputs['user_id'],
            'payment_date' => $inputs['payment_date']
        ]);

        return $this->index();
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
     * @param  App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('eventmanagement.payments.edit',
            [
                'payment' => $payment,
                'payments' => Payment::where('event_id', Event::currentEvent()->id)->get(),
                'paymenttypes' => Paymenttype::all(),
                'users' => User::excludeBots(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $inputs = $this->validation($request);

        $payment->update(
            [
                'amount' => $inputs['amount'],
                'comments' => $inputs['comments'],
                'event_id' => Event::currentEvent()->id,
                'paymenttype_id' => $inputs['paymenttype_id'],
                'payment_number' => $inputs['payment_number'],
                'user_id' => $inputs['user_id'],
                'payment_date' => $inputs['payment_date']
            ]);

        return $this->index();
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

    public function export()
    {
        return Excel::download(new \App\Exports\PaymentsExport,'payments.xlsx');
    }

    private function validation(Request $request)
    {
        return $request->validate([
            'amount' => ['required', 'numeric'],
            'comments' => ['nullable', 'string'],
            'paymenttype_id' => ['required', 'numeric', 'exists:paymenttypes,id'],
            'payment_date' => ['required', 'date'],
            'payment_number' => ['nullable', 'string'],
            'user_id' => ['required', 'numeric', 'exists:users,id'],
        ]);
    }
}
