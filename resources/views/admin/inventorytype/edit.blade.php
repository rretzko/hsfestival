@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.inventorytype.title_singular') }}:
                    {{ trans('cruds.inventorytype.fields.id') }}
                    {{ $inventorytype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('inventorytype.edit', [$inventorytype])
        </div>
    </div>
</div>
@endsection