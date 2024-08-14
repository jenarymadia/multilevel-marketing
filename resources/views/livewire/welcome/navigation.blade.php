<div>
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Dashboard
        </a>
    @else
        <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Log in <span aria-hidden="true"></span></a>

        @if (Route::has('register'))
            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Register <span aria-hidden="true"></span></a>
        @endif
    @endauth
</div>
