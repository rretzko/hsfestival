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

                            <input type="hidden" name="school_id" id="school_id" value="{{ $user->school->id }}" />

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
                        <form class="border border-white px-2 py-1 space-y-1 mb-4"
                              style="background-color: rgba(0,0,0,0.1);"
                              method="POST" action="{{ route('eventmanagement.registrant.options.update',['user' => $user]) }}"
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
                                <div class="flex flex-row my-2">
                                    <input type="submit" value="Update" class="w-28 rounded border border-blueGray-300 my-2" />
                                    @if(session()->has('status-options'))
                                        <div id="status-options" class="ml-3 px-2 rounded " style="background-color: rgba(0,255,0,0.5);">{{ Session::get('status-options') }}</div>
                                    @endif
                                </div>
                            </div>
                        </form>

                        {{-- PROFILE: ENSEMBLES --}}
                        <section class="border border-white px-4">

                            <header>ENSEMBLES</header>

                            @forelse($user->ensembles AS $ensemble)

                                <form class="border border-white px-2 py-1 space-y-1 mb-4"
                                      style=""
                                      method="POST" action="{{ route('eventmanagement.registrant.ensembles.update',['user' => $user,'ensemble' => $ensemble]) }}"
                                >
                                    @csrf

                                    <div class="max-w-3xl mx-auto mb-2">
                                        <label for="name" class="block text-sm font-medium text-white">Ensemble Name</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <input type="text" name="name" id="name"
                                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                                   placeholder=""
                                                   value="{{ $ensemble->name }}"
                                                   aria-invalid="true" aria-describedby="name-error">
                                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                                <!-- Heroicon name: solid/exclamation-circle -->
                                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                        @error('name')
                                        <p class="mt-2 text-sm text-red-600" id="name-error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="max-w-3xl mx-auto mb-4">

                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <label for="ensembletype_id" class="block text-sm font-medium text-white">Ensemble Type</label>
                                            <select name="ensembletype_id" class="text-blueGray-800">
                                                @foreach($ensembletypes AS $ensembletype)
                                                    <option value="{{ $ensembletype->id }}"
                                                            @if($ensemble->ensembletype_id === $ensembletype->id) selected @endif
                                                    >
                                                        {{ $ensembletype->descr }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('ensembletype_id')
                                        <p class="mt-2 text-sm text-red-600" id="ensembletype_id-error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="max-w-3xl mx-auto mb-2 ">
                                        <label for="conductor" class="block text-sm font-medium text-white">Conductor</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <input type="text" name="conductor" id="conductor"
                                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                                   placeholder=""
                                                   value="{{ $ensemble->conductor }}"
                                                   aria-invalid="true" aria-describedby="conductor-error">
                                        </div>
                                        @error('conductor')
                                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="max-w-3xl mx-auto mt-4">

                                        <div class="mt-2 relative rounded-md shadow-sm flex row space-x-2 ">

                                            <div class="">
                                                <input type="checkbox" name="auditioned" id="auditioned"
                                                       class=""
                                                       placeholder=""
                                                       value="1"
                                                       aria-invalid="true" aria-describedby="auditioned-error"
                                                       @if( $ensemble->auditioned == 1) checked @endif
                                                >
                                            </div>
                                            <label for="auditioned" class="block text-sm text-lg text-white">This is an auditioned ensemble.</label>
                                        </div>
                                        @error('auditioned')
                                        <p class="mt-2 text-sm text-red-600" id="auditioned-error">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="submit"> </label>
                                        <div class="flex flex-row mb-2">
                                            <input type="submit" value="Update {{ $ensemble->name }}" class="px-2 mb-2 rounded border border-blueGray-300" />
                                            @if(session()->has("status-ensembles-$ensemble->id"))
                                                <div id="status-ensembles-{{ $ensemble->id }}" class="ml-3 px-2 rounded ensemble" style="background-color: rgba(0,255,0,0.5);" >
                                                    {{ Session::get('status-ensembles-'.$ensemble->id) }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <header>Repertoire</header>
                                    <div class="shadow overflow-hidden sm:rounded-lg ">
                                        <table class="min-w-full divide-y divide-gray-200 text-black mb-2">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                    ###
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                    Title/Subtitle
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                    Artists
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
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
                                            @forelse($ensemble->repertoire AS $rep)
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
                                                        <a href="{{ route('eventmanagement.repertoire.edit',['repertoire' => $rep, 'user' => $user]) }}" class="text-indigo-600 hover:text-indigo-900 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                            Edit
                                                        </a>
                                                    </td>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a href="{{ route('eventmanagement.repertoire.destroy', ['repertoire' => $rep, 'user' => $user]) }}" class="text-indigo-600 hover:text-indigo-900 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            style="background-color: rgba(255,0,0,.1);"
                                                        >
                                                            Remove
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="6" class="bg-white text-center">No Repertoire found</td></tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                    </div>

                                </form>



                            @empty
                                No ensemble found
                            @endforelse

                        </section>

                    </section>
                </section>
            </div>
        </div>
    </div>

    <script>
        window.onload = function(){

            if((document.getElementById('status-bio') != null) && document.getElementById('status-bio').innerText.length){
                setTimeout(function(){
                    document.getElementById('status-bio').innerText = "";
                    document.getElementById('status-bio').setAttribute('style','background-color: transparent');
                },3000);
            }

            if((document.getElementById('status-options') != null) && document.getElementById('status-options').innerText.length){
                setTimeout(function(){
                    document.getElementById('status-options').innerText = "";
                    document.getElementById('status-options').setAttribute('style','background-color: transparent');
                },3000);
            }

            if((document.getElementById('status-ensembles') != null) && document.getElementById('status-ensembles').innerText.length){
                setTimeout(function(){
                    document.getElementById('status-ensembles').innerText = "";
                    document.getElementById('status-ensembles').setAttribute('style','background-color: transparent');
                },3000);
            }

            var els = document.getElementsByClassName("ensemble");

            Array.prototype.forEach.call(els, function(e1){
               setTimeout(function(){
                   e1.innerText = "";
                   e1.setAttribute('style', 'background-color: transparent');
               },3000);

            });

        }



    </script>

@endsection
