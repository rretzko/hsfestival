@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="ensembles"/>

        <x-menus.sidebar active="ensembles"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Ensemble Repertoire
            </header>

            <div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col bg-white ">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">

                            <header class="text-black font-bold">Repertoire for: {{ $ensemble->name }}</header>

                            <div class="flex justify-end mb-4">
                                <a href="{{ route('user.repertoire.create',['event' => $event, 'ensemble' => $ensemble]) }}">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        style="color: black; background-color: rgba(0,255,0,.1);">
                                        Add a NEW repertoire
                                    </button>
                                </a>
                            </div>

                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 text-black">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ###
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Title/Subtitle
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Artists
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Duration
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                        <th>
                                            <span class="sr-only">Remove</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- ROWS --}}
                                    @forelse($repertoire AS $rep)
                                        <tr class="@if($loop->odd) bg-gray-100 @else bg-white @endif">
                                            <td class="text-center text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $rep->title }}<br />
                                                <span class="text-xs italic">{{ $rep->subtitle }}</span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {!! $rep->artistsBlock !!}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                                {{ $rep->duration }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('user.repertoire.edit',['repertoire' => $rep]) }}" class="text-indigo-600 hover:text-indigo-900">
                                                    <button type=""
                                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            style="color: black;"
                                                    >
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('user.repertoire.destroy', ['repertoire' => $rep]) }}" class="text-indigo-600 hover:text-indigo-900">
                                                    <button type=""
                                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            style="background-color: rgba(255,0,0,.1); color: darkred;"
                                                    >
                                                        Remove
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="6" class="text-center">No Repertoire found</td></tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection
