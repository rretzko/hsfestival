@extends('layouts.user')

@section('content')

    <div class="flex row">

        <x-menus.mobile />

        <x-menus.sidebar />

        <div class="flex row text-white space-x-2">

            <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
                <section class="border mb-1 px-2 rounded">
                    <header class="uppercase">
                        <a href="{{ route('user.options') }}">
                            Options
                        </a>
                    </header>
                    <div class="pl-3">
                        <ul class=list-disc">
                            @foreach($useroptions AS $useroption)

                                <li class="flex mb-2">
                                    <div class="font-bold min-w-48 mr-2">{{ ucwords(str_replace('_', ' ', $useroption->option->descr)) }} </div>
                                    <div>{{ str_replace('*',' ', $useroption->valueDescription) }}</div>
                                </li>
                            @endforeach
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
