<?php

namespace App\Http\Controllers\Eventmanagement\Pdfs;

use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Ensemble;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;

class ProgramController extends Controller
{
    public function pdf()
    {
        $event = CurrentEvent::currentEvent();
        $ensemble = new Ensemble;
        $ensembles = $ensemble->performanceOrder($event);
dd($ensemble->performanceOrder($event)->where('id',31));
        $pdf = PDF::loadView('eventmanagement.pdfs.program',
            compact('event','ensembles'));

        return $pdf->download('highschoolfestivalprogram.pdf');

    }
}
