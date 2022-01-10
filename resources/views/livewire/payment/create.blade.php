<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('payment.event_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="event">{{ trans('cruds.payment.fields.event') }}</label>
        <x-select-list class="form-control" required id="event" name="event" :options="$this->listsForFields['event']" wire:model="payment.event_id" />
        <div class="validation-message">
            {{ $errors->first('payment.event_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.event_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.payment.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="payment.user_id" />
        <div class="validation-message">
            {{ $errors->first('payment.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.paymenttype_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="paymenttype">{{ trans('cruds.payment.fields.paymenttype') }}</label>
        <x-select-list class="form-control" required id="paymenttype" name="paymenttype" :options="$this->listsForFields['paymenttype']" wire:model="payment.paymenttype_id" />
        <div class="validation-message">
            {{ $errors->first('payment.paymenttype_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.paymenttype_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.amount') ? 'invalid' : '' }}">
        <label class="form-label required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" required wire:model.defer="payment.amount" step="0.01">
        <div class="validation-message">
            {{ $errors->first('payment.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.amount_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
        <x-date-picker class="form-control" required wire:model="payment.payment_date" id="payment_date" name="payment_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('payment.payment_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.payment_number') ? 'invalid' : '' }}">
        <label class="form-label" for="payment_number">{{ trans('cruds.payment.fields.payment_number') }}</label>
        <input class="form-control" type="text" name="payment_number" id="payment_number" wire:model.defer="payment.payment_number">
        <div class="validation-message">
            {{ $errors->first('payment.payment_number') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.payment_number_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('payment.comments') ? 'invalid' : '' }}">
        <label class="form-label" for="comments">{{ trans('cruds.payment.fields.comments') }}</label>
        <textarea class="form-control" name="comments" id="comments" wire:model.defer="payment.comments" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('payment.comments') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.payment.fields.comments_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>