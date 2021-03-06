<menu class="text-white flex flex-row space-x-2 justify-end px-6">
    <div>
        <a href="{{ route('login') }}">
            Login
        </a>
    </div>
    @if( \App\Models\CurrentEvent::isRegistrationOpen())
        <div class="ml-2">
            <a href="{{ route('register') }}">
                Register
            </a>
        </div>
    @endif
</menu>

<header>
    <div class="text-white text-center">
        <div class="font-bold mt-4" style="font-size: 2rem;">
            The New Jersey Chapter of the American Choral Directors Association
        </div>
        <div class="italic" style="font-style:italic;">presents</div>
        <div class="font-bold" style="font-size: 4rem; color: yellow;">{{ \App\Models\CurrentEvent::currentEvent()->name }}</div>
    </div>
</header>
