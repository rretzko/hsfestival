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
                        <a href="{{ route('eventmanagement.loginas.index') }}">
                            Log In As...
                        </a>
                    </header>

                    {{-- LOG-IN-AS FORM --}}
                    <div class="flex flex-col mb-2">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                <style>
                                    .input-group{display: flex; flex-direction: column; margin-bottom: 2px; color: black;}
                                    label{color: white;}
                                </style>
                                <form method="POST" action="{{ route('eventmanagement.loginas.update') }}" >

                                    @csrf

                                    <div class="input-group">
                                        <label for="user_id">Registrant</label>
                                        <select name="user_id">
                                            <option value="0">Select</option>
                                            @foreach($users AS $user)
                                                <option value="{{$user->id }}">{{$user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group mt-4">
                                        <label> </label>
                                        <input class="text-blueGray-800 px-2" type="submit" name="submit" value="Submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection
