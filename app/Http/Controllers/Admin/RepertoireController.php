<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repertoire;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RepertoireController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('repertoire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.repertoire.index');
    }

    public function create()
    {
        abort_if(Gate::denies('repertoire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.repertoire.create');
    }

    public function edit(Repertoire $repertoire)
    {
        abort_if(Gate::denies('repertoire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.repertoire.edit', compact('repertoire'));
    }

    public function show(Repertoire $repertoire)
    {
        abort_if(Gate::denies('repertoire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $repertoire->load('event', 'ensemble');

        return view('admin.repertoire.show', compact('repertoire'));
    }
}
