@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="ensembles"/>

        <x-menus.sidebar active="ensembles"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Ensembles Repertoire: {{ $repertoire->title }} for {{ $ensemble->name }}
            </header>

            <div>
                <style>
                    input,select,textarea{color: black;}
                </style>
                <form method="post" action="{{ route('eventmanagement.repertoire.update', ['repertoire' => $repertoire, 'user' => $user]) }}" class="max-w-6xl">

                    @csrf

                    @if(session()->has('warning'))
                        <div class="px-2" style="background-color: rgba(255,0,0,.1); color: white;">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="name" class="block text-sm font-medium text-white">Title</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="title" id="title"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="{{ $repertoire->title }}"
                                   aria-invalid="true" aria-describedby="title-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('title')
                        <p class="mt-2 text-sm text-red-600" id="title-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="name" class="block text-sm font-medium text-white">Subtitle</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="subtitle" id="subtitle"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="{{ $repertoire->subtitle }}"
                                   aria-invalid="true" aria-describedby="subtitle-error">
                        </div>
                        @error('subtitle')
                        <p class="mt-2 text-sm text-red-600" id="subtitle-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="name" class="block text-sm font-medium text-white">Performance Time</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select name="duration">
                                @foreach($durations AS $item)
                                    <option value="{{ $item }}"
                                        @if($repertoire->duration === $item) selected @endif
                                    >
                                        {{ $item }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('duration')
                        <p class="mt-2 text-sm text-red-600" id="duration-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="movements" class="block text-sm font-medium text-white">Movements</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea cols="60 rows=5" id="movements" name="movements">{{ $repertoire->movements }}</textarea>
                        </div>
                        @error('movements')
                        <p class="mt-2 text-sm text-red-600" id="movements-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field-group border border-white my-2 p-4">
                        <div>
                            <label for="composer" class="block text-sm font-medium text-white">Composer</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="composer" id="composer"
                                       class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                       placeholder=""
                                       value="{{ $repertoire->composer }}"
                                       aria-invalid="true" aria-describedby="composer-error">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <!-- Heroicon name: solid/exclamation-circle -->
                                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            @error('composer')
                            <p class="mt-2 text-sm text-red-600" id="composer-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="arranger" class="block text-sm font-medium text-white">Arranger</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="arranger" id="arranger"
                                       class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                       placeholder=""
                                       value="{{ $repertoire->arranger }}"
                                       aria-invalid="true" aria-describedby="arranger-error">
                            </div>
                            @error('arranger')
                            <p class="mt-2 text-sm text-red-600" id="arranger-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="lyricist" class="block text-sm font-medium text-white">Lyricist</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="lyricist" id=lyricist"
                                       class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                       placeholder=""
                                       value="{{ $repertoire->lyricist }}"
                                       aria-invalid="true" aria-describedby="lyricist-error">
                            </div>
                            @error('lyricist')
                            <p class="mt-2 text-sm text-red-600" id="lyricist-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="choreographer" class="block text-sm font-medium text-white">Choreographer</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="text" name="choreographer" id="choreographer"
                                       class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                       placeholder=""
                                       value="{{ $repertoire->choreographer }}"
                                       aria-invalid="true" aria-describedby="choreographer-error">
                            </div>
                            @error('choreographer')
                            <p class="mt-2 text-sm text-red-600" id=choreographer-error">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-white">Program Notes</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <textarea cols="60 rows=5" id="comments" name="comments">{{ $repertoire->comments }}</textarea>
                        </div>
                        @error('comments')
                        <p class="mt-2 text-sm text-red-600" id="comments-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-buttons.submit val="Update Repertoire" />

                </form>
            </div>

        </div>
    </div>


@endsection
