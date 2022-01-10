@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.school.title_singular') }}:
                    {{ trans('cruds.school.fields.id') }}
                    {{ $school->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.id') }}
                            </th>
                            <td>
                                {{ $school->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.user') }}
                            </th>
                            <td>
                                @if($school->user)
                                    <span class="badge badge-relationship">{{ $school->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.name') }}
                            </th>
                            <td>
                                {{ $school->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.address_1') }}
                            </th>
                            <td>
                                {{ $school->address_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.address_2') }}
                            </th>
                            <td>
                                {{ $school->address_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.city') }}
                            </th>
                            <td>
                                {{ $school->city }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.state_abbr') }}
                            </th>
                            <td>
                                {{ $school->state_abbr }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.school.fields.postal_code') }}
                            </th>
                            <td>
                                {{ $school->postal_code }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('school_edit')
                    <a href="{{ route('admin.schools.edit', $school) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.schools.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection