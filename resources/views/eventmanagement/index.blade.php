@extends('layouts.user')

@section('content')

    <div class="flex row">

        <x-menus.mobile />

        <x-menus.sidebar />

        <div class="flex row text-white space-x-2">

            <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
                <div class="border mb-1 px-2 rounded py-4">
                    {{-- MENU --}}
                    <section >

                        <header class="uppercase">
                            <a href="{{ route('eventmanagement.index') }}">
                                Event Management
                            </a>
                        </header>
                        <ol class="ml-12" style="list-style-type: decimal;">
                            <li>
                                <a href="{{ route('eventmanagement.registrants.index') }}">Registrants</a>
                            </li>

                            <li>
                                <a href="{{ route('eventmanagement.participants.index') }}">Participants [under development]</a>
                            </li>

                            <li>
                                <a href="{{ route('eventmanagement.passwordreset.index') }}">Password Reset</a>
                            </li>

                            <li>
                                <a href="{{ route('eventmanagement.loginas.index') }}">Log In As...</a>
                            </li>
                        </ol>
                    </section>
                    <section class="mt-2">
                        <header class="uppercase">
                            <a href="{{ route('eventmanagement.index') }}">
                                Scheduling
                            </a>
                        </header>
                        <ol class="ml-12" style="list-style-type: decimal;">
                            <li>
                                <a href="{{ route('eventmanagement.scheduling.days') }}">
                                    Assign Venues + Days
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('eventmanagement.scheduling.timeslots') }}">
                                    Assign Timeslots
                                </a>
                            </li>
                        </ol>
                    </section>
                </div>
            </div>
        </div>

@endsection
