@props([
'active' => 'dashboard',
])

<div id="fixed_sidebar" class=" ">
    <div class="flex items-center flex-shrink-0 px-4 bg-white">
        <img class="h-8 w-auto" src="https://njacda.com/wp-content/uploads/2014/01/njacda2-300x83.png" alt="NJACDA logo">
    </div>
    <nav class="mt-4">

        @if(auth()->user()->roles->where('title', 'Event_Mgr')->first())
            <div class="mb-3">

                <a href="{{ route('eventmanagement.index') }}"
                   class="{{ ($active==='eventmanagement') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 text-sm font-medium rounded-md">
                    Administration
                </a>

            </div>
        @endif

        <div class="mb-3">
            <a href="{{ route('user.home') }}"
              class="bg-gray-900 {{ ($active==='dashboard') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 font-medium rounded-md"
            >
                Dashboard
            </a>
        </div>

        <div class="mb-3">
            <a href="{{ route('user.options') }}"
              class="{{ ($active==='options') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 text-sm font-medium rounded-md">
                Options
            </a>
        </div>


        <div class="mb-3">
           <a href="{{ route('user.ensembles') }}"
               class="{{ ($active==='ensembles') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 text-sm font-medium rounded-md">
                Ensembles
            </a>
        </div>
        <h2 style="color: yellow;">Coming Soon!</h2>
        <div class="mb-3">
            <a href="#"
               class="{{ ($active==='sightreading') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 text-sm font-medium rounded-md">
                Sight Reading
            </a>
        </div>

        <div class="mb-3">
            <a href="#"
               class="{{ ($active==='payment') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 text-sm font-medium rounded-md">
                Payment
            </a>
        </div>

        <div class="mb-3">
            <a href="#"
               class="{{ ($active==='recordings') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 text-sm font-medium rounded-md">
                Recordings
            </a>
        </div>

        <div class="mb-3">
            <a href="{{ route('user.logout') }}"
               class="{{ ($active==='logout') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 text-sm font-medium rounded-md">
                Log Out
            </a>
        </div>
    </nav>
<!-- {{--
    <nav class="mt-5 flex-1 px-2 space-y-1">

        <div class="flex row">
            <!-- {{-- Heroicon name: outline/home
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>

            <a href="{{ route('user.home') }}"
               class="bg-gray-900 {{ ($active==='dashboard') ? 'text-white' : 'text-gray-300' }} group flex items-center px-2 text-sm font-medium rounded-md">
                Dashboard
            </a>

        </div>
        <div class="flex row">
            <a href="{{ route('user.home') }}"
                class="bg-gray-900 {{ ($active==='dashboard') ? 'text-white' : 'text-gray-300' }} group flex items-center px-2 font-medium rounded-md"
            >
                Dashboard
            </a>
        </div>

        <div class="flex row">
            <!-- Heroicon name: outline:badge-check
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
            </svg>
            -->
            <a href="{{ route('user.options') }}"
               class="{{ ($active==='options') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 text-sm font-medium rounded-md">
                Options
            </a>
        </div>

        <a href="#" class="{{ ($active==='ensembles') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            Ensembles
        </a>

        <a href="#" class="{{ ($active==='sightreading') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            Sight Reading
        </a>

        <a href="#" class="{{ ($active==='payment') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            Payment
        </a>

        <a href="#" class="{{ ($active==='recordings') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            Recordings
        </a>
        <a href="{{ route('user.brokensvg') }}" class="{{ ($active==='brokensvg') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            Broken SVG
        </a>
    </nav>
    --}} -->
    <div class="flex-shrink-0 flex bg-gray-700 p-4">
        <a href="{{ route('user.profile') }}" class="flex-shrink-0 w-full group block">
            <div class="flex items-center">
                <!-- {{--
                <div>
                    <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                --}} -->
                <div class="ml-3">
                    <p class="text-sm font-medium text-white">
                        {{ auth()->user()->name }}
                    </p>
                    <p class="text-xs font-medium text-gray-300 group-hover:text-gray-200">
                        View profile
                    </p>
                </div>
            </div>
        </a>
    </div>
</div>
