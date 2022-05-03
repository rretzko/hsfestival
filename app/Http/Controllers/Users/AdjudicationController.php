<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Adjudication;
use App\Models\Event;
use Illuminate\Http\Request;

class AdjudicationController extends Controller
{
    public function index()
    {
        $adjudications = Adjudication::where('school_id', auth()->user()->school->id)
            ->where('event_id', Event::currentEvent()->id)
            ->get();

        return view('users.adjudications.index',
            compact('adjudications'));
    }
}
