<?php

namespace App\Http\Livewire\Phonetype;

use App\Models\Phonetype;
use Livewire\Component;

class Create extends Component
{
    public Phonetype $phonetype;

    public function mount(Phonetype $phonetype)
    {
        $this->phonetype = $phonetype;
    }

    public function render()
    {
        return view('livewire.phonetype.create');
    }

    public function submit()
    {
        $this->validate();

        $this->phonetype->save();

        return redirect()->route('admin.phonetypes.index');
    }

    protected function rules(): array
    {
        return [
            'phonetype.descr' => [
                'string',
                'required',
            ],
        ];
    }
}
