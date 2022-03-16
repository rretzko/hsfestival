@extends('layouts.user')
@section('content')
    <div class="flex row text-white space-x-2">

        <x-menus.mobile active=""/>

        <x-menus.sidebar active=""/>

        <style>input,select{color: black;}</style>
        <div id="page content" class="bg-indigo-500 w-full h-full ml-6 py-10 px-4 text-xl">
            <header class="uppercase" style="margin-bottom: 2rem;">
                Your Profile
            </header>

            {{-- FORM: PROFILE --}}
            <div class="z-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border border-white pb-4" style="margin-bottom: 2rem;">

                <label class="bg-white text-black z-10 px-2 relative" style="top: -1rem;">Profile</label>

                <form method="post" action="{{ route('user.profile.update') }}">

                    @csrf

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="name" class="block text-sm font-medium text-white">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="name" id="name"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="{{ auth()->user()->name }}" aria-invalid="true" aria-describedby="name-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="email" class="block text-sm font-medium text-white">Email</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="email" name="email" id="email"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder="you@example.com"
                                   value="{{ auth()->user()->email }}" aria-invalid="true" aria-describedby="email-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-buttons.submit val="Update Profile" />

                </form>

            </div>

            {{-- FORM: PHONES --}}
            <div class="z-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border border-white pb-4" style="margin-bottom: 2rem;" >

                <label class="bg-white text-black z-10 px-2 relative" style="top: -1rem;">Phones</label>

                <form method="post" action="{{ route('user.phones.update') }}">

                    @csrf

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="phonecell" class="block text-sm font-medium text-white">Cell Phone</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="tel" name="phonecell" id="phonecell"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->phones->where('phonetype_id', 1)->first())  {{auth()->user()->phones->where('phonetype_id', 1)->first()->phone}} @endif"
                                   aria-invalid="true" aria-describedby="phonecell-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('phonecell')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="phonework" class="block text-sm font-medium text-white">Work Phone</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="tel" name="phonework" id="phonework"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->phones->where('phonetype_id', 2)->first())  {{auth()->user()->phones->where('phonetype_id', 2)->first()->phone}} @endif"
                                   aria-invalid="true" aria-describedby="phonework-error">
                        </div>
                        @error('phonework')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="phonehome" class="block text-sm font-medium text-white">Home Phone</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="tel" name="phonehome" id="phonehome"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->phones->where('phonetype_id', 3)->first())  {{auth()->user()->phones->where('phonetype_id', 3)->first()->phone}} @endif"
                                   aria-invalid="true" aria-describedby="phonehome-error">
                        </div>
                        @error('phonehome')
                        <p class="mt-2 text-sm text-red-600" id="phonehome-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-buttons.submit val="Update Phones" />

                </form>

            </div>

            {{-- FORM: SCHOOL --}}
            <div class="z-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border border-white pb-4" style="margin-bottom: 2rem;" >

                <label class="bg-white text-black z-10 px-2 relative" style="top: -1rem;">School</label>

                <form method="post" action="{{ route('user.school.update') }}">

                    @csrf

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="schoolname" class="block text-sm font-medium text-white">Name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="schoolname" id="schoolname"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->school) {{ auth()->user()->school->name }} @endif"
                                   aria-invalid="true" aria-describedby="schoolname-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('schoolname')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="address1" class="block text-sm font-medium text-white">Address</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="address1" id="address1"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->school) {{ auth()->user()->school->address_1 }} @endif"
                                   aria-invalid="true" aria-describedby="address1-error">
                        </div>
                        @error('address1')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="" class="block text-sm font-medium text-white"></label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="address2" id="address2"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->school) {{ auth()->user()->school->address_2 }} @endif"
                                   aria-invalid="true" aria-describedby="address2-error">
                        </div>
                        @error('address2')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="city" class="block text-sm font-medium text-white">City</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="city" id="city"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->school) {{ auth()->user()->school->city }} @endif"
                                   aria-invalid="true" aria-describedby="city-error">
                        </div>
                        @error('city')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="stateabbr" class="block text-sm font-medium text-white">State</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="stateabbr" id="stateabbr"
                                   class="block pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->school) {{ auth()->user()->school->state_abbr }} @else NJ @endif "
                                   aria-invalid="true" aria-describedby="stateabbr-error">
                        </div>
                        @error('stateabbr')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="postal_code" class="block text-sm font-medium text-white">Zip Code</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="postal_code" id="postal_code"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->school) {{ auth()->user()->school->postal_code }} @endif"
                                   aria-invalid="true" aria-describedby="postal_code-error">
                        </div>
                        @error('postal_code')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-buttons.submit val="Update School" />

                </form>

            </div>

            {{-- FORM: ACDA MEMBERSHIP --}}
            <div class="z-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border border-white pb-4" style="margin-bottom: 2rem;" >

                <label class="bg-white text-black z-10 px-2 relative" style="top: -1rem;">ACDA Membership</label>

                <form method="post" action="{{ route('user.membership.update') }}">

                    @csrf

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="org" class="block text-sm font-medium text-white">Membership Number</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="org" id="org"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="@if(auth()->user()->membership) {{ auth()->user()->membership->org }} @endif"
                                   aria-invalid="true" aria-describedby="org-error">
                        </div>
                        @error('org')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="membershiptype_id" class="block text-sm font-medium text-white">Membership Type</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <select id="membershiptype_id" name="membershiptype_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="1"
                                    @if(auth()->user()->membership && (auth()->user()->membership->membershiptype_id === 1)) selected @endif
                                >
                                    Active
                                </option>
                                <option value="3"
                                        @if(auth()->user()->membership && (auth()->user()->membership->membershiptype_id === 3)) selected @endif
                                >
                                    Life
                                </option>
                                <option value="5"
                                        @if(auth()->user()->membership && (auth()->user()->membership->membershiptype_id === 5)) selected @endif
                                >
                                    Retiree
                                </option>
                            </select>
                        </div>
                        @error('membershiptype_id')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="expiration_date" class="block text-sm font-medium text-white">Expiration Date</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="date" name="expiration_date" id="expiration_date"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="{{ (auth()->user()->membership) ? auth()->user()->membership->expiration_date : ''}}"
                                   aria-invalid="true" aria-describedby="expiration_date-error">
                        </div>
                        @error('expiration_date')
                        <p class="mt-2 text-sm text-red-600" id="email-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-buttons.submit val="Update Membership" />

                </form>

            </div>

            {{-- FORM: PASSWORD --}}
            <div class="z-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 border border-white pb-4" style="margin-bottom: 2rem;" >

                <label class="bg-white text-black z-10 px-2 relative" style="top: -1rem;">Password</label>

                <form method="post" action="{{ route('user.password.update') }}">

                    @csrf

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="current" class="block text-sm font-medium text-white">Current Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="password" name="current" id="current"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="" aria-invalid="true" aria-describedby="current-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('current')
                        <p class="mt-2 text-sm text-red-600" id="current-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="password" class="block text-sm font-medium text-white">New Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="password" name="password" id="password"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="" aria-invalid="true" aria-describedby="password-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('password')
                        <p class="mt-2 text-sm text-red-600" id="password-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="max-w-3xl mx-auto mb-2">
                        <label for="password_confirmation" class="block text-sm font-medium text-white">Confirm Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="block w-full pr-10 border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                                   placeholder=""
                                   value="" aria-invalid="true" aria-describedby="password_confirmation-error">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <!-- Heroicon name: solid/exclamation-circle -->
                                <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600" id="password_confirmation-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-buttons.submit val="Update Password" />

                </form>

            </div>

        </div>
    </div>

@endsection
