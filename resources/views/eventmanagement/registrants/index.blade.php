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
                        <a href="{{ route('eventmanagement.index') }}">
                            {{ $event->name }} Registrants
                        </a>
                    </header>
                    <div id="def" class="italic text-sm ml-6">
                        (def. User requesting participation without venue assignment)
                    </div>

                    {{-- USER TABLE --}}
                    <div class="flex flex-col mb-2">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                    <div class="flex justify-end mr-2 py-1">
                                        <a href="{{ route('eventmanagement.registrants.download') }}" class="text-sm text-blueGray-800">Download</a>
                                    </div>
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">School</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Venue</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">First Date</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Plaque</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ensembles</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users AS $user)

                                            <tr class="bg-white @if($loop->odd) bg-blueGray-200 @endif ">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->school->shortname }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 @if($user->currentFirstChoiceVenue->venue->id === 2) uppercase font-bold @endif">
                                                    {{ $user->currentFirstChoiceVenue->venue->shortname}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                    {{ $user->currentFirstChoiceVenue->venue->startDateMdy}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $user->userOptionPermission ? 'Y' : 'N' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $user->userOptionPlaque ? 'Y' : 'N' }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">{{ $user->ensembleCount }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500 font-medium ">
                                                    <a href="{{ route('eventmanagement.registrant.edit',['user' => $user]) }}"
                                                       class="text-indigo-600 hover:text-blueGray-800 bg-indigo-100 px-2 border border-blueGray-300 rounded "
                                                    >
                                                        Edit
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>



                <!-- {{--

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
                {{-- ENSEMBLES
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
                            @empty <li>
                                <a href="{{ route('user.ensembles') }}">
                                    No ensembles found
                                </a>
                            </li>
                            @endforelse
                        </ul>
                    </div>

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
        --}} -->
    </div>


@endsection
