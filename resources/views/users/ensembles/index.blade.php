@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="ensembles"/>

        <x-menus.sidebar active="ensembles"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Ensembles
            </header>
            <form method="post" action="{{ route('user.ensembles.update') }}">

                @csrf

                <div>Add button</div>
                <div>
                    <h3>Ensembles</h3>
                    <div>
                        <ul>
                            @forelse($ensembles AS $ensemble)
                                <li>{{ $ensemble->name }}</li>
                            @empty
                                <li>Add a New ensemble</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="flex justify-end pr-4">
                    <button type="submit"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            style="color: black;"
                    >
                        Update Ensembles
                    </button>
                </div>
            </form>

        </div>
    </div>


@endsection
