<?php

namespace App\Http\Controllers\Eventmanagement;

use App\Exports\RegistrantsExport;
use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
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
        $event = CurrentEvent::currentEvent();

        return view('eventmanagement.registrants.index',
            [
                'event' => $event,
                'users' => CurrentEvent::users($venue),
                'venues' => Venue::where('event_id', $event->id)->orderBy('start')->get(),
            ]);
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

    public function download()
    {
        $registrants = CurrentEvent::users(); //User::excludeBots();

        $datetime = date('Ynd_Gis');

        return Excel::download(new RegistrantsExport, 'registrants_'.$datetime.'.csv');
    }
}
