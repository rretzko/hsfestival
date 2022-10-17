@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="options"/>

        <x-menus.sidebar active="options"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Options
            </header>
            <form method="post" action="{{ route('user.options.update') }}">

                @csrf

                {{-- VENUES --}}
                <div class="flex row">
                    <label for="" style="min-width: 12rem;">Venue Choice</label>
                    <div class="ml-2 flex flex-col">
                        @foreach($event->venues->sortBy('start') AS $venue)
{{-- echo {{ $venue->id }}
{{ dd($useroptionsvenues) }}
---}}
                            <ul>
                                <li>{{ $venue->startDateDmdy.': '.$venue->name }}</li>
                                <ul class="ml-6">
                                    <li>
                                        <select name="venues[{{ $venue->id }}]" id="venue_{{ $venue->id }}" class="text-blueGray-700">
                                            <option value="1"
                                                @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 1) SELECTED @endif
                                            >
                                                1. My first choice
                                            </option>
                                            <option value="2"
                                                    @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 2) SELECTED @endif
                                            >
                                                2. My second preference
                                            </option>
                                            <option value="3"
                                                    @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 3) SELECTED @endif
                                            >
                                                3. My third preference
                                            </option>
                                            <option value="4"
                                                    @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 4) SELECTED @endif
                                            >
                                                4. My fourth preference
                                            </option>
                                            <option value="0"
                                                    @if($useroptionsvenues->count() && $useroptionsvenues->where('venue_id', $venue->id)->first() && $useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 0) SELECTED @endif
                                            >
                                                5. I cannot participate on this date
                                            </option>
                                        </select>
                                    </li>
                                </ul>
                            </ul>
                        @endforeach
                        @error('venues')
                            <div class="bg-white text-red-500 text-sm px-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @foreach($options AS $option)

                    @if($option->optiontype->descr === 'boolean')
                        <x-options.boolean
                            :option=$option
                            :useroptions=$useroptions
                        />
                    @endif
                    @if($option->optiontype->descr === 'checkbox')
                            <x-options.checkbox
                                :option=$option
                                :useroptions=$useroptions
                            />
                        @endif

                @endforeach
                <div>
                    <label for="" style="min-width: 12rem;">
                        Comments:
                    </label>
                    <div>
                        *Any school not scheduled on their first choice of day will be contacted.
                    </div>
                </div>
                <div class="flex justify-end pr-4">
                    <button type="submit"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            style="color: black;"
                    >
                        Update Options
                    </button>
                </div>
            </form>

        </div>
    </div>


@endsection
