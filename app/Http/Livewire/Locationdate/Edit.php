<?php

namespace App\Http\Livewire\Locationdate;

use App\Models\Event;
use App\Models\Location;
use App\Models\Locationdate;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public Locationdate $locationdate;

    public function mount(Locationdate $locationdate)
    {
        $this->locationdate = $locationdate;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.locationdate.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->locationdate->save();

        return redirect()->route('admin.locationdates.index');
    }

    protected function rules(): array
    {
        return [
            'locationdate.location_id' => [
                'integer',
                'exists:locations,id',
                'required',
            ],
            'locationdate.event_id' => [
                'integer',
                'exists:events,id',
                'required',
            ],
            'locationdate.start_datetime' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'locationdate.end_datetime' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['location'] = Location::pluck('name', 'id')->toArray();
        $this->listsForFields['event']    = Event::pluck('name', 'id')->toArray();
    }
}
