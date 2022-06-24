<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Adjudication;
use App\Models\Event;
use App\Services\AdjudicationsTable;
use Illuminate\Http\Request;

class AdjudicationController extends Controller
{
    public function index()
    {
        $service = new AdjudicationsTable(auth()->user()->school);
        $table = $service->table();

        return view('users.adjudications.index',
            compact('table'));
    }
}
