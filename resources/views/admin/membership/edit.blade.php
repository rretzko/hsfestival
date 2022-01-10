@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.membership.title_singular') }}:
                    {{ trans('cruds.membership.fields.id') }}
                    {{ $membership->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('membership.edit', [$membership])
        </div>
    </div>
</div>
@endsection