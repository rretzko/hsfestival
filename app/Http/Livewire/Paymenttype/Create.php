<?php

namespace App\Http\Livewire\Paymenttype;

use App\Models\Paymenttype;
use Livewire\Component;

class Create extends Component
{
    public Paymenttype $paymenttype;

    public function mount(Paymenttype $paymenttype)
    {
        $this->paymenttype = $paymenttype;
    }

    public function render()
    {
        return view('livewire.paymenttype.create');
    }

    public function submit()
    {
        $this->validate();

        $this->paymenttype->save();

        return redirect()->route('admin.paymenttypes.index');
    }

    protected function rules(): array
    {
        return [
            'paymenttype.descr' => [
                'string',
                'required',
            ],
        ];
    }
}
