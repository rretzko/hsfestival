<?php

namespace App\Http\Livewire\Membershiptype;

use App\Models\Membershiptype;
use Livewire\Component;

class Edit extends Component
{
    public Membershiptype $membershiptype;

    public function mount(Membershiptype $membershiptype)
    {
        $this->membershiptype = $membershiptype;
    }

    public function render()
    {
        return view('livewire.membershiptype.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->membershiptype->save();

        return redirect()->route('admin.membershiptypes.index');
    }

    protected function rules(): array
    {
        return [
            'membershiptype.descr' => [
                'string',
                'required',
            ],
        ];
    }
}
