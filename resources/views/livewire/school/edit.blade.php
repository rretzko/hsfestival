<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('school.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.school.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="school.user_id" />
        <div class="validation-message">
            {{ $errors->first('school.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.school.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="school.name">
        <div class="validation-message">
            {{ $errors->first('school.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.address_1') ? 'invalid' : '' }}">
        <label class="form-label" for="address_1">{{ trans('cruds.school.fields.address_1') }}</label>
        <input class="form-control" type="text" name="address_1" id="address_1" wire:model.defer="school.address_1">
        <div class="validation-message">
            {{ $errors->first('school.address_1') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.address_1_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.address_2') ? 'invalid' : '' }}">
        <label class="form-label" for="address_2">{{ trans('cruds.school.fields.address_2') }}</label>
        <input class="form-control" type="text" name="address_2" id="address_2" wire:model.defer="school.address_2">
        <div class="validation-message">
            {{ $errors->first('school.address_2') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.address_2_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.city') ? 'invalid' : '' }}">
        <label class="form-label" for="city">{{ trans('cruds.school.fields.city') }}</label>
        <input class="form-control" type="text" name="city" id="city" wire:model.defer="school.city">
        <div class="validation-message">
            {{ $errors->first('school.city') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.city_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.state_abbr') ? 'invalid' : '' }}">
        <label class="form-label required" for="state_abbr">{{ trans('cruds.school.fields.state_abbr') }}</label>
        <input class="form-control" type="text" name="state_abbr" id="state_abbr" required wire:model.defer="school.state_abbr">
        <div class="validation-message">
            {{ $errors->first('school.state_abbr') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.state_abbr_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('school.postal_code') ? 'invalid' : '' }}">
        <label class="form-label" for="postal_code">{{ trans('cruds.school.fields.postal_code') }}</label>
        <input class="form-control" type="text" name="postal_code" id="postal_code" wire:model.defer="school.postal_code">
        <div class="validation-message">
            {{ $errors->first('school.postal_code') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.school.fields.postal_code_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.schools.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>