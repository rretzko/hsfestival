<?php

namespace App\Http\Livewire\Participant;

use App\Models\Event;
use App\Models\Locationdate;
use App\Models\Participant;
use App\Models\User;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Participant $participant;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(Participant $participant)
    {
        $this->participant = $participant;
        $this->initListsForFields();
        $this->mediaCollections = [
            'participant_photo' => $participant->photo,
        ];
    }

    public function render()
    {
        return view('livewire.participant.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->participant->save();
        $this->syncMedia();

        return redirect()->route('admin.participants.index');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->participant->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'participant.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
            'participant.event_id' => [
                'integer',
                'exists:events,id',
                'required',
            ],
            'participant.locationdate_id' => [
                'integer',
                'exists:locationdates,id',
                'required',
            ],
            'mediaCollections.participant_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.participant_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['user']         = User::pluck('name', 'id')->toArray();
        $this->listsForFields['event']        = Event::pluck('name', 'id')->toArray();
        $this->listsForFields['locationdate'] = Locationdate::pluck('start_datetime', 'id')->toArray();
    }
}
