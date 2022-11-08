<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Event;
use App\Models\Sightreading;
use Illuminate\Http\Request;

class SightreadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.sightreadings.index', [
            'event' => CurrentEvent::currentEvent(),
            'examples' => auth()->user()->sightreadings,
            'sightreadings' => Sightreading::orderByDesc('year_of')->get(),
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $inputs = $request->validate([
            'sightreadings' => ['nullable','array'],
            'sightreadings.*' =>['nullable', 'numeric'],
        ]);

        if($request['sightreadings']) {
            auth()->user()->sightreadings()->sync($request['sightreadings']);
        }else{
            auth()->user()->sightreadings()->detach();
        }

        return $this->index();
    }

}
