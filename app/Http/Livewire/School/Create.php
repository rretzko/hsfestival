<?php

namespace App\Http\Livewire\School;

use App\Models\School;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{
    public School $school;

    public array $listsForFields = [];

    public function mount(School $school)
    {
        $this->school             = $school;
        $this->school->state_abbr = 'NJ';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.school.create');
    }

    public function submit()
    {
        $this->validate();

        $this->school->save();

        return redirect()->route('admin.schools.index');
    }

    protected function rules(): array
    {
        return [
            'school.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'school.name' => [
                'string',
                'required',
            ],
            'school.address_1' => [
                'string',
                'nullable',
            ],
            'school.address_2' => [
                'string',
                'nullable',
            ],
            'school.city' => [
                'string',
                'nullable',
            ],
            'school.state_abbr' => [
                'string',
                'min:2',
                'max:2',
                'required',
            ],
            'school.postal_code' => [
                'string',
                'min:5',
                'max:10',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user'] = User::pluck('name', 'id')->toArray();
    }
}
