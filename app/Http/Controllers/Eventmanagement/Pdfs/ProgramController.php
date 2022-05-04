<?php

namespace App\Http\Controllers\Eventmanagement\Pdfs;

use App\Http\Controllers\Controller;
use App\Models\Ensemble;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf AS PDF;

class ProgramController extends Controller
{
    public function pdf()
    {
        $event = Event::currentEvent();
        $ensemble = new Ensemble;
        $ensembles = $ensemble->performanceOrder($event);

        $pdf = PDF::loadView('eventmanagement.pdfs.program',
            compact('event','ensembles'));

        return $pdf->download('highschoolfestivalprogram.pdf');
        /*
        $registrants = \App\Models\Registrant::where('eventversion_id', $eventversion->id)
            ->where('registranttype_id', \App\Models\Registranttype::REGISTERED)
            ->where('school_id', Userconfig::getValue('school', auth()->id()))
            ->get()
            ->sortBy('student.person.last');

        $score = new \App\Models\Score;

        $scoresummary = new \App\Models\Scoresummary;

        //ex. pages.pdfs.applications.12.64.application
        $pdf = \Barryvdh\DomPDF\Facade::loadView('pdfs.auditionresults.'//9.65.2021_22_application',
            . $eventversion->event->id
            .'.'
            . $eventversion->id
            . '.auditionresults',
            //.applicationTest',
            compact('eventversion', 'registrants','score','scoresummary'));


        return $pdf->download('auditionresults_'.str_replace(' ','_',$eventversion->short_name).'.pdf');
*/
    }
}
