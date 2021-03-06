@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="ensembles"/>

        <x-menus.sidebar active="ensembles"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Covid-19 status for {{ auth()->user()->school->name }}
            </header>

            <div id="instructions"
                 class="p-2"
                 style="border: 1px solid black; border-radius: 0.5rem; background-color: rgba(255,255,255,0.3); margin-bottom: 1rem; width: 50%; padding: 0 0.25rem; ">
                <a href="{{ route('user.covid19status') }}">Return to individual participant entry...</a>
            </div>

            <div>
                <style>
                    input,select{color: black;}
                </style>
                <form method="post" action="{{ route('user.covid19status.upload') }}" enctype="multipart/form-data"
                      class="max-w-6xl p-4 mb-4"
                    style="border: 1px solid black; border-radius: 0.5rem; background-color: rgba(255,255,255,0.3);">

                    @csrf

                    @if(session()->has('warning'))
                        <div class="px-2" style="background-color: rgba(255,0,0,.1); color: white;">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <header>CSV Template File</header>
                        <a href="/assets/csvs/vaccination_template.csv" class="pl-4" style="color: yellow;">Click here to download the csv template file.</a>
                    </div>

                    <input id="fileSelect" type="file"
                           name="vaccinations" id="vaccinations"
                            accept=".csv"
                    />

                    <x-buttons.submit val="Upload file" />

                </form>
            </div>

            {{-- VACCINATIONS TABLE --}}
            <x-table.vaccinations :vaccinations="$vaccinations" />

        </div>
    </div>


@endsection
