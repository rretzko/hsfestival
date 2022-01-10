@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.ensemble.title_singular') }}:
                    {{ trans('cruds.ensemble.fields.id') }}
                    {{ $ensemble->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.ensemble.fields.id') }}
                            </th>
                            <td>
                                {{ $ensemble->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ensemble.fields.user') }}
                            </th>
                            <td>
                                @if($ensemble->user)
                                    <span class="badge badge-relationship">{{ $ensemble->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ensemble.fields.school') }}
                            </th>
                            <td>
                                @if($ensemble->school)
                                    <span class="badge badge-relationship">{{ $ensemble->school->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ensemble.fields.event') }}
                            </th>
                            <td>
                                @if($ensemble->event)
                                    <span class="badge badge-relationship">{{ $ensemble->event->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ensemble.fields.name') }}
                            </th>
                            <td>
                                {{ $ensemble->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ensemble.fields.conductor') }}
                            </th>
                            <td>
                                {{ $ensemble->conductor }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ensemble.fields.ensembletype') }}
                            </th>
                            <td>
                                @if($ensemble->ensembletype)
                                    <span class="badge badge-relationship">{{ $ensemble->ensembletype->descr ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.ensemble.fields.auditioned') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $ensemble->auditioned ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('ensemble_edit')
                    <a href="{{ route('admin.ensembles.edit', $ensemble) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.ensembles.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection