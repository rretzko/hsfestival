@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="ensembles"/>

        <x-menus.sidebar active="ensembles"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Ensembles: New for {{ auth()->user()->school->name }}
            </header>

            <div>
                <style>
                    input,select{color: black;}
                </style>
                <form method="post" action="{{ route('user.ensembles.store') }}" class="max-w-6xl">

                    @csrf

                    @if(session()->has('warning'))
                        <div class="px-2" style="background-color: rgba(255,0,0,.1); color: white;">
                            {{ session('warning') }}
                        </div>
                    @endif

                    {{-- NAME --}}
                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="name" class="block text-sm font-medium text-white">Ensemble Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="name" id="name"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value=""
                                   aria-invalid="true" aria-describedby="name-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('name')
                        <p class="mt-2 text-sm text-red-100" id="name-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ENSEMBLE TYPE --}}
                    <div class="max-w-3xl mx-auto mb-4">

                        <div class="mt-1 relative rounded-md shadow-sm">
                            <label for="ensembletype_id" class="block text-sm font-medium text-white">Ensemble Type</label>
                            <select name="ensembletype_id">
                                @foreach($ensembletypes AS $ensembletype)
                                    <option value="{{ $ensembletype->id }}">{{ $ensembletype->descr }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('ensembletype_id')
                        <p class="mt-2 text-sm text-red-100" id="ensembletype_id-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- CONDUCTOR --}}
                    <div class="max-w-3xl mx-auto mb-2 ">
                        <label for="conductor" class="block text-sm font-medium text-white">Conductor</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="conductor" id="conductor"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="{{ auth()->user()->name }}"
                                   aria-invalid="true" aria-describedby="conductor-error">
                        </div>
                        @error('conductor')
                        <p class="mt-2 text-sm text-red-100" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-4">

                        {{-- PREFERRED VENUE --}}
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <label for="venue_id" class="block text-sm font-medium text-white">Preferred Venue/Date</label>
                            @if($disabled || ($assignment !== 'Pending'))
                                {{ $preferredvenue->descr }}
                                <input type="hidden" name="venue_id" id="venue_id" value="{{ $preferredvenue->id }}" />
                            @else
                                <select name="venue_id"  >
                                    @foreach($venues AS $venue)
                                        <option value="{{ $venue->id }}"
                                                @if($preferredvenue->id === $venue->id) selected @endif
                                        >
                                            {{ $venue->descr }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        @error('venue_id')
                        <p class="mt-2 text-sm text-red-100" id="ensembletype_id-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- AUDITIONED --}}
                    <div class="max-w-3xl mx-auto mt-4">

                        <div class="mt-2 relative rounded-md shadow-sm flex row space-x-2 ">

                            <div class="">
                                <input type="checkbox" name="auditioned" id="auditioned"
                                      class=""
                                      placeholder=""
                                      value="1"
                                      aria-invalid="true" aria-describedby="auditioned-error"
                                >
                            </div>
                            <label for="auditioned" class="block text-sm text-lg text-white">This is an auditioned ensemble.</label>
                        </div>
                        @error('auditioned')
                        <p class="mt-2 text-sm text-red-100" id="auditioned-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- MEMEBER COUNT --}}
                    <div class="max-w-3xl mx-auto mb-4">

                        <div class="mt-1 relative rounded-md shadow-sm">
                            <label for="membercount" class="block text-sm font-medium text-white">Member Count</label>
                            <select name="membercount">
                                @for($i=1; $i<150; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        @error('membercount')
                        <p class="mt-2 text-sm text-red-100" id="membercount-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-4">
                    <input style="padding: 0.5rem;" class="rounded bg-green-100" type="submit" name="submit"
                              value="Add Ensemble"
                    />
                    </div>


                </form>
            </div>

        </div>
    </div>


@endsection
