<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('participant.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.participant.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="participant.user_id" />
        <div class="validation-message">
            {{ $errors->first('participant.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.participant.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('participant.event_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="event">{{ trans('cruds.participant.fields.event') }}</label>
        <x-select-list class="form-control" required id="event" name="event" :options="$this->listsForFields['event']" wire:model="participant.event_id" />
        <div class="validation-message">
            {{ $errors->first('participant.event_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.participant.fields.event_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('participant.locationdate_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="locationdate">{{ trans('cruds.participant.fields.locationdate') }}</label>
        <x-select-list class="form-control" required id="locationdate" name="locationdate" :options="$this->listsForFields['locationdate']" wire:model="participant.locationdate_id" />
        <div class="validation-message">
            {{ $errors->first('participant.locationdate_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.participant.fields.locationdate_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.participant_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.participant.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.participants.storeMedia') }}" collection-name="participant_photo" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.participant_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.participant.fields.photo_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.participants.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>