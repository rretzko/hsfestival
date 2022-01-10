<?php

namespace App\Http\Livewire\Phone;

use App\Models\Phone;
use App\Models\Phonetype;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Phone $phone;

    public array $listsForFields = [];

    public function mount(Phone $phone)
    {
        $this->phone = $phone;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.phone.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->phone->save();

        return redirect()->route('admin.phones.index');
    }

    protected function rules(): array
    {
        return [
            'phone.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'phone.phonetype_id' => [
                'integer',
                'exists:phonetypes,id',
                'required',
            ],
            'phone.phone' => [
                'string',
                'min:14',
                'max:24',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']      = User::pluck('name', 'id')->toArray();
        $this->listsForFields['phonetype'] = Phonetype::pluck('descr', 'id')->toArray();
    }
}
