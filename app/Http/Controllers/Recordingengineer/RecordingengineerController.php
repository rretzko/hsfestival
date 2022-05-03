<?php

namespace App\Http\Controllers\Recordingengineer;

use App\Http\Controllers\Controller;
use App\Models\Adjudication;
use App\Models\Adjudicator;
use App\Models\Ensemble;
use App\Models\Event;
use App\Models\School;
use Illuminate\Http\Request;

class RecordingengineerController extends Controller
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
        $adjudications = Adjudication::where('event_id',Event::currentEvent()->id)->get();
        $adjudicators = Adjudicator::orderBy('last')->orderBy('first')->get();
        $ensembles = Ensemble::orderBy('name')->get();
        $schools = School::orderBy('name')->get();

        return view('recordingengineer.create',
            compact('adjudications', 'adjudicators', 'ensembles', 'schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mssg = '';
        $inputs = $request->validate([
           'school_id' => ['required', 'numeric', 'exists:schools,id'],
           'ensemble_id' => ['required', 'numeric', 'exists:ensembles,id'],
           'adjudicator_id' => ['required', 'numeric', 'exists:adjudicators,id'],
           'part' => ['required', 'numeric', 'min:1','max:10'],
        ]);

        if(! Adjudication::where('school_id', $inputs['school_id'])
            ->where('ensemble_id', $inputs['ensemble_id'])
            ->where('adjudicator_id', $inputs['adjudicator_id'])
            ->where('part', $inputs['part'])
            ->exists())
        { //continue storing the file

            $file = $request->file('recording');
            $hashname = $file->hashName();
            $directory = 'adjudications_2022/'
                . $request['school_id'] . '/'
                . $request['ensemble_id'] . '/'
                . $request['adjudicator_id'] . '/'
                . $request['part'] . '/';

            $path = $directory . $hashname;

            $file->storePublicly($path, 'spaces');

            \App\Models\Adjudication::create(
                [
                    'event_id' => Event::currentEvent()->id,
                    'school_id' => $inputs['school_id'],
                    'ensemble_id' => $inputs['ensemble_id'],
                    'adjudicator_id' => $inputs['adjudicator_id'],
                    'part' => $inputs['part'],
                    'path' => $path,
                ]
            );

            return $this->create();

        }else{

            $request->session()->flash('duplicate-record', 'This record is already stored!  Please check the details and try again...');

            return back();
        }


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
     * @param  \App\Models\Adjudication $adjudication
     * @return \Illuminate\Http\Response
     */
    public function edit(Adjudication $adjudication)
    {
        $adjudications = Adjudication::where('event_id',Event::currentEvent()->id)->get();
        $adjudicators = Adjudicator::orderBy('last')->orderBy('first')->get();
        $ensembles = Ensemble::orderBy('name')->get();
        $schools = School::orderBy('name')->get();

        return view('recordingengineer.edit',
            compact('adjudication', 'adjudications', 'adjudicators', 'ensembles', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adjudication $adjudication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adjudication $adjudication)
    {
        $inputs = $request->validate([
            'school_id' => ['required', 'numeric', 'exists:schools,id'],
            'ensemble_id' => ['required', 'numeric', 'exists:ensembles,id'],
            'adjudicator_id' => ['required', 'numeric', 'exists:adjudicators,id'],
            'part' => ['required', 'numeric', 'min:1','max:10'],
        ]);

        $adjudication->update($inputs);

        return $this->create();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adjudication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adjudication $adjudication)
    {
        $adjudication->delete();

        return $this->create();
    }
}
