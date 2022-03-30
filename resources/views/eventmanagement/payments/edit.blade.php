@extends('layouts.user')

@section('content')

    <div class="flex row">

        <x-menus.mobile />

        <x-menus.sidebar />

        <div class="flex row text-white space-x-2">

            <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
                {{-- HEADER --}}
                <section class="border mb-1 px-2 rounded">

                    <header class="uppercase">
                        <a href="{{ route('eventmanagement.payments.index') }}">
                            Payments
                        </a>
                    </header>

                    {{-- PAYMENT FORM --}}
                    <div class="flex flex-col mb-2">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                <x-forms.payments.payment
                                    :paymenttypes="$paymenttypes"
                                    :users="$users"
                                    :payment="$payment"
                                />

                            </div>
                        </div>
                    </div>

                    {{-- PAYMENTS TABLE --}}
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <x-table.payments :payments="$payments"/>

                </section>
            </div>
        </div>
    </div>


@endsection
