@extends('layouts.user')

@section('content')

    <div class="flex row">

        <x-menus.mobile />

        <x-menus.sidebar />

        <div class="flex row text-white space-x-2">

            <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
                {{-- PROFILE --}}
                <section class="border mb-1 px-2 rounded">
                    <header class="uppercase">
                        <a href="{{ route('user.profile') }}">
                            Profile
                        </a>
                    </header>
                    <div class="pl-3">
                        <ul class=list-disc">
                            <li class="flex mb-2">
                                <div class="font-bold min-w-48 mr-2">Name</div>
                                <a href="{{ route('user.profile') }}" title="Change on Profile page">
                                    <div title="Sys.Id. {{ auth()->id() }}">
                                        {{ auth()->user()->name }}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="pl-3">
                        <ul class=list-disc">
                            <li class="flex mb-2">
                                <div class="font-bold min-w-48 mr-2">School</div>
                                <a href="{{ route('user.profile') }}" title="Change on Profile page">
                                    <div>
                                        {{ auth()->user()->school ? auth()->user()->school->name : 'No school found'}}
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="pl-3">
                        <ul class=list-disc">
                            <li class="flex mb-2">
                                <div class="font-bold min-w-48 mr-2">Cell Phone</div>
                                <div>
                                    <a href="{{ route('user.profile') }}" title="Change on Profile page">
                                        {{ auth()->user()->mobilePhone ? auth()->user()->mobilePhone->phone : 'No phone found'}}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pl-3">
                        <ul class=list-disc">
                            <li class="flex mb-2">
                                <div class="font-bold min-w-48 mr-2">NAfME Membership</div>
                                <div>
                                    <a href="{{ route('user.profile') }}" title="Change on Profile page">
                                        {{ auth()->user()->membership ? auth()->user()->membership->membershiptype_id : 'Non-member'}}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="border mb-1 px-2 rounded">
                    <header class="uppercase">
                        <a href="{{ route('user.options') }}">
                            Options
                        </a>
                    </header>
                    <div class="pl-3">
                        <ul class=list-disc">
                            @forelse($useroptions AS $useroption)

                                <li class="flex mb-2">
                                    <div class="font-bold min-w-48 mr-2">{{ ucwords(str_replace('_', ' ', $useroption->option->descr)) }} </div>
                                    <div>{{ str_replace('*',' ', $useroption->valueDescription) }}</div>
                                </li>
                            @empty <li>
                                <a href="{{ route('user.options') }}">
                                    Click here to confirm or review your Options.
                                </a>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </section>
                <section class="uppercase border mb-1 px-2 rounded">
                    Ensembles
                </section>
                <section class="uppercase border mb-1 px-2 rounded">
                    Sight Reading
                </section>
                <section class="uppercase border mb-1 px-2 rounded">
                    Payment
                </section>
                <section class="uppercase border mb-1 px-2 rounded">
                    Recordings
                </section>
            </div>
        </div>
    </div>


@endsection
