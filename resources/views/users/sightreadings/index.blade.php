@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="options"/>

        <x-menus.sidebar active="options"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Sightreading Examples
            </header>
            <form method="post"
                  action="{{ route('user.sightreading.update') }}"
                  onsubmit="return confirm('When you click OK, you order will immediately be emailed to {{ auth()->user()->email }} and your event balance due will be appropriately updated. These charges CANNOT be refunded!');"
            >
                @csrf

                {{-- Examples --}}
                <div class="flex flex-col">
                    <label for="" style="min-width: 12rem;">I want to order the following Sightreading Example(s)<br />
                        <span style="color: yellow; font-weight: bold;">Note: Orders will be emailed to: {{ auth()->user()->email }}.</span>
                    </label>

                    @if(session()->has('sent'))
                        <div id="advisory" class="bg-green-100 text-black my-4 px-2">
                            {{ session()->get('sent') }}<br />
                            An invoice and quote are included in your email<br />
                            If you have an outstanding balance, you may also pay via PayPal below.
                        </div>
                    @endif

                    <div class="ml-2 mt-6 flex flex-col">
                        <ul>
                        @foreach($sightreadings AS $sightreading)
                            @if($sightreading->id != 17)
                                <li>
                                    <div>
                                        <input id="sightreading_{{ $sightreading->id }}" name="sightreadings[]" type="checkbox"
                                               value="{{ $sightreading->id }}"
                                               class="@if((bool)$orders->where('sightreading_id', $sightreading->id)->first()) bg-gray-400 @endif"
                                               @if((bool)$orders->where('sightreading_id', $sightreading->id)->first()) DISABLED @endif
                                               onclick="updateCountCost({{ auth()->id() }},{{ $event->id }})"
                                        >
                                        <label>{{ $sightreading->name.' @ $'.$sightreading->cost }}</label>
                                        @if($sightreading === $sightreadings->first())
                                            <span class="text-sm">(Current year sightreading examples will be delivered AFTER the festival closes.)</span>
                                        @endif
                                        @if((bool)$orders->where('sightreading_id', $sightreading->id)->first())
                                            <span class="text-sm">(Previously ordered.)</span>
                                        @endif
                                    </div>

                                </li>
                            @endif
                        @endforeach
                        </ul>
                        @error('sightreadings')
                            <div class="bg-white text-red-500 text-sm px-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-start pr-4 my-2">
                    <button type="submit"
                            id="submit"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4"
                            style="color: black;"
                    >
                        Email Sightreading PDf(s)
                    </button>

                </div>

            </form>

            {{-- PAYPAL BUTTON IF OUTSTANDING BALANCE EXISTS --}}
            <div>
                @if($outstanding_balance)
                    <x-paypals.sightreading
                        outstandingBalance="{{ $outstanding_balance }}"
                        :event="$event"
                        :school="$school"
                    />
              @endif
            </div>

        </div>
    </div>

    <script>

        function updateCountCost($user_id, $event_id)
        {
            var $count = 0;
            var $cost = 0;
            $examples = document.getElementsByName('sightreadings[]');
            $examples.forEach(function(example){

                if(example.checked == true){
                    $count++;
                }

            });

            $cost = ($count * 50);

            $submit = document.getElementById('submit');

            $value = $submit.innerText = 'Update Sightreadings ('+$count+' Examples = $'+$cost+')';

            //document.getElementById('display_amount_due_net').innerText = 'PayPal Payment Amount Due: $'+$cost+'.00';
            //document.getElementById('amount').value = $cost;

            //document.getElementById('new_custom').value = $user_id+'*'+$event_id+'*'+$cost;


        }
    </script>


@endsection
