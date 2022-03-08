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
        return view('eventmanagement.scheduling.timeslots.index',
            [
                'assignments' => EnsembleVenueAssignment::all(),
                'ensembles' => Ensemble::all()->sortBy(['school.name','name']),
                'timeslots' => $this->timeslots(),
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

    public function timeslots()
    {
        return [
            '8:00','8:20','8:40',
            '9:00','9:20','9:40',
            '10:00','10:20','10:40',
            '11:00','11:20','11:40',
            '12:00','12:20','12:40',
            '1:00','1:20','1:40',
            '2:00','2:20','2:40',
            '3:00','3:20','3:40',
            '4:00','4:20','4:40',
            '5:00','5:20','5:40',
            '6:00','6:20','6:40',
        ];
    }
}
