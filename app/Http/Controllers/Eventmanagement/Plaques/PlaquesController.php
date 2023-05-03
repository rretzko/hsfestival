<?php

namespace App\Http\Controllers\EventManagement\Plaques;

use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Ensemble;
use App\Models\Sightreadings\SightreadingOrder;
use Illuminate\Http\Request;

class PlaquesController extends Controller
{
    public function index()
    {
        $plaques = $this->dtoPlaques();

        return view('eventmanagement.plaques.index', compact('plaques'));
    }

    public function export()
    {

    }

    private function dtoPlaques(): array
    {
        $a = [];
        $ensembles = Ensemble::with('school')
            ->where('event_id', CurrentEvent::currentEvent()->id)
            ->get()
            ->sortBy(['school.name','ensemble.name']);

        foreach($ensembles AS $ensemble){

            $a[] = [
                'ensembleName' => $ensemble->name,
                'conductor' => $ensemble->conductor,
                'schoolId' => $ensemble->school_id,
                'schoolName' => $ensemble->school->name,
            ];
        }

        return $a;
    }
}
