<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('event') ? 'invalid' : '' }}">
        <label class="form-label required" for="event">{{ trans('cruds.location.fields.event') }}</label>
        <x-select-list class="form-control" required id="event" name="event" wire:model="event" :options="$this->listsForFields['event']" multiple />
        <div class="validation-message">
            {{ $errors->first('event') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.event_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.location.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="location.name">
        <div class="validation-message">
            {{ $errors->first('location.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.address_1') ? 'invalid' : '' }}">
        <label class="form-label required" for="address_1">{{ trans('cruds.location.fields.address_1') }}</label>
        <input class="form-control" type="text" name="address_1" id="address_1" required wire:model.defer="location.address_1">
        <div class="validation-message">
            {{ $errors->first('location.address_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.address_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.address_2') ? 'invalid' : '' }}">
        <label class="form-label" for="address_2">{{ trans('cruds.location.fields.address_2') }}</label>
        <input class="form-control" type="text" name="address_2" id="address_2" wire:model.defer="location.address_2">
        <div class="validation-message">
            {{ $errors->first('location.address_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.address_2_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.city') ? 'invalid' : '' }}">
        <label class="form-label required" for="city">{{ trans('cruds.location.fields.city') }}</label>
        <input class="form-control" type="text" name="city" id="city" required wire:model.defer="location.city">
        <div class="validation-message">
            {{ $errors->first('location.city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.city_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.state_abbr') ? 'invalid' : '' }}">
        <label class="form-label required" for="state_abbr">{{ trans('cruds.location.fields.state_abbr') }}</label>
        <input class="form-control" type="text" name="state_abbr" id="state_abbr" required wire:model.defer="location.state_abbr">
        <div class="validation-message">
            {{ $errors->first('location.state_abbr') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.state_abbr_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.postal_code') ? 'invalid' : '' }}">
        <label class="form-label required" for="postal_code">{{ trans('cruds.location.fields.postal_code') }}</label>
        <input class="form-control" type="text" name="postal_code" id="postal_code" required wire:model.defer="location.postal_code">
        <div class="validation-message">
            {{ $errors->first('location.postal_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.postal_code_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('location.map_link') ? 'invalid' : '' }}">
        <label class="form-label" for="map_link">{{ trans('cruds.location.fields.map_link') }}</label>
        <input class="form-control" type="text" name="map_link" id="map_link" wire:model.defer="location.map_link">
        <div class="validation-message">
            {{ $errors->first('location.map_link') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.location.fields.map_link_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>