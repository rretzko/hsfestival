<?php

namespace App\Http\Livewire\Option;

use App\Models\Option;
use App\Models\Optiontype;
use Livewire\Component;

class Edit extends Component
{
    public Option $option;

    public array $listsForFields = [];

    public function mount(Option $option)
    {
        $this->option = $option;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.option.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->option->save();

        return redirect()->route('admin.options.index');
    }

    protected function rules(): array
    {
        return [
            'option.optiontype_id' => [
                'integer',
                'exists:optiontypes,id',
                'required',
            ],
            'option.descr' => [
                'string',
                'required',
            ],
            'option.label_default' => [
                'string',
                'required',
            ],
            'option.label_alternate' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['optiontype'] = Optiontype::pluck('descr', 'id')->toArray();
    }
}
