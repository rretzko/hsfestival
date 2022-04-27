<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Vaccination;
use App\Models\Vaccinationtype;
use Illuminate\Http\Request;

class Covid19Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.covid19.create',
        [
            'vaccinations' => Vaccination::where('school_id',auth()->user()->school->id)
                ->where('event_id', Event::currentEvent()->id)
                ->orderBy('last')
                ->orderBy('first')
                ->get(),
            'vaccinationtypes' => Vaccinationtype::all(),
        ]);
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
                'first' => ['required', 'string'],
                'last' => ['required', 'string'],
                'vaccinationtype_id' => ['required', 'numeric', 'exists:vaccinationtypes,id'],
            ]
        );

        $inputs['event_id'] = Event::currentEvent()->id;
        $inputs['school_id'] = auth()->user()->school->id;

        Vaccination::create($inputs);

        return $this->create();
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
     * @param  App\Models\Vaccination $vaccination
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccination $vaccination)
    {
        return view('users.covid19.edit',
            [
                'vaccination' => $vaccination,
                'vaccinations' => Vaccination::where('school_id',auth()->user()->school->id)
                    ->where('event_id', Event::currentEvent()->id)
                    ->orderBy('last')
                    ->orderBy('first')
                    ->get(),
                'vaccinationtypes' => Vaccinationtype::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaccination $vaccination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaccination $vaccination)
    {
        $inputs = $request->validate(
            [
                'first' => ['required', 'string'],
                'last' => ['required', 'string'],
                'vaccinationtype_id' => ['required', 'numeric', 'exists:vaccinationtypes,id'],
            ]
        );

        $inputs['event_id'] = Event::currentEvent()->id;
        $inputs['school_id'] = auth()->user()->school->id;

        $vaccination->update($inputs);

        return $this->create();
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
