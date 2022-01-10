<?php

namespace App\Http\Livewire\Repertoire;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Repertoire;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Repertoire())->orderable;
    }

    public function render()
    {
        $query = Repertoire::with(['event', 'ensemble'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $repertoires = $query->paginate($this->perPage);

        return view('livewire.repertoire.index', compact('query', 'repertoires'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('repertoire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Repertoire::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Repertoire $repertoire)
    {
        abort_if(Gate::denies('repertoire_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $repertoire->delete();
    }
}
