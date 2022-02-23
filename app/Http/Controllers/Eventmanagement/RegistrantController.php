<?php

namespace App\Http\Controllers\Eventmanagement;

use App\Exports\RegistrantsExport;
use App\Http\Controllers\Controller;
use App\Models\Ensembletype;
use App\Models\Event;
use App\Models\Option;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RegistrantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Venue $venue = null)
    {
        return view('eventmanagement.registrants.index',
            [
                'event' => Event::currentEvent(),
                'users' => User::excludeBots($venue),
                'venues' => Venue::orderBy('start')->get(),
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
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('eventmanagement.registrants.edit',
            [
                'ensembletypes' => Ensembletype::all(),
                'event' => Event::currentEvent(),
                'options' => Option::all(),
                'user' => $user,
                'useroptions' => $user->useroptions,
                'venues' => Venue::orderBy('start')->get(),
            ]);
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

    public function download()
    {

        $registrants = User::excludeBots();

        $datetime = date('Ynd_Gis');

        return Excel::download(new RegistrantsExport, 'registrants_'.$datetime.'.csv');
    }
}
