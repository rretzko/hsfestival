@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.inventorytype.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('inventorytype_create')
                    <a class="btn btn-indigo" href="{{ route('admin.inventorytypes.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.inventorytype.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('inventorytype.index')

    </div>
</div>
@endsection