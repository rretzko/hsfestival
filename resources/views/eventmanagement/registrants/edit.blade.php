@extends('layouts.user')

@section('content')

    <div class="flex row">

        <x-menus.mobile />

        <x-menus.sidebar />

        <div class="flex row text-white space-x-2">

            <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
                {{-- HEADER --}}
                <section class="border mb-1 px-2 rounded pb-4">

                    <header class="uppercase">
                        <a href="{{ route('eventmanagement.index') }}">
                            {{ $event->name }} Registrants
                        </a>
                    </header>
                    <div id="def" class="italic text-sm ml-6">
                        (def. User requesting participation without venue assignment)
                    </div>

                    {{-- REGISTRANT --}}
                    <header id="registrant-header" class="mt-4 my-2">
                        Profile for: <span class="uppercase">{{ $user->name }}</span> <span class="text-sm">({{$user->school->name }})</span>
                    </header>

                    <section id="bio">
                        <style>
                            input{color: black;}
                            .input-group{display: flex; flex-direction: column;}
                        </style>

                        {{-- PROFILE: BIO --}}
                        <form class="border border-white px-2 py-1 space-y-1 mb-4"
                              style=""
                              method="POST" action="{{ route('eventmanagement.registrant.bio.update',['user' => $user]) }}"
                        >

                            @csrf

                            <div class="input-group">
                                <div>Sys.Id. {{ $user->id }} </div>
                            </div>

                            <div class="input-group">
                                <label for="name">Name</label>
                                <input type="text" name='name' value="{{ $user->name }}" />
                                @error('name')
                                <div class="bg-white text-red-500 text-sm px-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="text" name='email' value="{{ $user->email }}" />
                                @error('email')
                                <div class="bg-white text-red-500 text-sm px-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group">
                                <label for="schoolname">School</label>
                                <input type="text" name='schoolname' value="{{ $user->school->name }}" />
                                @error('schoolname')
                                <div class="bg-white text-red-500 text-sm px-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group">
                                <label for="submit"> </label>
                                <div class="flex flex-row my-2">
                                    <input type="submit" value="Update" class="w-28 rounded border border-blueGray-300" />
                                    @if(session()->has('status-bio'))
                                        <div id="status-bio" class="ml-3 px-2 rounded " style="background-color: rgba(0,255,0,0.5);">{{ Session::get('status-bio') }}</div>
                                    @endif
                                </div>
                            </div>

                        </form>

                        {{-- PROFILE: OPTIONS --}}
                        <form class="border border-white px-2 py-1 space-y-1"
                              style="background-color: rgba(0,0,0,0.1);"
                              method="POST" action=""
                        >

                            @csrf

                            <header>OPTIONS</header>

                            <div class="flex flex-row">
                                <label class="ml-4">Venues</label>
                                <div class="flex flex-col" style="margin-left: 6rem;">
                                    @foreach($event->venues->sortBy('start') AS $venue)

                                        <ul class="ml-12">
                                            <li>{{ $venue->startDateDmdy.': '.$venue->name }}</li>
                                            <ul class="ml-6">
                                                <li>
                                                    <select name="venues[{{ $venue->id }}]" id="venue_{{ $venue->id }}" class="text-blueGray-700">
                                                        <option value="1"
                                                                @if($user->useroptionsvenues->count() && $user->useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 1) SELECTED @endif
                                                        >
                                                            1. My first choice
                                                        </option>
                                                        <option value="2"
                                                                @if($user->useroptionsvenues->count() && $user->useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 2) SELECTED @endif
                                                        >
                                                            2. My second preference
                                                        </option>
                                                        <option value="3"
                                                                @if($user->useroptionsvenues->count() && $user->useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 3) SELECTED @endif
                                                        >
                                                            3. My third preference
                                                        </option>
                                                        <option value="4"
                                                                @if($user->useroptionsvenues->count() && $user->useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 4) SELECTED @endif
                                                        >
                                                            4. My fourth preference
                                                        </option>
                                                        <option value="0"
                                                                @if($user->useroptionsvenues->count() && $user->useroptionsvenues->where('venue_id', $venue->id)->first()->preference === 0) SELECTED @endif
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

                            <div class="input-group">
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
                            </div>

                            <div class="input-group">
                                <label for="submit"> </label>
                                <input type="submit" value="Update" class="w-28 rounded border border-blueGray-300 my-2" />
                            </div>
                        </form>
                    </section>
                </section>
            </div>
        </div>
    </div>

    <script>
        window.onload = function(){
            if(document.getElementById('status-bio').innerText.length){
                setTimeout(function(){
                    document.getElementById('status-bio').innerText = "";
                    document.getElementById('status-bio').setAttribute('style','background-color: transparent');
                },3000);
            }
        }
    </script>

@endsection
