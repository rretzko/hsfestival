<?php

namespace App\Http\Livewire\Inventorytype;

use App\Models\Inventorytype;
use Livewire\Component;

class Create extends Component
{
    public Inventorytype $inventorytype;

    public function mount(Inventorytype $inventorytype)
    {
        $this->inventorytype = $inventorytype;
    }

    public function render()
    {
        return view('livewire.inventorytype.create');
    }

    public function submit()
    {
        $this->validate();

        $this->inventorytype->save();

        return redirect()->route('admin.inventorytypes.index');
    }

    protected function rules(): array
    {
        return [
            'inventorytype.descr' => [
                'string',
                'required',
            ],
        ];
    }
}
