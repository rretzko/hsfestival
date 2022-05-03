<?php

namespace App\Http\Controllers\Eventmanagement;

use App\Http\Controllers\Controller;
use App\Models\Adjudicator;
use App\Models\Event;
use Illuminate\Http\Request;

class AdjudicatorController extends Controller
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
        $adjudicators = Adjudicator::orderBy('last')->orderBy('first')->get();
        $currentevent = Event::currentEvent();

        return view('eventmanagement.adjudicators.create',
        compact('adjudicators','currentevent'));
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
                'first' => ['string','required'],
                'last' => ['string','required'],
                'title' => ['string','nullable'],
                'from' => ['string','nullable'],
            ]
        );

        $adjudicator = Adjudicator::create($inputs);

        $adjudicator->events()->attach(Event::currentEvent());

        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adjudicator  $adjudicator
     * @return \Illuminate\Http\Response
     */
    public function show(Adjudicator $adjudicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adjudicator  $adjudicator
     * @return \Illuminate\Http\Response
     */
    public function edit(Adjudicator $adjudicator)
    {
        $adjudicators = Adjudicator::orderBy('last')->orderBy('first')->get();
        $currentevent = Event::currentEvent();

        return view('eventmanagement.adjudicators.edit',
            compact('adjudicator', 'adjudicators', 'currentevent')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adjudicator  $adjudicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adjudicator $adjudicator)
    {
        $inputs = $request->validate(
            [
                'first' => ['string','required'],
                'last' => ['string','required'],
                'title' => ['string','nullable'],
                'from' => ['string','nullable'],
            ]
        );

        $adjudicator->update($inputs);

        return $this->create();
    }

    /**
     * Attach the specified resource to the current event
     *
     * @param  \App\Models\Adjudicator  $adjudicator
     * @return \Illuminate\Http\Response
     */
    public function attach(Adjudicator $adjudicator)
    {
        $current = Event::currentEvent();

        if(! $adjudicator->events->contains($current)) {
            $adjudicator->events()->attach($current->id);
        }

        return $this->create();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adjudicator  $adjudicator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adjudicator $adjudicator)
    {
        $adjudicator->events()->detach();

        $adjudicator->delete();

        return $this->create();
    }
}
