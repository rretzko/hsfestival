<?php

namespace App\Http\Controllers\Eventmanagement\Scheduling;

use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Ensemble;
use App\Models\EnsembleVenueAssignment;
use App\Models\Timeslot;
use App\Models\Venue;
use Illuminate\Http\Request;

class TimeslotController extends Controller
{
    public function index()
    {
        $eventId = CurrentEvent::currentEvent()->id;

        return view('eventmanagement.scheduling.timeslots.index',
            [
                'assignments' => EnsembleVenueAssignment::where('event_id', $eventId)->get(),
                'ensembles' => Ensemble::where('event_id',$eventId)->get()->sortBy(['school.name','name']),
                'timeslots' => Timeslot::where('duration',20)->orderBy('order_by')->get(),
                'venues' => Venue::where('event_id',$eventId)->get()->sortBy('start'),
            ]);
    }

    public function update(Request $request)
    {
        $eventId = CurrentEvent::currentEvent()->id;

        $inputs = $request->validate([
            'ensemble_id' => ['required', 'numeric','exists:ensembles,id'],
            'venue_id' => ['required','numeric','exists:venues,id'],
            'timeslot_id' => ['required','numeric', 'exists:timeslots,id'],
        ]);

        EnsembleVenueAssignment::updateOrCreate(
            [
                'ensemble_id' => $inputs['ensemble_id'],
                'venue_id' => $inputs['venue_id'],
                'event_id' => $eventId,
            ],
            [
                'timeslot_id' => $inputs['timeslot_id'],
            ]
        );

        return $this->index();
    }
}
