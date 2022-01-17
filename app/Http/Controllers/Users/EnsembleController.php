<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Ensemble;
use App\Models\Ensembletype;
use App\Models\Event;
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
            'ensembles' => Ensemble::all(),
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
        $input = $request->validate(
            [
                'auditioned' => ['nullable', 'numeric'],
                'name' => ['required', 'string', 'min:4','max:255'],
                'ensembletype_id' => ['required', 'numeric'],
                'conductor' => ['nullable', 'string'],
            ]
        );

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
