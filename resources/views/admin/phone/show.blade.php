@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.phone.title_singular') }}:
                    {{ trans('cruds.phone.fields.id') }}
                    {{ $phone->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.phone.fields.id') }}
                            </th>
                            <td>
                                {{ $phone->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.phone.fields.user') }}
                            </th>
                            <td>
                                @if($phone->user)
                                    <span class="badge badge-relationship">{{ $phone->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.phone.fields.phonetype') }}
                            </th>
                            <td>
                                @if($phone->phonetype)
                                    <span class="badge badge-relationship">{{ $phone->phonetype->descr ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.phone.fields.phone') }}
                            </th>
                            <td>
                                {{ $phone->phone }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('phone_edit')
                    <a href="{{ route('admin.phones.edit', $phone) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.phones.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection