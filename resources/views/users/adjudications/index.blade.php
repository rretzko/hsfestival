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
                <div class="flex flex-col bg-white ">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 ">

                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 text-black" >
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            ###
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Ensemble<br />
                                            Adjudicator (part)
                                            Adjudication
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{-- ROWS --}}
                                    @forelse($adjudications AS $adjudication)
                                        <tr class="@if($loop->odd) bg-gray-100 @else bg-white @endif">
                                            <td class="text-center text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <div class="text-center">
                                                    {{ $adjudication->ensemble->name }}<br />
                                                    {{ $adjudication->adjudicator->fullnameAlpha }} ( {{ $adjudication->part }})<br />
                                                </div>
                                                {!! $adjudication->mp3Player !!}
                                            </td>

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

            </div>

        </div>
    </div>


@endsection
