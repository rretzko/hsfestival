<?php

namespace App\Http\Livewire\Ensemble;

use App\Models\Ensemble;
use App\Models\Ensembletype;
use App\Models\Event;
use App\Models\School;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Ensemble $ensemble;

    public array $listsForFields = [];

    public function mount(Ensemble $ensemble)
    {
        $this->ensemble             = $ensemble;
        $this->ensemble->auditioned = false;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.ensemble.create');
    }

    public function submit()
    {
        $this->validate();

        $this->ensemble->save();

        return redirect()->route('admin.ensembles.index');
    }

    protected function rules(): array
    {
        return [
            'ensemble.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'ensemble.school_id' => [
                'integer',
                'exists:schools,id',
                'required',
            ],
            'ensemble.event_id' => [
                'integer',
                'exists:events,id',
                'required',
            ],
            'ensemble.name' => [
                'string',
                'required',
            ],
            'ensemble.conductor' => [
                'string',
                'required',
            ],
            'ensemble.ensembletype_id' => [
                'integer',
                'exists:ensembletypes,id',
                'required',
            ],
            'ensemble.auditioned' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();
        $this->listsForFields['school']       = School::pluck('name', 'id')->toArray();
        $this->listsForFields['event']        = Event::pluck('name', 'id')->toArray();
        $this->listsForFields['ensembletype'] = Ensembletype::pluck('descr', 'id')->toArray();
    }
}
