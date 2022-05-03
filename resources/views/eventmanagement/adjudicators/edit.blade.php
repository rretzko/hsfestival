@extends('layouts.user')

@section('content')

    <div class="flex row">

        <x-menus.mobile />

        <x-menus.sidebar />

        <div class="flex row text-white space-x-2">

            <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
                {{-- HEADER --}}
                <section class="border mb-1 px-2 rounded">

                    <header class="uppercase">
                        <a href="{{ route('eventmanagement.adjudicators.create') }}">
                            Adjudicators
                        </a>
                    </header>

                    {{-- ADJUDICATOR FORM --}}
                    <div class="flex flex-col mb-2">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                <style>
                                    .input-group{display: flex; flex-direction: column; margin-bottom: 2px; color: black;}
                                    label{color: white;}
                                </style>
                                <form method="POST" action="{{ route('eventmanagement.adjudicators.update', $adjudicator) }}" >

                                    @csrf

                                    <div class="input-group">
                                        <label for="user_id">Adjudicator Name</label>
                                        <div class="flex flex-row">
                                            <input class="mr-2" type="text" name="first" id="first"
                                                   placeholder="First name"
                                                    value="{{ $adjudicator->first }}"
                                            />
                                            <input type="text" name="last" id="last"
                                                   placeholder="Last name"
                                                   value="{{ $adjudicator->last }}"
                                            />
                                        </div>
                                        <div>
                                        @error('first')
                                        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                        @enderror
                                        @error('last')
                                        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <label for="title">Title</label>
                                        <div class="flex flex-row">
                                            <input class="" type="text" name="title" id="title"
                                                   placeholder="Dr., Mr., Ms., etc..."
                                                   value="{{ $adjudicator->title }}"
                                            />
                                        </div>
                                        <div>
                                            @error('title')
                                            <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-group">
                                        <label for="from">From</label>
                                        <div class="flex flex-row">
                                            <input class="" type="text" name="from" id="from"
                                                   placeholder="University, Organization, etc..."
                                                   value="{{ $adjudicator->from }}"
                                            />
                                        </div>
                                        <div>
                                            @error('from')
                                            <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-group mt-4">
                                        <label> </label>
                                        <input class="text-blueGray-800 px-2" type="submit" name="submit" value="Submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- ADJUDICATORS TABLE --}}
                     <x-table.adjudicators :adjudicators="$adjudicators" :currentevent="$currentevent" />

                </section>
            </div>
        </div>
    </div>


@endsection
