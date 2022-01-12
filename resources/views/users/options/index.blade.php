@extends('layouts.user')

@section('content')

    <div class="flex row text-white space-x-2">

        <x-menus.mobile active="options"/>

        <x-menus.sidebar active="options"/>

        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase mb-4">
                Event Options
            </header>
            <form method="post" action="{{ route('user.options.update') }}">

                @csrf

                @foreach($options AS $option)
                    @if($option->optiontype->descr === 'boolean')
                        <x-options.boolean
                            :option=$option
                            :useroptions=$useroptions
                        />
                    @endif
                    @if($option->optiontype->descr === 'checkbox')
                            <x-options.checkbox
                                :option=$option
                                :useroptions=$useroptions
                            />
                        @endif
                @endforeach
                <div>
                    <label for="" style="min-width: 12rem;">
                        Comments:
                    </label>
                    <div>
                        *Any school not scheduled on their first choice of day will be contacted about that during the
                        month of December.
                    </div>
                    <div>
                        **Click here for a sample certificate
                    </div>
                </div>
                <div class="flex justify-end pr-4">
                    <button type="submit"
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 rounded-md bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            style="color: black;"
                    >
                        Update Options
                    </button>
                </div>
            </form>

        </div>
    </div>


@endsection
