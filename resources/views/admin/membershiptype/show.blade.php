@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.membershiptype.title_singular') }}:
                    {{ trans('cruds.membershiptype.fields.id') }}
                    {{ $membershiptype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.membershiptype.fields.id') }}
                            </th>
                            <td>
                                {{ $membershiptype->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.membershiptype.fields.descr') }}
                            </th>
                            <td>
                                {{ $membershiptype->descr }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('membershiptype_edit')
                    <a href="{{ route('admin.membershiptypes.edit', $membershiptype) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.membershiptypes.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection