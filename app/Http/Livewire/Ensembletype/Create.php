<?php

namespace App\Http\Livewire\Ensembletype;

use App\Models\Ensembletype;
use Livewire\Component;

class Create extends Component
{
    public Ensembletype $ensembletype;

    public function mount(Ensembletype $ensembletype)
    {
        $this->ensembletype = $ensembletype;
    }

    public function render()
    {
        return view('livewire.ensembletype.create');
    }

    public function submit()
    {
        $this->validate();

        $this->ensembletype->save();

        return redirect()->route('admin.ensembletypes.index');
    }

    protected function rules(): array
    {
        return [
            'ensembletype.descr' => [
                'string',
                'required',
            ],
        ];
    }
}
