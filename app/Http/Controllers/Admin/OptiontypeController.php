<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Optiontype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OptiontypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('optiontype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.optiontype.index');
    }

    public function create()
    {
        abort_if(Gate::denies('optiontype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.optiontype.create');
    }

    public function edit(Optiontype $optiontype)
    {
        abort_if(Gate::denies('optiontype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.optiontype.edit', compact('optiontype'));
    }

    public function show(Optiontype $optiontype)
    {
        abort_if(Gate::denies('optiontype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.optiontype.show', compact('optiontype'));
    }
}
