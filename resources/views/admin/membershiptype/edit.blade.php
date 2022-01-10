@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.membershiptype.title_singular') }}:
                    {{ trans('cruds.membershiptype.fields.id') }}
                    {{ $membershiptype->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('membershiptype.edit', [$membershiptype])
        </div>
    </div>
</div>
@endsection