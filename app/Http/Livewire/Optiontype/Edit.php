<?php

namespace App\Http\Livewire\Optiontype;

use App\Models\Optiontype;
use Livewire\Component;

class Edit extends Component
{
    public Optiontype $optiontype;

    public function mount(Optiontype $optiontype)
    {
        $this->optiontype = $optiontype;
    }

    public function render()
    {
        return view('livewire.optiontype.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->optiontype->save();

        return redirect()->route('admin.optiontypes.index');
    }

    protected function rules(): array
    {
        return [
            'optiontype.descr' => [
                'string',
                'required',
            ],
        ];
    }
}
