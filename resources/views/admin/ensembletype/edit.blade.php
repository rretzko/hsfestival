@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.ensembletype.title_singular') }}:
                    {{ trans('cruds.ensembletype.fields.id') }}
                    {{ $ensembletype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('ensembletype.edit', [$ensembletype])
        </div>
    </div>
</div>
@endsection