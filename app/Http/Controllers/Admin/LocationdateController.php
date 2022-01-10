<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Locationdate;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LocationdateController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('locationdate_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.locationdate.index');
    }

    public function create()
    {
        abort_if(Gate::denies('locationdate_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.locationdate.create');
    }

    public function edit(Locationdate $locationdate)
    {
        abort_if(Gate::denies('locationdate_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.locationdate.edit', compact('locationdate'));
    }

    public function show(Locationdate $locationdate)
    {
        abort_if(Gate::denies('locationdate_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locationdate->load('location', 'event');

        return view('admin.locationdate.show', compact('locationdate'));
    }
}
