<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phonetype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhonetypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('phonetype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.phonetype.index');
    }

    public function create()
    {
        abort_if(Gate::denies('phonetype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.phonetype.create');
    }

    public function edit(Phonetype $phonetype)
    {
        abort_if(Gate::denies('phonetype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.phonetype.edit', compact('phonetype'));
    }

    public function show(Phonetype $phonetype)
    {
        abort_if(Gate::denies('phonetype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.phonetype.show', compact('phonetype'));
    }
}
