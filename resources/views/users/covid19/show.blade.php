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

                    <input id="fileSelect" type="file"
                           name="vaccinations" id="vaccinations"
                            accept=".csv"
                    />

                    <x-buttons.submit val="Upload file" />

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
