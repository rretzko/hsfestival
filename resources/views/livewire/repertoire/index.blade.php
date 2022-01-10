<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('repertoire_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Repertoire" format="csv" />
                <livewire:excel-export model="Repertoire" format="xlsx" />
                <livewire:excel-export model="Repertoire" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.repertoire.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.event') }}
                            @include('components.table.sort', ['field' => 'event.name'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.ensemble') }}
                            @include('components.table.sort', ['field' => 'ensemble.name'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.subtitle') }}
                            @include('components.table.sort', ['field' => 'subtitle'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.duration') }}
                            @include('components.table.sort', ['field' => 'duration'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.movements') }}
                            @include('components.table.sort', ['field' => 'movements'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.composer') }}
                            @include('components.table.sort', ['field' => 'composer'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.arranger') }}
                            @include('components.table.sort', ['field' => 'arranger'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.lyricist') }}
                            @include('components.table.sort', ['field' => 'lyricist'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.choreographer') }}
                            @include('components.table.sort', ['field' => 'choreographer'])
                        </th>
                        <th>
                            {{ trans('cruds.repertoire.fields.comments') }}
                            @include('components.table.sort', ['field' => 'comments'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($repertoires as $repertoire)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $repertoire->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $repertoire->id }}
                            </td>
                            <td>
                                @if($repertoire->event)
                                    <span class="badge badge-relationship">{{ $repertoire->event->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($repertoire->ensemble)
                                    <span class="badge badge-relationship">{{ $repertoire->ensemble->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $repertoire->title }}
                            </td>
                            <td>
                                {{ $repertoire->subtitle }}
                            </td>
                            <td>
                                {{ $repertoire->duration }}
                            </td>
                            <td>
                                {{ $repertoire->movements }}
                            </td>
                            <td>
                                {{ $repertoire->composer }}
                            </td>
                            <td>
                                {{ $repertoire->arranger }}
                            </td>
                            <td>
                                {{ $repertoire->lyricist }}
                            </td>
                            <td>
                                {{ $repertoire->choreographer }}
                            </td>
                            <td>
                                {{ $repertoire->comments }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('repertoire_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.repertoires.show', $repertoire) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('repertoire_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.repertoires.edit', $repertoire) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('repertoire_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $repertoire->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $repertoires->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush