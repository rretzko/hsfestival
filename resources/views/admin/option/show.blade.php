@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.option.title_singular') }}:
                    {{ trans('cruds.option.fields.id') }}
                    {{ $option->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.id') }}
                            </th>
                            <td>
                                {{ $option->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.optiontype') }}
                            </th>
                            <td>
                                @if($option->optiontype)
                                    <span class="badge badge-relationship">{{ $option->optiontype->descr ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.descr') }}
                            </th>
                            <td>
                                {{ $option->descr }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.label_default') }}
                            </th>
                            <td>
                                {{ $option->label_default }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.option.fields.label_alternate') }}
                            </th>
                            <td>
                                {{ $option->label_alternate }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('option_edit')
                    <a href="{{ route('admin.options.edit', $option) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.options.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection