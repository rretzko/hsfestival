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
<!-- {{--
                        <div class="category">
                            <label>Plaque or Certificate:</label>
                            <data>
                                @if(auth()->user()->userOptionPlaque) Plaque @else Certificate @endif
                            </data>
                        </div>
--}} -->
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
                                        <li class="font-bold">ACDA Member Registration Fee
                                            <!-- {{--
                                            <ul class="font-normal ml-2">
                                                <li>Certificate: $160 per ensemble</li>
                                                <li>Plaque: $195 per ensemble</li>
                                            </ul>
                                            --}} -->
                                            <ul class="font-normal ml-2">
                                                <li>$250 per ensemble</li>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="font-bold">Non-Member
                                            <!-- {{--
                                            <ul class="font-normal ml-2">
                                                <li>Certificate: $210 per ensemble</li>
                                                <li>Plaque: $245 per ensemble</li>
                                            </ul>
                                            --}} -->
                                        </li>
                                    @endif
                                    <li class="font-bold">Late Fee <span style="font-size: 0.66rem;">(if registered after December 15, 2022)</span>
                                        <ul class="font-normal ml-2">
                                            <li>$50 per ensemble</li>
                                        </ul>
                                    </li>
                                    <li class="font-bold">Sight Reading
                                        <ul class="font-normal ml-2">
                                            <li>{{ $sightreadingpackets }} Packets @ $50 per packet</li>
                                        </ul></li>
                                </ul>
                            </data>
                        </div>

                        <div class="category mt-4">
                            <label>Due:</label>
                            <data>
                                ${{ number_format(auth()->user()->paymentDue + ($sightreadingpackets * 50), 2) }}
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
                                ${{ number_format(auth()->user()->paymentBalance + ($sightreadingpackets * 50), 2) }}
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
                        {{-- COMMENTED OUT PER DECISION TO NOT PAYPAL 2023 EVENT (ID === 3}}
{{--
                        <script src="https://www.paypal.com/sdk/js?client-id=AaEa4PCcKTDHEkVTrNM8ob_kJfycUUXCoI94IXCanWnBfhOHcWrwMFmyQ6ddirKu2340YTFwQ9FWwEdt&currency=USD&disable-funding=credit,card"></script>

                        {{-- Set up a container element for the button
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
--}}
                        <div id="payment-mail-address">
                            <header class="mb-2">Send checks, etc. to:</header>
                            <div class="bg-white text-black text-left px-2" style="font-family: 'Times New Roman;">
                                <div>Patrick Hachey</div>
                                <div>Re: NJACDA HS Choral Festival</div>
                                <div>93 Salmon Road</div>
                                <div>Landing, NJ 07850</div>
                                <div>Make check payable to: NJACDA</div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>
    </div>


@endsection
