@props([
    'payment' => NULL,
    'paymenttypes',
    'users',
])
<style>
    .input-group{display: flex; flex-direction: column; margin-bottom: 2px; color: black;}
    label{color: white;}
</style>
<form method="POST" action="{{ $payment ? route('eventmanagement.payments.update', ['payment' => $payment]) : route('eventmanagement.payments.store') }}" >

    @csrf

    <div class="input-group">
        <label for="user_id">Registrant</label>
        <select name="user_id">
            <option value="0">Select</option>
            @foreach($users AS $user)
                <option value="{{$user->id }}"
                    @if($payment && $payment->user_id == $user->id) SELECTED @endif
                >
                    {{$user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="password">Payment Type</label>
        <select name="paymenttype_id">
            <option value="0">Select</option>
            @foreach($paymenttypes AS $paymenttype)
                <option value="{{$paymenttype->id }}"
                        @if($payment && $payment->paymenttype_id == $paymenttype->id) SELECTED @endif
                >
                    {{$paymenttype->descr }}
                </option>
            @endforeach
        </select>
        @error('paymenttype_id')
        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="amount">Amount</label>
        <input class="px-2" name="amount" type="numeric" value="{{ $payment ? $payment->amount : '' }}"/>
        @error('amount')
        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="payment_date">Payment Date</label>
        <input name="payment_date" type="date" value="{{ $payment ? $payment->payment_date : date('d-M-Y') }}"
        />
        @error('payment_date')
        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="payment_number">Payment Number</label>
        <input name="payment_number" type="text" value="{{ $payment ? $payment->payment_number : '' }}" placeholder="Any identifying value"/>
        @error('payment_number')
        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group">
        <label for="comments">Comments</label>
        <textarea name="comments" cols="40" rows="3">{{ $payment ? $payment->comments : '' }}</textarea>
        @error('comments')
        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group mt-4">
        <label> </label>
        <input class="text-blueGray-800 px-2" type="submit" name="submit" value="Submit" />
    </div>
</form>
