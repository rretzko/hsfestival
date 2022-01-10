<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('inventorytype.descr') ? 'invalid' : '' }}">
        <label class="form-label required" for="descr">{{ trans('cruds.inventorytype.fields.descr') }}</label>
        <input class="form-control" type="text" name="descr" id="descr" required wire:model.defer="inventorytype.descr">
        <div class="validation-message">
            {{ $errors->first('inventorytype.descr') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inventorytype.fields.descr_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.inventorytypes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>