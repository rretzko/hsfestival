@extends('layouts.app')

@section('content')

    <x-menus.guest/>

    <div class="text-white">
        <img
            src="https://njacda.com/wp-content/uploads/2014/01/1524725_10206920933608488_2344636879262137296_n-960x430.jpg"
            height="50%"  style="margin: auto;">
    </div>
<section class="relative w-full h-full py-40 min-h-screen">
    <div class="container mx-auto px-4 h-full">
        <div class="flex content-center items-center justify-center h-full">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-sm font-bold">
                                {{ __('global.register') }} <br /><span style="color: red">All fields are required!</span>
                            </h6>
                            <div style="border: 1px solid red; padding: 0.5rem; margin-top: 1rem;">
                                <p>If you participated in either the High School Festival or Summer Conference of 2022,
                                    you are already in the system.
                                </p>
                                <p>
                                    Please <a href="{{ route('login') }}" style="color: blue;" >click here</a> or use the
                                    '<a href="{{ route('login') }}" style="color: blue;"  >Login</a>' above to log in.
                                    If you have forgotten your password, you will find the
                                    '<a href="password/reset" style="color: blue;">Forgot your password</a>' link on
                                    the Log In page.
                                </p>
                            </div>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300" />
                    </div>
                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        @if(! \App\Models\CurrentEvent::isRegistrationOpen())
                            <div class="text-center font-bold">
                                Registration is Closed.
                            </div>
                        @else
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="name">
                                    {{ __('global.user_name') }}
                                </label>
                                <input id="name" name="name" type="text" placeholder="Firsname Lastname" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('name') ? ' ring ring-red-300' : '' }}" placeholder="{{ __('global.user_name') }}" required autofocus autocomplete="name" value="{{ old('name') }}" />
                                @error('name')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-6">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="email">
                                    {{ __('global.login_email') }}
                                </label>
                                <input id="email" name="email" type="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('email') ? ' ring ring-red-300' : '' }}" placeholder="" required autocomplete="email" value="{{ old('email') }}" />
                                @error('email')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="school">
                                    {{ __('school name') }}
                                </label>
                                <input id="school" name="school" type="text" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('school') ? ' ring ring-red-300' : '' }}" placeholder="" required autocomplete="" value="{{ old('school') }}" />
                                @error('school')
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="phone">
                                    {{ __('cell phone') }}
                                </label>
                                <input id="phone" name="phone" type="tel" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('phone') ? ' ring ring-red-300' : '' }}" placeholder="" required autocomplete="" value="{{ old('phone') }}" />
                                @error('phone')
                                <div class="text-red-500">
                                    <small>{{ $message }}</small>
                                </div>
                                @enderror
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">
                                    {{ __('global.login_password') }}
                                </label>
                                <input id="password" name="password" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full {{ $errors->has('password') ? ' ring ring-red-300' : '' }}" placeholder="" required autocomplete="new-password" />
                                @error('password')
                                    <div class="text-red-500">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password_confirmation">
                                    {{ __('global.confirm_password') }}
                                </label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="" required autocomplete="new-password" />
                            </div>
                            <div class="text-center mt-6">
                                <button class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                                    {{ __('global.register') }}
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
