@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.phonetype.title_singular') }}:
                    {{ trans('cruds.phonetype.fields.id') }}
                    {{ $phonetype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.phonetype.fields.id') }}
                            </th>
                            <td>
                                {{ $phonetype->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.phonetype.fields.descr') }}
                            </th>
                            <td>
                                {{ $phonetype->descr }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('phonetype_edit')
                    <a href="{{ route('admin.phonetypes.edit', $phonetype) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.phonetypes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection