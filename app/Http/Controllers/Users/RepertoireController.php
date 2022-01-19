<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepertoireRequest;
use App\Models\Ensemble;
use App\Models\Ensembletype;
use App\Models\Event;
use App\Models\Repertoire;
use App\Traits\DurationTrait;
use Illuminate\Http\Request;

class RepertoireController extends Controller
{
    use DurationTrait;

    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Ensemble $ensemble
     * @return \Illuminate\Http\Response
     */
    public function index(Ensemble $ensemble)
    {
        return view('users.repertoire.index', [
            'ensemble' => $ensemble,
            'event' => Event::currentEvent()->first(),
            'repertoire' => Repertoire::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Event $event
     * @param  \App\Models\Ensemble $ensemble
     * @return \Illuminate\Http\Response
     */
    public function create(Event $event, Ensemble $ensemble)
    {
        return view('users.repertoire.create',
            [
                'durations' => $this->duration(),
                'ensemble' => $ensemble,
                'event' => $event,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event $event
     * @param  \App\Models\Ensemble $ensemble
     * @return \Illuminate\Http\Response
     */
    public function store(RepertoireRequest $request, Event $event, Ensemble $ensemble)
    {
        Repertoire::create(
            [
                'title' => $request['title'],
                'subtitle' => $request['subtitle'],
                'duration' => $request['duration'],
                'event_id' => $event->id,
                'ensemble_id' => $ensemble->id,
                'movements' => $request['movements'],
                'composer' => $request['composer'],
                'arranger' => $request['arranger'],
                'lyricist' => $request['lyricist'],
                'choreographer' => $request['choreographer'],
                'comments' => $request['comments'],
            ]
        );

        return $this->index($ensemble);
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
     * @param  \App\Models\Repertoire $repertoire
     * @return \Illuminate\Http\Response
     */
    public function edit(Repertoire $repertoire)
    {
        return view('users.repertoire.edit',
            [
                'durations' => $this->duration(),
                'ensemble' => Ensemble::find($repertoire->ensemble->id),
                'ensembletypes' => Ensembletype::all(),
                'repertoire' => $repertoire,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repertoire $repertoire
     * @return \Illuminate\Http\Response
     */
    public function update(RepertoireRequest $request, Repertoire $repertoire)
    {
        $repertoire->update($request->all());

        return $this->index(Ensemble::find($repertoire->ensemble_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Repertoire $repertoire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repertoire $repertoire)
    {
        $ensembleid = $repertoire->ensemble->id;

        $repertoire->delete();

        return $this->index(Ensemble::find($ensembleid));
    }
}
