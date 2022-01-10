<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('optiontype.descr') ? 'invalid' : '' }}">
        <label class="form-label required" for="descr">{{ trans('cruds.optiontype.fields.descr') }}</label>
        <input class="form-control" type="text" name="descr" id="descr" required wire:model.defer="optiontype.descr">
        <div class="validation-message">
            {{ $errors->first('optiontype.descr') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.optiontype.fields.descr_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.optiontypes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>