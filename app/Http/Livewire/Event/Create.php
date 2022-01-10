<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use Livewire\Component;

class Create extends Component
{
    public Event $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.event.create');
    }

    public function submit()
    {
        $this->validate();

        $this->event->save();

        return redirect()->route('admin.events.index');
    }

    protected function rules(): array
    {
        return [
            'event.name' => [
                'string',
                'required',
            ],
            'event.short_name' => [
                'string',
                'min:0',
                'max:40',
                'required',
            ],
            'event.start_datetime' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'event.end_datetime' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }
}
