@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.inventory.title_singular') }}:
                    {{ trans('cruds.inventory.fields.id') }}
                    {{ $inventory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.inventory.fields.id') }}
                            </th>
                            <td>
                                {{ $inventory->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inventory.fields.inventorytype') }}
                            </th>
                            <td>
                                @if($inventory->inventorytype)
                                    <span class="badge badge-relationship">{{ $inventory->inventorytype->descr ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inventory.fields.name') }}
                            </th>
                            <td>
                                {{ $inventory->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inventory.fields.price') }}
                            </th>
                            <td>
                                {{ $inventory->price }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.inventory.fields.order_by') }}
                            </th>
                            <td>
                                {{ $inventory->order_by }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('inventory_edit')
                    <a href="{{ route('admin.inventories.edit', $inventory) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.inventories.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection