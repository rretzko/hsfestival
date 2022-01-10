@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.paymenttype.title_singular') }}:
                    {{ trans('cruds.paymenttype.fields.id') }}
                    {{ $paymenttype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('paymenttype.edit', [$paymenttype])
        </div>
    </div>
</div>
@endsection