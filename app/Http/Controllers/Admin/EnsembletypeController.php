<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ensembletype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsembletypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ensembletype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ensembletype.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ensembletype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ensembletype.create');
    }

    public function edit(Ensembletype $ensembletype)
    {
        abort_if(Gate::denies('ensembletype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ensembletype.edit', compact('ensembletype'));
    }

    public function show(Ensembletype $ensembletype)
    {
        abort_if(Gate::denies('ensembletype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ensembletype.show', compact('ensembletype'));
    }
}
