<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paymenttype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaymenttypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('paymenttype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymenttype.index');
    }

    public function create()
    {
        abort_if(Gate::denies('paymenttype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymenttype.create');
    }

    public function edit(Paymenttype $paymenttype)
    {
        abort_if(Gate::denies('paymenttype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymenttype.edit', compact('paymenttype'));
    }

    public function show(Paymenttype $paymenttype)
    {
        abort_if(Gate::denies('paymenttype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymenttype.show', compact('paymenttype'));
    }
}
