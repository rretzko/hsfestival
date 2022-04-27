@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="ensembles"/>

        <x-menus.sidebar active="ensembles"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Covid-19 status for {{ auth()->user()->school->name }}
            </header>

            <div>
                <style>
                    input,select{color: black;}
                </style>
                <form method="post" action="{{ route('user.covid19status.update', $vaccination) }}" class="max-w-6xl p-4 mb-4"
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
                                      value="{{ $vaccination->first }}"
                                      aria-invalid="true" aria-describedby="first-error">
                                @error('first')
                                <p class="mt-2 text-sm text-red-600" id="first-error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="last" id="last"
                                       class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                       placeholder="Last name"
                                       value="{{ $vaccination->last }}"
                                       aria-invalid="true" aria-describedby="last-error">
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
                                        <option value="{{ $vaccinationtype->id }}"
                                            @if($vaccination->vaccinationtype_id == $vaccinationtype->id) selected @endif
                                        >
                                            {{ $vaccinationtype->descr }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('vaccinationtype_id')
                            <p class="mt-2 text-sm text-red-600" id="vaccinationtype_id-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-buttons.submit val="Update Vaccination Status" />
                    </div>
                </form>
            </div>

            {{-- VACCINATIONS TABLE --}}
            <style>
                table{background-color: white;border-collapse: collapse;}
                td,th{border: 1px solid black; padding: 0 0.25rem; color: black;}
            </style>
            <table>
                <caption style="font-size: 0.8rem;border: 1px solid black; background-color: rgba(255,255,255,0.3); color: white;">Click the student's name to edit</caption>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @forelse($vaccinations AS $vaccination)
                    <tr>
                        <td>
                            <a href="{{ route('user.covid19status.edit',$vaccination) }}" style="color: blue;">
                                {{ $vaccination->fullnameAlpha }}
                            </a>
                        </td>
                        <td>{{ $vaccination->vaccinationtype->descr }}</td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="text-center">No Vaccinations found</td></tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>


@endsection
