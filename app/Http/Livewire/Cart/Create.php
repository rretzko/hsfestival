<?php

namespace App\Http\Livewire\Cart;

use App\Models\Cart;
use App\Models\Event;
use App\Models\Inventory;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public Cart $cart;

    public array $listsForFields = [];

    public function mount(Cart $cart)
    {
        $this->cart = $cart;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.cart.create');
    }

    public function submit()
    {
        $this->validate();

        $this->cart->save();

        return redirect()->route('admin.carts.index');
    }

    protected function rules(): array
    {
        return [
            'cart.event_id' => [
                'integer',
                'exists:events,id',
                'required',
            ],
            'cart.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'cart.inventory_id' => [
                'integer',
                'exists:inventories,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['event']     = Event::pluck('name', 'id')->toArray();
        $this->listsForFields['user']      = User::pluck('name', 'id')->toArray();
        $this->listsForFields['inventory'] = Inventory::pluck('name', 'id')->toArray();
    }
}
