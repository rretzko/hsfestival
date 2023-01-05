<?php

namespace App\Http\Controllers\Eventmanagement\Sightreadings;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Sightreadings\SightreadingPayment;
use App\Models\User;
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
        $users = User::orderBy('name')->get();
        $schools = School::orderBy('name')->get();
        $payments = SightreadingPayment::orderByDesc('updated_at')->get();

        return view('eventmanagement.sightreadings.payments.index',
            compact('payments', 'schools', 'users')
        );
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
        $inputs = $request->validate(
            [
                'amount' => ['required','integer'],
                'school_id' => ['required','integer','exists:schools,id'],
                'user_id' => ['required','integer','exists:users,id'],
                'vendor_id' => ['nullable','string'],
            ]
        );

        SightreadingPayment::create($inputs);

        session()->flash('success','The $'.$inputs['amount'].' has been recorded.');

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
