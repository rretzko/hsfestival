<?php

namespace App\Http\Controllers\Eventmanagement\Scheduling;

use App\Http\Controllers\Controller;
use App\Models\Ensemble;
use App\Models\EnsembleVenueAssignment;
use App\Models\Venue;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function index()
    {
        return view('eventmanagement.scheduling.days.index',
            [
                'assignments' => EnsembleVenueAssignment::all(),
                'ensembles' => Ensemble::all()->sortBy(['school.name','name']),
                'venues' => Venue::all()->sortBy('start'),
            ]);
    }

    public function update(Request $request)
    {
        $inputs = $request->validate([
            'ensemble_id' => ['required', 'numeric','exists:ensembles,id'],
            'venue_id' => ['required','numeric','exists:venues,id'],
        ]);

        $timeslot = EnsembleVenueAssignment::where('ensemble_id', $inputs['ensemble_id'])->exists()
            ? EnsembleVenueAssignment::where('ensemble_id', $inputs['ensemble_id'])->first()->timeslot
            : '00:00';

        \App\Models\EnsembleVenueAssignment::updateOrCreate(
            [
                'ensemble_id' => $inputs['ensemble_id'],
            ],
            [
                'venue_id' => $inputs['venue_id'],
                'timeslot' => $timeslot,
            ]
        );

        return $this->index();
    }
}
