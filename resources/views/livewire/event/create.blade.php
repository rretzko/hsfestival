<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('event.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.event.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="event.name">
        <div class="validation-message">
            {{ $errors->first('event.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.short_name') ? 'invalid' : '' }}">
        <label class="form-label required" for="short_name">{{ trans('cruds.event.fields.short_name') }}</label>
        <input class="form-control" type="text" name="short_name" id="short_name" required wire:model.defer="event.short_name">
        <div class="validation-message">
            {{ $errors->first('event.short_name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.short_name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.start_datetime') ? 'invalid' : '' }}">
        <label class="form-label required" for="start_datetime">{{ trans('cruds.event.fields.start_datetime') }}</label>
        <x-date-picker class="form-control" required wire:model="event.start_datetime" id="start_datetime" name="start_datetime" />
        <div class="validation-message">
            {{ $errors->first('event.start_datetime') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.start_datetime_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.end_datetime') ? 'invalid' : '' }}">
        <label class="form-label required" for="end_datetime">{{ trans('cruds.event.fields.end_datetime') }}</label>
        <x-date-picker class="form-control" required wire:model="event.end_datetime" id="end_datetime" name="end_datetime" />
        <div class="validation-message">
            {{ $errors->first('event.end_datetime') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.end_datetime_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>