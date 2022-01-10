<?php

namespace App\Http\Livewire\Repertoire;

use App\Models\Ensemble;
use App\Models\Event;
use App\Models\Repertoire;
use Livewire\Component;

class Create extends Component
{
    public Repertoire $repertoire;

    public array $listsForFields = [];

    public function mount(Repertoire $repertoire)
    {
        $this->repertoire = $repertoire;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.repertoire.create');
    }

    public function submit()
    {
        $this->validate();

        $this->repertoire->save();

        return redirect()->route('admin.repertoires.index');
    }

    protected function rules(): array
    {
        return [
            'repertoire.event_id' => [
                'integer',
                'exists:events,id',
                'required',
            ],
            'repertoire.ensemble_id' => [
                'integer',
                'exists:ensembles,id',
                'required',
            ],
            'repertoire.title' => [
                'string',
                'required',
            ],
            'repertoire.subtitle' => [
                'string',
                'nullable',
            ],
            'repertoire.duration' => [
                'required',
                'date_format:' . config('project.time_format'),
            ],
            'repertoire.movements' => [
                'string',
                'nullable',
            ],
            'repertoire.composer' => [
                'string',
                'nullable',
            ],
            'repertoire.arranger' => [
                'string',
                'nullable',
            ],
            'repertoire.lyricist' => [
                'string',
                'nullable',
            ],
            'repertoire.choreographer' => [
                'string',
                'nullable',
            ],
            'repertoire.comments' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['event']    = Event::pluck('name', 'id')->toArray();
        $this->listsForFields['ensemble'] = Ensemble::pluck('name', 'id')->toArray();
    }
}
