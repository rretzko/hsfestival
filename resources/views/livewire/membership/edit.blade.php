<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('membership.user_id') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.membership.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" :options="$this->listsForFields['user']" wire:model="membership.user_id" />
        <div class="validation-message">
            {{ $errors->first('membership.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membership.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membership.org') ? 'invalid' : '' }}">
        <label class="form-label required" for="org">{{ trans('cruds.membership.fields.org') }}</label>
        <input class="form-control" type="text" name="org" id="org" required wire:model.defer="membership.org">
        <div class="validation-message">
            {{ $errors->first('membership.org') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membership.fields.org_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membership.expiration_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="expiration_date">{{ trans('cruds.membership.fields.expiration_date') }}</label>
        <x-date-picker class="form-control" required wire:model="membership.expiration_date" id="expiration_date" name="expiration_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('membership.expiration_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membership.fields.expiration_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('membership.membershiptype_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="membershiptype">{{ trans('cruds.membership.fields.membershiptype') }}</label>
        <x-select-list class="form-control" required id="membershiptype" name="membershiptype" :options="$this->listsForFields['membershiptype']" wire:model="membership.membershiptype_id" />
        <div class="validation-message">
            {{ $errors->first('membership.membershiptype_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.membership.fields.membershiptype_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.memberships.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>