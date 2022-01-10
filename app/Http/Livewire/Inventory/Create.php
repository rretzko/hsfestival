<?php

namespace App\Http\Livewire\Inventory;

use App\Models\Inventory;
use App\Models\Inventorytype;
use Livewire\Component;

class Create extends Component
{
    public Inventory $inventory;

    public array $listsForFields = [];

    public function mount(Inventory $inventory)
    {
        $this->inventory           = $inventory;
        $this->inventory->price    = '40.00';
        $this->inventory->order_by = '1';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.inventory.create');
    }

    public function submit()
    {
        $this->validate();

        $this->inventory->save();

        return redirect()->route('admin.inventories.index');
    }

    protected function rules(): array
    {
        return [
            'inventory.inventorytype_id' => [
                'integer',
                'exists:inventorytypes,id',
                'required',
            ],
            'inventory.name' => [
                'string',
                'required',
            ],
            'inventory.price' => [
                'numeric',
                'required',
            ],
            'inventory.order_by' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['inventorytype'] = Inventorytype::pluck('descr', 'id')->toArray();
    }
}
