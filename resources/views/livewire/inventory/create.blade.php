<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('inventory.inventorytype_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="inventorytype">{{ trans('cruds.inventory.fields.inventorytype') }}</label>
        <x-select-list class="form-control" required id="inventorytype" name="inventorytype" :options="$this->listsForFields['inventorytype']" wire:model="inventory.inventorytype_id" />
        <div class="validation-message">
            {{ $errors->first('inventory.inventorytype_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inventory.fields.inventorytype_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inventory.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.inventory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="inventory.name">
        <div class="validation-message">
            {{ $errors->first('inventory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inventory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inventory.price') ? 'invalid' : '' }}">
        <label class="form-label required" for="price">{{ trans('cruds.inventory.fields.price') }}</label>
        <input class="form-control" type="number" name="price" id="price" required wire:model.defer="inventory.price" step="0.01">
        <div class="validation-message">
            {{ $errors->first('inventory.price') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inventory.fields.price_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('inventory.order_by') ? 'invalid' : '' }}">
        <label class="form-label required" for="order_by">{{ trans('cruds.inventory.fields.order_by') }}</label>
        <input class="form-control" type="number" name="order_by" id="order_by" required wire:model.defer="inventory.order_by" step="1">
        <div class="validation-message">
            {{ $errors->first('inventory.order_by') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.inventory.fields.order_by_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.inventories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>