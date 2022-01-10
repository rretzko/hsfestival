@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.repertoire.title_singular') }}:
                    {{ trans('cruds.repertoire.fields.id') }}
                    {{ $repertoire->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.id') }}
                            </th>
                            <td>
                                {{ $repertoire->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.event') }}
                            </th>
                            <td>
                                @if($repertoire->event)
                                    <span class="badge badge-relationship">{{ $repertoire->event->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.ensemble') }}
                            </th>
                            <td>
                                @if($repertoire->ensemble)
                                    <span class="badge badge-relationship">{{ $repertoire->ensemble->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.title') }}
                            </th>
                            <td>
                                {{ $repertoire->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.subtitle') }}
                            </th>
                            <td>
                                {{ $repertoire->subtitle }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.duration') }}
                            </th>
                            <td>
                                {{ $repertoire->duration }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.movements') }}
                            </th>
                            <td>
                                {{ $repertoire->movements }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.composer') }}
                            </th>
                            <td>
                                {{ $repertoire->composer }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.arranger') }}
                            </th>
                            <td>
                                {{ $repertoire->arranger }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.lyricist') }}
                            </th>
                            <td>
                                {{ $repertoire->lyricist }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.choreographer') }}
                            </th>
                            <td>
                                {{ $repertoire->choreographer }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.repertoire.fields.comments') }}
                            </th>
                            <td>
                                {{ $repertoire->comments }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('repertoire_edit')
                    <a href="{{ route('admin.repertoires.edit', $repertoire) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.repertoires.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection