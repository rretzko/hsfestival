<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('option.optiontype_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="optiontype">{{ trans('cruds.option.fields.optiontype') }}</label>
        <x-select-list class="form-control" required id="optiontype" name="optiontype" :options="$this->listsForFields['optiontype']" wire:model="option.optiontype_id" />
        <div class="validation-message">
            {{ $errors->first('option.optiontype_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.optiontype_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('option.descr') ? 'invalid' : '' }}">
        <label class="form-label required" for="descr">{{ trans('cruds.option.fields.descr') }}</label>
        <input class="form-control" type="text" name="descr" id="descr" required wire:model.defer="option.descr">
        <div class="validation-message">
            {{ $errors->first('option.descr') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.descr_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('option.label_default') ? 'invalid' : '' }}">
        <label class="form-label required" for="label_default">{{ trans('cruds.option.fields.label_default') }}</label>
        <input class="form-control" type="text" name="label_default" id="label_default" required wire:model.defer="option.label_default">
        <div class="validation-message">
            {{ $errors->first('option.label_default') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.label_default_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('option.label_alternate') ? 'invalid' : '' }}">
        <label class="form-label" for="label_alternate">{{ trans('cruds.option.fields.label_alternate') }}</label>
        <input class="form-control" type="text" name="label_alternate" id="label_alternate" wire:model.defer="option.label_alternate">
        <div class="validation-message">
            {{ $errors->first('option.label_alternate') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.option.fields.label_alternate_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.options.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>