<?php

namespace App\Http\Controllers\Eventmanagement\Scheduling;

use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Ensemble;
use App\Models\EnsembleVenueAssignment;
use App\Models\Venue;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        $eventId = CurrentEvent::currentEvent()->id;

        return view('eventmanagement.scheduling.days.index',
            [
                'assignments' => EnsembleVenueAssignment::where('event_id', $eventId)->get(),
                'ensembles' => Ensemble::where('event_id', $eventId)
                    ->get()
                    ->sortBy(['school.name','name']),
                'venues' => Venue::where('event_id', $eventId)->get()->sortBy('start'),
            ]);
    }

    public function update(Request $request)
    {
        $eventId = CurrentEvent::currentEvent()->id;

        $inputs = $request->validate([
           'ensemble_id' => ['required', 'numeric','exists:ensembles,id'],
           'venue_id' => ['required','numeric','exists:venues,id'],
        ]);

        $timeslot_id = EnsembleVenueAssignment::where('ensemble_id', $inputs['ensemble_id'])
                ->where('event_id', $eventId)
                ->exists()
            ? EnsembleVenueAssignment::where('ensemble_id', $inputs['ensemble_id'])->first()->timeslot_id
            : 1;

        \App\Models\EnsembleVenueAssignment::updateOrCreate(
            [
                'ensemble_id' => $inputs['ensemble_id'],
            ],
            [
                'event_id' => $eventId,
                'venue_id' => $inputs['venue_id'],
                'timeslot_id' => $timeslot_id,
            ]
        );

        return $this->index();
    }
}
