@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="ensembles"/>

        <x-menus.sidebar active="ensembles"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Adjudications
            </header>

            <div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col ">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">

                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg my-2">

                                {!! $table !!}

                            </div>

                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection
