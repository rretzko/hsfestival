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
                        <a href="{{ route('recordingengineer.create') }}">
                            Add or Edit Recordings
                        </a>
                    </header>

                    {{-- RECORDING UPLOAD FORM --}}
                    <div class="flex flex-col mb-2">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                                <style>
                                    .input-group{display: flex; flex-direction: column; margin-bottom: 2px; color: black;}
                                    label{color: white;}
                                </style>
                                <form method="POST" action="{{ route('recordingengineer.store') }}" enctype='multipart/form-data'>

                                    @csrf

                                    <div class="input-group">
                                        <label for="school_id">School ({{ $schools->count() }})</label>
                                        <select name="school_id" autofocus>
                                            <option value="0">Select</option>
                                            @foreach($schools AS $school)
                                                <option value="{{$school->id }}">{{ $school->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('school_id')
                                        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="ensemble_id">Ensemble ({{ $ensembles->count() }})</label>
                                        <select name="ensemble_id">
                                            <option value="0">Select</option>
                                            @foreach($ensembles AS $ensemble)
                                                <option value="{{$ensemble->id }}">
                                                    {{ $ensemble['school']->name }}: {{$ensemble->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('ensemble_id')
                                        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="adjudicator_id">Adjudicator</label>
                                        <select name="adjudicator_id">
                                            <option value="0">Select</option>
                                            @foreach($adjudicators AS $adjudicator)
                                                <option value="{{$adjudicator->id }}">{{$adjudicator->fullnameAlpha }}</option>
                                            @endforeach
                                        </select>
                                        @error('adjudicator_id')
                                        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="part">Part (for judges submitting multiple recordings)</label>
                                        <select name="part">
                                            @for($i=1;$i<10;$i++)
                                                <option value="{{$i }}">{{$i }}</option>
                                            @endfor
                                        </select>
                                        @error('part')
                                        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        <label for="recording">Recording</label>
                                        <input type="file"
                                               id="recording"
                                               name="recording"
                                               accept="audio/mp3"
                                               filename = "file-upload"
                                               retitle="{{ strtotime(date('Ymdgis')).'.mp3' }}"
                                        />
                                        @error('recording')
                                        <span class="bg-white text-red-500 px-2 text-sm ">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group mt-4 w-1/2" >
                                        <label> </label>
                                        <input class="text-blueGray-800 px-2 rounded-full" style="background-color: rgba(0,255,0,0.4);" type="submit" name="submit" value="Submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div>
                        @if(Session::has('duplicate-record'))
                            <div class="bg-white text-red-600 px-4 ml-6 w-1/2 rounded" style="background-color: rgba(255,0,0,0.1); color: yellow;">
                                You're attempting to load a file duplicating an ensemble + adjudicator + part from the table below.<br />
                                Please check your details and try again...
                            </div>
                        @endif
                    </div>

                    {{-- PAYMENTS TABLE --}}
                    <x-table.adjudications :adjudications="$adjudications" />

                </section>
            </div>
        </div>
    </div>


@endsection
