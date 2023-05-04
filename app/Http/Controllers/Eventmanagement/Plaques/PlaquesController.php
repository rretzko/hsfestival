<?php

namespace App\Http\Controllers\EventManagement\Plaques;

use App\Exports\PlaquesExport;
use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Ensemble;
use App\Models\Sightreadings\SightreadingOrder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PlaquesController extends Controller
{
    public function index()
    {
        $plaques = $this->dtoPlaques();

        return view('eventmanagement.plaques.index', compact('plaques'));
    }

    public function export()
    {
        return Excel::download(new PlaquesExport($this->dtoPlaques()), 'plaques.csv');
    }

    private function dtoPlaques(): array
    {
        $a = [];

        $ensembles = Ensemble::with('school')
            ->where('event_id', CurrentEvent::currentEvent()->id)
            ->get()
            ->sortBy(['school.name','ensemble.name']);

        $ndx = 1;

        foreach($ensembles AS $ensemble){

            $a[] = [
                'ndx' => $ndx,
                'ensembleName' => $ensemble->name,
                'schoolName' => $ensemble->school->name,
                'conductor' => $ensemble->conductor,
            ];

            $ndx++;
        }

        return $a;
    }
}
