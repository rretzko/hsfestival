<?php

namespace App\Http\Livewire\Location;

use App\Models\Event;
use App\Models\Location;
use Livewire\Component;

class Create extends Component
{
    public array $event = [];

    public Location $location;

    public array $listsForFields = [];

    public function mount(Location $location)
    {
        $this->location             = $location;
        $this->location->state_abbr = 'NJ';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.location.create');
    }

    public function submit()
    {
        $this->validate();

        $this->location->save();
        $this->location->event()->sync($this->event);

        return redirect()->route('admin.locations.index');
    }

    protected function rules(): array
    {
        return [
            'event' => [
                'required',
                'array',
            ],
            'event.*.id' => [
                'integer',
                'exists:events,id',
            ],
            'location.name' => [
                'string',
                'required',
            ],
            'location.address_1' => [
                'string',
                'required',
            ],
            'location.address_2' => [
                'string',
                'nullable',
            ],
            'location.city' => [
                'string',
                'required',
            ],
            'location.state_abbr' => [
                'string',
                'min:2',
                'max:2',
                'required',
            ],
            'location.postal_code' => [
                'string',
                'min:5',
                'max:10',
                'required',
            ],
            'location.map_link' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['event'] = Event::pluck('name', 'id')->toArray();
    }
}
