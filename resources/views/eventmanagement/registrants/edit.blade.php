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
                        <form class="border border-white px-2 py-1 space-y-1" method="POST" action="" >

                            @csrf

                            <div class="input-group">
                                <label for="name">Name</label>
                                <input type="text" value="{{ $user->name }}" />
                            </div>

                            <div class="input-group">
                                <label for="email">Email</label>
                                <input type="text" value="{{ $user->email }}" />
                            </div>

                            <div class="input-group">
                                <label for="schoolname">School</label>
                                <input type="text" value="{{ $user->school->name }}" />
                            </div>

                            <div class="input-group">
                                <label for="submit"> </label>
                                <input type="submit" value="Update" class="w-28 rounded border border-blueGray-300" />
                            </div>

                        </form>
                    </section>
                </section>
            </div>
        </div>
    </div>

@endsection
