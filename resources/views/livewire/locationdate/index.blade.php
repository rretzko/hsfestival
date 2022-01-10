<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('locationdate_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Locationdate" format="csv" />
                <livewire:excel-export model="Locationdate" format="xlsx" />
                <livewire:excel-export model="Locationdate" format="pdf" />
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
                            {{ trans('cruds.locationdate.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.locationdate.fields.location') }}
                            @include('components.table.sort', ['field' => 'location.name'])
                        </th>
                        <th>
                            {{ trans('cruds.locationdate.fields.event') }}
                            @include('components.table.sort', ['field' => 'event.name'])
                        </th>
                        <th>
                            {{ trans('cruds.locationdate.fields.start_datetime') }}
                            @include('components.table.sort', ['field' => 'start_datetime'])
                        </th>
                        <th>
                            {{ trans('cruds.locationdate.fields.end_datetime') }}
                            @include('components.table.sort', ['field' => 'end_datetime'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($locationdates as $locationdate)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $locationdate->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $locationdate->id }}
                            </td>
                            <td>
                                @if($locationdate->location)
                                    <span class="badge badge-relationship">{{ $locationdate->location->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($locationdate->event)
                                    <span class="badge badge-relationship">{{ $locationdate->event->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $locationdate->start_datetime }}
                            </td>
                            <td>
                                {{ $locationdate->end_datetime }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('locationdate_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.locationdates.show', $locationdate) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('locationdate_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.locationdates.edit', $locationdate) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('locationdate_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $locationdate->id }})" wire:loading.attr="disabled">
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
            {{ $locationdates->links() }}
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