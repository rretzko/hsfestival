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
                 style="border: 1px solid black; border-radius: 0.5rem; background-color: rgba(255,255,255,0.3); margin-bottom: 1rem; width: 50%; padding: 0.25rem 0.5rem;">
                Upload individual participants using the form below, or
                <a href="{{ route('user.covid19status.show') }}" style="color: yellow;">
                    click here to create a mass upload
                </a>
                using a .csv file.
            </div>

            <div>
                <style>
                    input,select{color: black;}
                </style>
                <form method="post" action="{{ route('user.covid19status.store') }}" class="max-w-6xl p-4 mb-4"
                    style="border: 1px solid black; border-radius: 0.5rem; background-color: rgba(255,255,255,0.3);">

                    @csrf

                    @if(session()->has('warning'))
                        <div class="px-2" style="background-color: rgba(255,0,0,.1); color: white;">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="first" class="block text-sm font-medium text-white">Participant Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm flex flex-row flex-wrap">
                            <div class="mr-2">
                                <input type="text" name="first" id="first"
                                      class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                      placeholder="First name"
                                      value=""
                                      aria-invalid="true" aria-describedby="first-error"
                                      required
                                >
                                @error('first')
                                <p class="mt-2 text-sm text-red-600" id="first-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="last" id="last"
                                       class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                       placeholder="Last name"
                                       value=""
                                       aria-invalid="true" aria-describedby="last-error"
                                       required
                                >
                                @error('last')
                                <p class="mt-2 text-sm text-red-600" id="last-error">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="max-w-3xl mx-auto mb-4">

                            <div class="mt-1 relative rounded-md shadow-sm">
                                <label for="vaccinationtype_id" class="block text-sm font-medium text-white">Vaccination Status</label>
                                <select name="vaccinationtype_id">
                                    @foreach($vaccinationtypes AS $vaccinationtype)
                                        <option value="{{ $vaccinationtype->id }}">{{ $vaccinationtype->descr }}</option>
                                    @endforeach
                                </select>
                                <div style="color: yellow; font-size: .8rem;">
                                    Note: Choosing 'none' indicates that this student will show a photo of a negative PCR test taken within 72 hours of the festival to a festival organizer.
                                </div>
                            </div>
                            @error('vaccinationtype_id')
                            <p class="mt-2 text-sm text-red-600" id="vaccinationtype_id-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-buttons.submit val="Add Vaccination Status" />
                    </div>
                </form>
            </div>

            {{-- VACCINATIONS TABLE --}}
            <x-table.vaccinations :vaccinations="$vaccinations" />

        </div>
    </div>


@endsection
