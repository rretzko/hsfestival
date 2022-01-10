<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('locationdate.location_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="location">{{ trans('cruds.locationdate.fields.location') }}</label>
        <x-select-list class="form-control" required id="location" name="location" :options="$this->listsForFields['location']" wire:model="locationdate.location_id" />
        <div class="validation-message">
            {{ $errors->first('locationdate.location_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.locationdate.fields.location_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('locationdate.event_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="event">{{ trans('cruds.locationdate.fields.event') }}</label>
        <x-select-list class="form-control" required id="event" name="event" :options="$this->listsForFields['event']" wire:model="locationdate.event_id" />
        <div class="validation-message">
            {{ $errors->first('locationdate.event_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.locationdate.fields.event_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('locationdate.start_datetime') ? 'invalid' : '' }}">
        <label class="form-label required" for="start_datetime">{{ trans('cruds.locationdate.fields.start_datetime') }}</label>
        <x-date-picker class="form-control" required wire:model="locationdate.start_datetime" id="start_datetime" name="start_datetime" />
        <div class="validation-message">
            {{ $errors->first('locationdate.start_datetime') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.locationdate.fields.start_datetime_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('locationdate.end_datetime') ? 'invalid' : '' }}">
        <label class="form-label required" for="end_datetime">{{ trans('cruds.locationdate.fields.end_datetime') }}</label>
        <x-date-picker class="form-control" required wire:model="locationdate.end_datetime" id="end_datetime" name="end_datetime" />
        <div class="validation-message">
            {{ $errors->first('locationdate.end_datetime') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.locationdate.fields.end_datetime_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.locationdates.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>