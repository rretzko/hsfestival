@extends('layouts.user')

@section('content')

    <div class="flex row">

        <x-menus.mobile/>

        <x-menus.sidebar/>

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
                                <div class="font-bold min-w-48 mr-2">Email</div>
                                <div>
                                    <a href="{{ route('user.profile') }}" title="Change on Profile page">
                                        {{ auth()->user()->email ? auth()->user()->email : 'No email found'}}
                                    </a>
                                </div>
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
                                        {{ auth()->user()->membership ? ucfirst(auth()->user()->membership->membershiptype->descr) : 'Non-member'}}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

                <section class="border mb-1 px-2 rounded">
                    <header class="uppercase">
                        <a href="{{ route('user.options') }}">
                            {{ $event->name }} Options
                        </a>
                    </header>
                    <div class="pl-3">
                        <ul class=list-disc">

                            <li class="flex mb-2">
                                <div class="font-bold min-w-48 mr-2">Venues</div>
                                <div>
                                    <ol>
                                        @foreach(auth()->user()->useroptionsvenues->sortBy('venue.startdate') AS $venue)
                                            <li>
                                                {{ $venue->venue->startDateDmdy }}: {{ $venue->venue->name }}
                                                : {{ $venue->preferenceDescr }}
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </li>

                            @forelse($useroptions AS $useroption)

                                <li class="flex mb-2">
                                    <div
                                        class="font-bold min-w-48 mr-2">{{ ucwords(str_replace('_', ' ', $useroption->option->descr)) }} </div>
                                    <div>{{ str_replace('*',' ', $useroption->valueDescription) }}</div>
                                </li>
                            @empty
                                <li>
                                    <a href="{{ route('user.options') }}">
                                        Click here to confirm or review your Options.
                                    </a>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </section>

                {{-- ENSEMBLES --}}
                <section class="border mb-1 px-2 rounded">
                    <header class="uppercase">
                        <a href="{{ route('user.ensembles') }}">
                            Ensembles
                        </a>
                    </header>
                    <div class="pl-3 ">
                        <ul class="">
                            @forelse($ensembles AS $ensemble)
                                <li class="flex mb-2 list-decimal">
                                    <div class=" min-w-48 mr-2 font-bold">
                                        <a href="{{ route('user.ensembles.edit', ['ensemble' => $ensemble]) }}">
                                            {{ $ensemble->name }}
                                        </a>
                                        <span class="font-normal"
                                            style="@if($ensemble->ensembleVenueAssignmentDescr !== 'Pending') color: greenyellow; @endif"
                                          >
                                            - Assignment: {{ $ensemble->ensembleVenueAssignmentDescr }}
                                        </span>
                                        <span>
                                            - Member count: {{ $ensemble->membercount }}
                                        </span>
                                        @forelse($ensemble->repertoire AS $rep)
                                            <div class="ml-6 font-normal text-md">
                                                <a href="{{ route('user.repertoire.edit', ['repertoire' => $rep]) }}">
                                                    {{ $rep->title }} ({{ $rep->duration }})
                                                </a>
                                            </div>
                                        @empty
                                            <div>No repertoire found</div>
                                        @endforelse

                                    </div>
                                </li>
                            @empty
                                <li>
                                    <a href="{{ route('user.ensembles') }}">
                                        No ensembles found
                                    </a>
                                </li>
                            @endforelse
                        </ul>

                        <div class="text-sm mb-2">
                            @if(isset($assignment) && $assignment)
                                Please contact
                                <a href="mailto:jwilson@brrsd.k12.nj.us?subject=Change in HS Festival Assignment&body=Hi John - I am requesting the following venue assignment changes:" style="color: greenyellow;">
                                    John Wilson
                                </a> if a change in the assignment is required.
                            @endif
                        </div>

                    </div>

                </section>
                <section class="uppercase border mb-1 px-2 rounded">
                    Sight Reading
                </section>
                <section class="uppercase border mb-1 px-2 rounded">
                    Payment
                    <div class="pl-3">
                        <ul class=list-disc">
                            <li class="flex mb-2">
                                <div class="font-bold min-w-48 mr-2">Due</div>
                                <div title="Payment Due">
                                    ${{ number_format(auth()->user()->paymentDue, 2) }}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pl-3">
                        <ul class=list-disc">
                            <li class="flex mb-2">
                                <div class="font-bold min-w-48 mr-2">Paid</div>
                                <div title="Payment Due">
                                    ${{ number_format(auth()->user()->paymentPaid, 2) }}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pl-3">
                        <ul class=list-disc">
                            <li class="flex mb-2">
                                <div class="font-bold min-w-48 mr-2">Balance</div>
                                <div title="Payment Due">
                                    ${{ number_format(auth()->user()->paymentBalance, 2) }}
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                <section class="uppercase border mb-1 px-2 rounded">
                    Recordings
                </section>
            </div>
        </div>
    </div>


@endsection
