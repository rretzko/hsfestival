@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.cart.title_singular') }}:
                    {{ trans('cruds.cart.fields.id') }}
                    {{ $cart->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('cart.edit', [$cart])
        </div>
    </div>
</div>
@endsection