@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.locationdate.title_singular') }}:
                    {{ trans('cruds.locationdate.fields.id') }}
                    {{ $locationdate->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.locationdate.fields.id') }}
                            </th>
                            <td>
                                {{ $locationdate->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.locationdate.fields.location') }}
                            </th>
                            <td>
                                @if($locationdate->location)
                                    <span class="badge badge-relationship">{{ $locationdate->location->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.locationdate.fields.event') }}
                            </th>
                            <td>
                                @if($locationdate->event)
                                    <span class="badge badge-relationship">{{ $locationdate->event->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.locationdate.fields.start_datetime') }}
                            </th>
                            <td>
                                {{ $locationdate->start_datetime }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.locationdate.fields.end_datetime') }}
                            </th>
                            <td>
                                {{ $locationdate->end_datetime }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('locationdate_edit')
                    <a href="{{ route('admin.locationdates.edit', $locationdate) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.locationdates.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection