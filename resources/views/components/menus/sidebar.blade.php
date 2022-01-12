@props([
'active' => 'dashboard',
])

<div id="fixed_sidebar" class=" ">
    <div class="flex items-center flex-shrink-0 px-4 bg-white">
        <img class="h-8 w-auto" src="https://njacda.com/wp-content/uploads/2014/01/njacda2-300x83.png" alt="NJACDA logo">
    </div>
    <nav class="mt-5 flex-1 px-2 space-y-1">

        <a href="{{ route('user.home') }}" class="bg-gray-900 {{ ($active==='dashboard') ? 'text-white' : 'text-gray-300' }} text- group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            Dashboard
        </a>

        <a href="{{ route('user.options') }}" class="{{ ($active==='options') ? 'text-white' : 'text-gray-300' }} hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            Options
        </a>

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
    </nav>
    <div class="flex-shrink-0 flex bg-gray-700 p-4">
        <a href="#" class="flex-shrink-0 w-full group block">
            <div class="flex items-center">
                <div>
                    <img class="inline-block h-9 w-9 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
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
