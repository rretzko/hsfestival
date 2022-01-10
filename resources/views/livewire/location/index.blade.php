<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('location_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Location" format="csv" />
                <livewire:excel-export model="Location" format="xlsx" />
                <livewire:excel-export model="Location" format="pdf" />
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
                            {{ trans('cruds.location.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.event') }}
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.address_1') }}
                            @include('components.table.sort', ['field' => 'address_1'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.address_2') }}
                            @include('components.table.sort', ['field' => 'address_2'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.city') }}
                            @include('components.table.sort', ['field' => 'city'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.state_abbr') }}
                            @include('components.table.sort', ['field' => 'state_abbr'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.postal_code') }}
                            @include('components.table.sort', ['field' => 'postal_code'])
                        </th>
                        <th>
                            {{ trans('cruds.location.fields.map_link') }}
                            @include('components.table.sort', ['field' => 'map_link'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($locations as $location)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $location->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $location->id }}
                            </td>
                            <td>
                                @foreach($location->event as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $location->name }}
                            </td>
                            <td>
                                {{ $location->address_1 }}
                            </td>
                            <td>
                                {{ $location->address_2 }}
                            </td>
                            <td>
                                {{ $location->city }}
                            </td>
                            <td>
                                {{ $location->state_abbr }}
                            </td>
                            <td>
                                {{ $location->postal_code }}
                            </td>
                            <td>
                                {{ $location->map_link }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('location_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.locations.show', $location) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('location_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.locations.edit', $location) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('location_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $location->id }})" wire:loading.attr="disabled">
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
            {{ $locations->links() }}
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