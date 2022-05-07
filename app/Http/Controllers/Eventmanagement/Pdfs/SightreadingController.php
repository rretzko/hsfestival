<?php

namespace App\Http\Controllers\Eventmanagement\Pdfs;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Sightreading;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class SightreadingController extends Controller
{
    public function pdf()
    {
        $event = Event::currentEvent();
        $sightreading = new Sightreading;
        $orders = $sightreading->eventOrders($event);

        $filename = 'sightreadingOrders_'.date('Ymd_Gis').'.pdf';

        $pdf = PDF::loadView('eventmanagement.pdfs.sightreadings',
            compact('event','orders'));

        return $pdf->download($filename);

    }
}
