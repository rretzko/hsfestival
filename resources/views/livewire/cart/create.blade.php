<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('cart.event_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="event">{{ trans('cruds.cart.fields.event') }}</label>
        <x-select-list class="form-control" required id="event" name="event" :options="$this->listsForFields['event']" wire:model="cart.event_id" />
        <div class="validation-message">
            {{ $errors->first('cart.event_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cart.fields.event_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cart.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.cart.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="cart.user_id" />
        <div class="validation-message">
            {{ $errors->first('cart.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cart.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('cart.inventory_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="inventory">{{ trans('cruds.cart.fields.inventory') }}</label>
        <x-select-list class="form-control" required id="inventory" name="inventory" :options="$this->listsForFields['inventory']" wire:model="cart.inventory_id" />
        <div class="validation-message">
            {{ $errors->first('cart.inventory_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.cart.fields.inventory_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.carts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>