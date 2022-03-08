@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="eventmanagement"/>

        <x-menus.sidebar active="eventmanagement"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Ensembles: Timeslot Assignment
            </header>

            <div id="summary" class="border border-white mb-4 px-2 sticky z-20 bg-indigo-500" style="top: 5rem;">
                <header class="font-bold">Ensemble Summary</header>
                <style>
                    label{width: 15%; text-align: right; margin-right: .5rem;}

                </style>
                <div class="flex flex-col">

                    <div class="ml-2 flex flex-row">
                        <label>Ensemble count:</label>
                        <data>{{ $ensembles->count() }}</data>
                    </div>
                    <div class="ml-2 flex flex-row underline">
                        <label>Ensembles assigned:</label>
                        <data>{{ $assignments->count() }}</data>
                    </div>

                    @foreach($venues AS $venue)
                        <div class="ml-2 flex flex-row" style="font-size: 1rem;">
                            <label>{{ $venue->descr }}:</label>
                            <data>{{ $venue->ensembleCount }}</data>
                        </div>
                    @endforeach

                </div>
            </div>


            <div class="z-10">
                @foreach($venues AS $venue)
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col bg-white ">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">

                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <header class="uppercase text-white px-2" style="background-color: black;">{{ $venue->descr }}</header>
                                    <table class="min-w-full divide-y divide-gray-200 text-black">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ###
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                School
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Conductor
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Type
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Timeslot
                                            </th>
                                            <th>
                                                <span class="sr-only">Assign</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{-- ROWS --}}
                                        @forelse($venue->ensembles AS $ensemble)
                                            <tr class="@if($loop->odd) bg-gray-100 @else bg-white @endif">
                                                <td class="text-center text-sm">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $ensemble->school->shortname }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $ensemble->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $ensemble->conductor }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $ensemble->ensembletype->descr }}
                                                </td>

                                                {{-- INPUT FORM --}}
                                                <form method="post" action="{{ route('eventmanagement.scheduling.timeslots.update') }}">
                                                    @csrf
                                                    <input type="hidden" name="ensemble_id" value="{{ $ensemble->id }}" />
                                                    <input type="hidden" name="venue_id" value="{{ $venue->id }}" />
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        <select name="timeslot">
                                                            @foreach($timeslots AS $key => $timeslot)

                                                                    <option value="{{ $key }}"
                                                                        @if($ensemble->assignedTimeslot == $key) SELECTED @endif
                                                                    >
                                                                        {{ $timeslot }}<br />
                                                                    </option>

                                                            @endforeach
                                                        </select>

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button type="submit"
                                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                style="background-color: rgba(0,255,0,.1); color: darkgreen; border: 1px solid rgba(30,130,76,0.5);"
                                                        >
                                                            Assign
                                                        </button>
                                                    </td>
                                                </form>
                                                {{-- END OF INPUT FORM --}}

                                            </tr>
                                        @empty
                                            <tr><td colspan="6" class="text-center">No Ensembles found</td></tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>


@endsection
