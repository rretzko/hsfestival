@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="options"/>

        <x-menus.sidebar active="options"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Sightreading Examples
            </header>
            <form method="post" action="{{ route('user.sightreading.update') }}">

                @csrf

                {{-- Examples --}}
                <div class="flex row">
                    <label for="" style="min-width: 12rem;">I want to order the following Sightreading Example(s)</label>
                    <div class="ml-2 mt-6 flex flex-col">
                        <ul>
                        @foreach($sightreadings AS $sightreading)
                            <li>
                                <div>
                                    <input id="sightreading_{{ $sightreading->id }}" name="sightreadings[]" type="checkbox"
                                           value="{{ $sightreading->id }}"
                                           @if($examples->where('id', $sightreading->id)->first()) CHECKED @endif
                                           onclick="updateCountCost()"
                                    >
                                    <label>{{ $sightreading->name.' @ $'.$sightreading->cost }}</label>
                                    @if($sightreading->year_of == date('Y'))
                                        <span class="text-sm">(Current year sightreading examples will be delivered AFTER the festival closes.)</span>
                                    @endif
                                </div>

                            </li>
                        @endforeach
                        </ul>
                        @error('sightreadings')
                            <div class="bg-white text-red-500 text-sm px-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end pr-4 mb-2">
                    <button type="submit"
                            id="submit"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4"
                            style="color: black;"
                    >
                        Update Sightreadings
                    </button>

                </div>

                {{-- PAYPAL BUTTON --}}
                <div class="flex justify-end"
                    style="font-size: 1rem; margin-right: 2rem;"
                >

                    <script src="https://www.paypal.com/sdk/js?client-id=AaEa4PCcKTDHEkVTrNM8ob_kJfycUUXCoI94IXCanWnBfhOHcWrwMFmyQ6ddirKu2340YTFwQ9FWwEdt&currency=USD&disable-funding=credit,card"></script>

                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>

                    <script>
                        paypal.Buttons({
                            style: {
                                layout: 'vertical',
                                tagline: 'false'
                            },
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: "{{ (auth()->user()->sightreadings->count() * 40) }}"
                                        }
                                    }],
                                    user_credentials: [{
                                        id: {
                                            value: "{{ auth()->id() }}"
                                        },
                                        school: {
                                            value: "{{ auth()->user()->school->id }}"
                                        },
                                        event: {
                                            value: "{{ $event->id }}"
                                        },
                                        sightreading:{
                                            value: 1
                                        }
                                    }],

                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    window.location.href = '/success.html';
                                });
                            }
                        }).render("#paypal-button-container");

                    </script>
                </div>
            </form>

        </div>
    </div>

    <script>

        function updateCountCost()
        {
            var $count = 0;
            var $cost = 0;
            $examples = document.getElementsByName('sightreadings[]');
            $examples.forEach(function(example){

                if(example.checked == true){
                    $count++;
                }

            });

            $cost = ($count * 40);

            $submit = document.getElementById('submit');

            $value = $submit.innerText = 'Update Sightreadings ('+$count+' Examples = $'+$cost+')';

        }
    </script>


@endsection
