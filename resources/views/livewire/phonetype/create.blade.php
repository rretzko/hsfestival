<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('phonetype.descr') ? 'invalid' : '' }}">
        <label class="form-label required" for="descr">{{ trans('cruds.phonetype.fields.descr') }}</label>
        <input class="form-control" type="text" name="descr" id="descr" required wire:model.defer="phonetype.descr">
        <div class="validation-message">
            {{ $errors->first('phonetype.descr') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.phonetype.fields.descr_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.phonetypes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>