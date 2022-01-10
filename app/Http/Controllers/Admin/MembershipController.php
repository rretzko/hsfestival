<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MembershipController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('membership_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership.index');
    }

    public function create()
    {
        abort_if(Gate::denies('membership_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership.create');
    }

    public function edit(Membership $membership)
    {
        abort_if(Gate::denies('membership_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.membership.edit', compact('membership'));
    }

    public function show(Membership $membership)
    {
        abort_if(Gate::denies('membership_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $membership->load('user', 'membershiptype');

        return view('admin.membership.show', compact('membership'));
    }
}
