<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membershiptype;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MembershiptypeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membershiptype_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membershiptype.index');
    }

    public function create()
    {
        abort_if(Gate::denies('membershiptype_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membershiptype.create');
    }

    public function edit(Membershiptype $membershiptype)
    {
        abort_if(Gate::denies('membershiptype_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membershiptype.edit', compact('membershiptype'));
    }

    public function show(Membershiptype $membershiptype)
    {
        abort_if(Gate::denies('membershiptype_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membershiptype.show', compact('membershiptype'));
    }
}
