<?php

namespace App\Http\Controllers\Eventmanagement\Sightreadings;

use App\Exports\SightreadingOrdersExport;
use App\Http\Controllers\Controller;
use App\Models\CurrentEvent;
use App\Models\Event;
use App\Models\Sightreading;
use App\Models\Sightreadings\SightreadingOrder;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SightreadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = SightreadingOrder::all();

        return view('eventmanagement.sightreadings.index', compact('orders'));
    }

    public function export()
    {
        return Excel::download(new SightreadingOrdersExport, 'sightReadingOrders.csv');
    }

    public function pdf()
    {
        $event = CurrentEvent::currentEvent();
        $orders = SightreadingOrder::orderByDesc('updated_at')->get();

        $filename = 'sightreadingOrders_'.date('Ymd_Gis').'.pdf';

        $pdf = PDF::loadView('eventmanagement.pdfs.sightreadings',
            compact('event', 'orders'));

        return $pdf->download($filename);
    }
}
