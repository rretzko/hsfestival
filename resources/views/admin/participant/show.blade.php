@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.participant.title_singular') }}:
                    {{ trans('cruds.participant.fields.id') }}
                    {{ $participant->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.participant.fields.id') }}
                            </th>
                            <td>
                                {{ $participant->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.participant.fields.user') }}
                            </th>
                            <td>
                                @if($participant->user)
                                    <span class="badge badge-relationship">{{ $participant->user->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.participant.fields.event') }}
                            </th>
                            <td>
                                @if($participant->event)
                                    <span class="badge badge-relationship">{{ $participant->event->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.participant.fields.locationdate') }}
                            </th>
                            <td>
                                @if($participant->locationdate)
                                    <span class="badge badge-relationship">{{ $participant->locationdate->start_datetime ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.participant.fields.photo') }}
                            </th>
                            <td>
                                @foreach($participant->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['preview_thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('participant_edit')
                    <a href="{{ route('admin.participants.edit', $participant) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.participants.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection