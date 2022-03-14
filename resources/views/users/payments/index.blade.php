@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="payment"/>

        <x-menus.sidebar active="payment"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Payment
            </header>

            <div class="flex flex-row">
                <div id="invoice" class="text-center w-6/12 mr-2 " style="background-color: rgba(0,0,0,.3);">
                    <header class="ml-2 mr-2" style="border-bottom: 1px solid white;">Invoice</header>

                    <style>
                        .category{display: flex;}
                        .category label{width: 50%; text-align: right; margin-right: .5rem;}
                        .category data{width: 50%; text-align: left; margin-left: .5rem;}
                    </style>
                    <div>

                        <div class="category">
                            <label>Sys.Id.:</label>
                            <data>{{ auth()->id() }}</data>
                        </div>

                        <div class="category">
                            <label>School:</label>
                            <data>{{ auth()->user()->school->name }}</data>
                        </div>

                        <div class="category">
                            <label>Ensembles:</label>
                            <data>{{ auth()->user()->ensembles()->count() }}</data>
                        </div>

                        <div class="category">
                            <label>Plaque or Certificate:</label>
                            <data>
                                @if(auth()->user()->userOptionPlaque) Plaque @else Certificate @endif
                            </data>
                        </div>

                        <div class="category">
                            <label>Membership:</label>
                           <data>
                               @if(auth()->user()->membership)
                                   Id: {{ auth()->user()->membership->org }}
                                   Expires: {{ auth()->user()->membership->expiration_date }}
                               @else
                                    Non-member
                               @endif
                           </data>
                        </div>

                        <div class="category">
                            <label>Fees:</label>
                            <data>
                                <ul>
                                    @if(auth()->user()->membership)
                                        <li class="font-bold">ACDA Member
                                            <ul class="font-normal ml-2">
                                                <li>Certificate: $160 per ensemble</li>
                                                <li>Plaque: $195 per ensemble</li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="font-bold">Non-Member
                                            <ul class="font-normal ml-2">
                                                <li>Certificate: $210 per ensemble</li>
                                                <li>Plaque: $245 per ensemble</li>
                                            </ul>
                                        </li>
                                    @endif
                                    <li class="font-bold">Late Fee
                                        <ul class="font-normal ml-2">
                                            <li>$50 per ensemble</li>
                                        </ul>
                                    </li>
                                </ul>
                            </data>
                        </div>

                        <div class="category mt-4">
                            <label>Due:</label>
                            <data>
                                ${{ number_format(auth()->user()->paymentDue, 2) }}
                            </data>
                        </div>

                        <div class="category">
                            <label>Paid:</label>
                            <data>
                                ${{ number_format(auth()->user()->paymentPaid, 2) }}
                            </data>
                        </div>

                        <div class="category">
                            <label>Balance:</label>
                            <data>
                                ${{ number_format(auth()->user()->paymentBalance, 2) }}
                            </data>
                        </div>

                        <div class="category text-center mt-4">
                            <a href="{{ route('user.payment.download') }}" class="w-full pb-4 italic" style="color: gold;">Print Invoice</a>
                        </div>

                    </div>
                </div>

                <div id="payment" class="text-center w-6/12 ml-2 " style="border: 1px solid lightgrey;">
                    <header class="ml-2 mr-2 text-center" style="border-bottom: 1px solid lightgray;">PayPal</header>

                    <div class="text-center w-12" style="width: 24rem; margin: auto;">

                        <div id="invoice_summary" class="mb-6">
                            <div class="category mt-4">
                                <label>Due:</label>
                                <data>
                                    ${{ number_format(auth()->user()->paymentDue, 2) }}
                                </data>
                            </div>

                            <div class="category">
                                <label>Paid:</label>
                                <data>
                                    ${{ number_format(auth()->user()->paymentPaid, 2) }}
                                </data>
                            </div>

                            <div class="category">
                                <label>Balance:</label>
                                <data>
                                    ${{ number_format(auth()->user()->paymentBalance, 2) }}
                                </data>
                            </div>
                        </div>

                        {{-- SANDBOX --}}
                        <!--
                        <script src="https://www.paypal.com/sdk/js?client-id=AQ3Tqhkp2PQr34p16HIajm3kSYh9L3G3kXTtoKrn9RFpkkpk-d1J8JIxOj-cxknfC3kdBM7bvpEu9bpD&currency=USD&disable-funding=credit,card"></script>
                        -->
                        {{-- PRODUCTION --}}
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
                                                value: "{{ auth()->user()->paymentBalance }}"
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

                        <div id="payment-mail-address">
                            <header class="mb-2">Or send checks, etc. to:</header>
                            <div class="bg-white text-black text-left px-2" style="font-family: 'Times New Roman;">
                                <div>Patrick Hachey</div>
                                <div>Re: NJACDA HS Choral Festival</div>
                                <div>93 Salmon Road</div>
                                <div>Landing, NJ 07850</div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
            <!-- {{--
            <form method="post" action="{{ route('user.options.update') }}">

                @csrf

                {{-- VENUES
                <div class="flex row">
                    <label for="" style="min-width: 12rem;">Venue Choice</label>
                    <div class="ml-2 flex flex-col">
                        @foreach($event->venues->sortBy('start') AS $venue)

                            <ul>
                                <li>{{ $venue->startDateDmdy.': '.$venue->name }}</li>
                                <ul class="ml-6">
                                    <li>
                                        <select name="venues[{{ $venue->id }}]" id="venue_{{ $venue->id }}" class="text-blueGray-700">
                                            <option value="1"
                                                @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 1) SELECTED @endif
                                            >
                                                1. My first choice
                                            </option>
                                            <option value="2"
                                                    @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 2) SELECTED @endif
                                            >
                                                2. My second preference
                                            </option>
                                            <option value="3"
                                                    @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 3) SELECTED @endif
                                            >
                                                3. My third preference
                                            </option>
                                            <option value="4"
                                                    @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 4) SELECTED @endif
                                            >
                                                4. My fourth preference
                                            </option>
                                            <option value="0"
                                                    @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 0) SELECTED @endif
                                            >
                                                5. I cannot participate on this date
                                            </option>
                                        </select>
                                    </li>
                                </ul>
                            </ul>
                        @endforeach
                        @error('venues')
                            <div class="bg-white text-red-500 text-sm px-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @foreach($options AS $option)

                    @if($option->optiontype->descr === 'boolean')
                        <x-options.boolean
                            :option=$option
                            :useroptions=$useroptions
                        />
                    @endif
                    @if($option->optiontype->descr === 'checkbox')
                            <x-options.checkbox
                                :option=$option
                                :useroptions=$useroptions
                            />
                        @endif

                @endforeach
                <div>
                    <label for="" style="min-width: 12rem;">
                        Comments:
                    </label>
                    <div>
                        *Any school not scheduled on their first choice of day will be contacted.
                    </div>
                    <div>
                        **Click here for a sample certificate
                    </div>
                </div>
                <div class="flex justify-end pr-4">
                    <button type="submit"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            style="color: black;"
                    >
                        Update Options
                    </button>
                </div>
            </form>
            --}} -->
        </div>
    </div>


@endsection
