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

                                {{-- VENUE NAVIGATION --}}
                                <div class="">
                                    <div class="sm:hidden">
                                        <label for="tabs" class="sr-only">Select a tab</label>
                                        <!-- Use an "onChange" listener to redirect the user to the selected tab URL. -->
                                        <select id="venues" name="venues" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                            @forelse($venues AS $venue)
                                                <option value="{{ $venue->id }}" class="bg-red-500">{{ $venue->shortname.': '.$venue->startDateMdY }}</option>
                                            @empty
                                                <option value="0">No venues found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="hidden sm:block px-2 my-2" style="">
                                        <nav class="relative z-0 rounded-lg shadow flex divide-x divide-gray-200" aria-label="Tabs">
                                            <a href="{{ route('eventmanagement.registrants.index') }}" class="rounded mr-1 text-gray-900 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10" aria-current="page">
                                                <span>All</span>
                                                <span aria-hidden="true" class="bg-indigo-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                                            </a>
                                            @forelse($venues AS $venue)
                                                <a href="{{ route('eventmanagement.registrants.index',['venue' => $venue]) }}" class="rounded mr-1 text-gray-900 group relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium text-center hover:bg-gray-50 focus:z-10" aria-current="page">
                                                    <span>{{ $venue->shortname.': '.$venue->startDateMdY }}</span>
                                                    <span aria-hidden="true" class="bg-indigo-500 absolute inset-x-0 bottom-0 h-0.5"></span>
                                                </a>
                                            @empty
                                                No Venues Found
                                            @endforelse

                                        </nav>
                                    </div>
                                </div>


                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                    <div class="flex justify-end mr-2 py-1">
                                        <a href="{{ route('eventmanagement.registrants.download') }}" class="text-sm text-blueGray-800">Download</a>
                                    </div>
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name/Email</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">School/Cell</th>
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
                                        @forelse($users AS $user)

                                            <tr class="bg-white @if($loop->odd) bg-blueGray-200 @endif ">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $user->name }}<br />
                                                    <span class="text-sm">{{ $user->email }}</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $user->school->shortname }}<br />
                                                    {{ $user->phones->where('phonetype_id',1)->first() ? $user->phones->where('phonetype_id',1)->first()->formatPhone() : '' }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 @if($user->currentFirstChoiceVenue && ($user->currentFirstChoiceVenue->venue->id === 2)) uppercase font-bold @endif">
                                                    {{ $user->currentFirstChoiceVenue ? $user->currentFirstChoiceVenue->venue->shortname : 'none found'}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 ">
                                                    {{ $user->currentFirstChoiceVenue ? $user->currentFirstChoiceVenue->venue->startDateMdy : 'none found'}}
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
                                        @empty
                                            <tr><td colspan="8" class="text-center text-black">No registrants found</td> </tr>
                                        @endforelse

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
