@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.membership.title_singular') }}:
                    {{ trans('cruds.membership.fields.id') }}
                    {{ $membership->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.membership.fields.id') }}
                            </th>
                            <td>
                                {{ $membership->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membership.fields.user') }}
                            </th>
                            <td>
                                @if($membership->user)
                                    <span class="badge badge-relationship">{{ $membership->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membership.fields.org') }}
                            </th>
                            <td>
                                {{ $membership->org }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membership.fields.expiration_date') }}
                            </th>
                            <td>
                                {{ $membership->expiration_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membership.fields.membershiptype') }}
                            </th>
                            <td>
                                @if($membership->membershiptype)
                                    <span class="badge badge-relationship">{{ $membership->membershiptype->org ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('membership_edit')
                    <a href="{{ route('admin.memberships.edit', $membership) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.memberships.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection