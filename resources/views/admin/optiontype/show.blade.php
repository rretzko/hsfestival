@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.optiontype.title_singular') }}:
                    {{ trans('cruds.optiontype.fields.id') }}
                    {{ $optiontype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.optiontype.fields.id') }}
                            </th>
                            <td>
                                {{ $optiontype->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.optiontype.fields.descr') }}
                            </th>
                            <td>
                                {{ $optiontype->descr }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('optiontype_edit')
                    <a href="{{ route('admin.optiontypes.edit', $optiontype) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.optiontypes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection