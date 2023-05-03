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
                        <a href="{{ route('eventmanagement.plaques.index') }}">
                            Plaques Orders
                        </a>
                    </header>

                    <div>
                        @if(session()->has('success'))
                            <div class="bg-green-100 text-green-800 px-2">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    {{-- ORDERS TABLE --}}
                    <x-table.plaques.orders :plaques="$plaques"/>

                </section>
            </div>
        </div>
    </div>


@endsection
