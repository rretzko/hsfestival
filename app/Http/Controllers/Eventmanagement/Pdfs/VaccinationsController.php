<?php

namespace App\Http\Controllers\Eventmanagement\Pdfs;

use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Event;
use App\Models\Vaccination;
use App\Models\Vaccinationtype;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class VaccinationsController extends Controller
{
    public function pdf()
    {
        $event = CurrentEvent::currentEvent();
        $service = new \App\Services\VaccinationTablesService($event);
        $vaccinationtables = $service->tables();
        $filename = 'vaccinations_'.date('Ymd_Gis').'.pdf';

        $pdf = PDF::loadView('eventmanagement.pdfs.vaccinations',
            compact('event','vaccinationtables'));

        return $pdf->download($filename);

    }
}
