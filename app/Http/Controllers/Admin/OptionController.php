<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.option.index');
    }

    public function create()
    {
        abort_if(Gate::denies('option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.option.create');
    }

    public function edit(Option $option)
    {
        abort_if(Gate::denies('option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.option.edit', compact('option'));
    }

    public function show(Option $option)
    {
        abort_if(Gate::denies('option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $option->load('optiontype');

        return view('admin.option.show', compact('option'));
    }
}
