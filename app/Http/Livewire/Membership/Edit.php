<?php

namespace App\Http\Livewire\Membership;

use App\Models\Membership;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Membership $membership;

    public array $listsForFields = [];

    public function mount(Membership $membership)
    {
        $this->membership = $membership;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.membership.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->membership->save();

        return redirect()->route('admin.memberships.index');
    }

    protected function rules(): array
    {
        return [
            'membership.user_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'membership.org' => [
                'string',
                'required',
            ],
            'membership.expiration_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'membership.membershiptype_id' => [
                'integer',
                'exists:memberships,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']           = User::pluck('name', 'id')->toArray();
        $this->listsForFields['membershiptype'] = Membership::pluck('org', 'id')->toArray();
    }
}
