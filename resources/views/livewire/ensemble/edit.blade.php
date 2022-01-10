<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('ensemble.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.ensemble.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="ensemble.user_id" />
        <div class="validation-message">
            {{ $errors->first('ensemble.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ensemble.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ensemble.school_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="school">{{ trans('cruds.ensemble.fields.school') }}</label>
        <x-select-list class="form-control" required id="school" name="school" :options="$this->listsForFields['school']" wire:model="ensemble.school_id" />
        <div class="validation-message">
            {{ $errors->first('ensemble.school_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ensemble.fields.school_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ensemble.event_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="event">{{ trans('cruds.ensemble.fields.event') }}</label>
        <x-select-list class="form-control" required id="event" name="event" :options="$this->listsForFields['event']" wire:model="ensemble.event_id" />
        <div class="validation-message">
            {{ $errors->first('ensemble.event_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ensemble.fields.event_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ensemble.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.ensemble.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="ensemble.name">
        <div class="validation-message">
            {{ $errors->first('ensemble.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ensemble.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ensemble.conductor') ? 'invalid' : '' }}">
        <label class="form-label required" for="conductor">{{ trans('cruds.ensemble.fields.conductor') }}</label>
        <input class="form-control" type="text" name="conductor" id="conductor" required wire:model.defer="ensemble.conductor">
        <div class="validation-message">
            {{ $errors->first('ensemble.conductor') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ensemble.fields.conductor_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ensemble.ensembletype_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="ensembletype">{{ trans('cruds.ensemble.fields.ensembletype') }}</label>
        <x-select-list class="form-control" required id="ensembletype" name="ensembletype" :options="$this->listsForFields['ensembletype']" wire:model="ensemble.ensembletype_id" />
        <div class="validation-message">
            {{ $errors->first('ensemble.ensembletype_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ensemble.fields.ensembletype_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('ensemble.auditioned') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="auditioned" id="auditioned" wire:model.defer="ensemble.auditioned">
        <label class="form-label inline ml-1" for="auditioned">{{ trans('cruds.ensemble.fields.auditioned') }}</label>
        <div class="validation-message">
            {{ $errors->first('ensemble.auditioned') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.ensemble.fields.auditioned_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.ensembles.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>