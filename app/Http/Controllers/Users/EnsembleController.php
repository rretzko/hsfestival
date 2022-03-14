<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Ensemble;
use App\Models\Ensembletype;
use App\Models\Event;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnsembleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.ensembles.index', [
            'ensembles' => Ensemble::where('user_id', auth()->id())
                ->where('event_id', Event::currentEvent()->first()->id)
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.ensembles.create',
            [
                'ensembletypes' => Ensembletype::all(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $this->validateRequest($request);

        $school_id = auth()->user()->school->id;

        if(Ensemble::where('name', $input['name'])->where('school_id', $school_id)->exists()){

            $request->session()->flash('warning', 'Cannot add: '.$input['name'].'.  This name is already in use at '.auth()->user()->school->name.'!');

            return back();

        }else {

            Ensemble::create(
                [
                    'name' => $input['name'],
                    'conductor' => strlen($input['conductor']) ? $input['conductor'] : auth()->user()->name,
                    'auditioned' => isset($input['auditioned']) ?: 0,
                    'user_id' => auth()->id(),
                    'school_id' => $school_id,
                    'event_id' => Event::currentEvent()->id,
                    'ensembletype_id' => $input['ensembletype_id'],
                ]
            );
        }

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
     * @param  \App\Models\Ensemble $ensemble
     * @return \Illuminate\Http\Response
     */
    public function edit(Ensemble $ensemble)
    {
        return view('users.ensembles.edit',
            [
                'ensemble' => $ensemble,
                'ensembletypes' => Ensembletype::all(),
                'venues' => Venue::where('event_id', Event::currentEvent()->id)->orderBy('start')->get(),
                'disabled' => (Carbon::now() > '2022-03-23 23:59:59'),
                'assignment' => $ensemble->ensembleVenueAssignmentDescr
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ensemble $ensemble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ensemble $ensemble)
    {
        $input = $this->validateRequest($request);

        $school_id = auth()->user()->school->id;

        $ensemble->update(
            [
                'name' => $input['name'],
                'conductor' => strlen($input['conductor']) ? $input['conductor'] : auth()->user()->name,
                'auditioned' => isset($input['auditioned']) ?: 0,
                'user_id' => auth()->id(),
                'school_id' => $school_id,
                'event_id' => Event::currentEvent()->id,
                'ensembletype_id' => $input['ensembletype_id'],
                'venue_id' => $input['venue_id'],
            ]
        );

        $request->session()->flash('warning', $input['name'].' has been updated.');

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ensemble $ensemble
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ensemble $ensemble)
    {
        $ensemble->delete();

        return $this->index();
    }

    private function validateRequest(Request $request)
    {
        return $request->validate(
            [
                'auditioned' => ['nullable', 'numeric'],
                'name' => ['required', 'string', 'min:4','max:255'],
                'ensembletype_id' => ['required', 'numeric'],
                'conductor' => ['nullable', 'string'],
                'venue_id' => ['required', 'numeric', 'min:1'],
            ]
        );
    }
}
