<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('phone.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.phone.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="phone.user_id" />
        <div class="validation-message">
            {{ $errors->first('phone.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.phone.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('phone.phonetype_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="phonetype">{{ trans('cruds.phone.fields.phonetype') }}</label>
        <x-select-list class="form-control" required id="phonetype" name="phonetype" :options="$this->listsForFields['phonetype']" wire:model="phone.phonetype_id" />
        <div class="validation-message">
            {{ $errors->first('phone.phonetype_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.phone.fields.phonetype_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('phone.phone') ? 'invalid' : '' }}">
        <label class="form-label required" for="phone">{{ trans('cruds.phone.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" required wire:model.defer="phone.phone">
        <div class="validation-message">
            {{ $errors->first('phone.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.phone.fields.phone_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.phones.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>