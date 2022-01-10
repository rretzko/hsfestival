<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventorytype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InventorytypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inventorytype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inventorytype.index');
    }

    public function create()
    {
        abort_if(Gate::denies('inventorytype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inventorytype.create');
    }

    public function edit(Inventorytype $inventorytype)
    {
        abort_if(Gate::denies('inventorytype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inventorytype.edit', compact('inventorytype'));
    }

    public function show(Inventorytype $inventorytype)
    {
        abort_if(Gate::denies('inventorytype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inventorytype.show', compact('inventorytype'));
    }
}
