<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Ensemble;
use App\Models\Useroption;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ensembles = Ensemble::where('user_id', auth()->id())
            ->where('school_id', auth()->user()->school->id)
            ->get();

        $assignment = false;
        foreach($ensembles AS $ensemble){
            if($ensemble->ensembleVenueAssignmentDescr !== 'Pending'){

                $assignment = true;
            }
        }

        return view('users.home',
            [
                'assignment' => $assignment,
                'ensembles' => $ensembles,
                'event' => CurrentEvent::currentEvent(),
                'useroptions' => Useroption::where('user_id', auth()->id())
                    ->where('event_id', CurrentEvent::currentEvent()->id)
                    ->get(),
            ]
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
