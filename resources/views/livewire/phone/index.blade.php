<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('phone_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Phone" format="csv" />
                <livewire:excel-export model="Phone" format="xlsx" />
                <livewire:excel-export model="Phone" format="pdf" />
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
                            {{ trans('cruds.phone.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.phone.fields.user') }}
                            @include('components.table.sort', ['field' => 'user.name'])
                        </th>
                        <th>
                            {{ trans('cruds.phone.fields.phonetype') }}
                            @include('components.table.sort', ['field' => 'phonetype.descr'])
                        </th>
                        <th>
                            {{ trans('cruds.phone.fields.phone') }}
                            @include('components.table.sort', ['field' => 'phone'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($phones as $phone)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $phone->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $phone->id }}
                            </td>
                            <td>
                                @if($phone->user)
                                    <span class="badge badge-relationship">{{ $phone->user->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($phone->phonetype)
                                    <span class="badge badge-relationship">{{ $phone->phonetype->descr ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $phone->phone }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('phone_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.phones.show', $phone) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('phone_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.phones.edit', $phone) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('phone_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $phone->id }})" wire:loading.attr="disabled">
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
            {{ $phones->links() }}
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