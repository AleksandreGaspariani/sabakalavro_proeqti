<nav class="navbar d-flex justify-content-between ps-5 pe-5">

    <a class="navbar-brand text-white"  href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
    </a>


    @guest
        <div class="d-flex">
{{--            <a href="{{ route('new') }}" class="nav-link">{{ __("What's New") }}</a>--}}
            <a href="#" class="nav-link text-white-50">{{ __("What's New") }}</a>
            @if (Route::has('login'))
                <a class="nav-link text-white-50" href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
            @if (Route::has('register'))
                <a class="nav-link text-white-50" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </div>

    @else
        <div class="d-flex align-items-center justify-content-evenly">
            <a class="nav-link text-white-50" href="/home">
                Logged as: <span>{{ Auth::user()->name }}</span>
            </a>
            <a class="btn btn-outline-danger ms-5 text-white-50" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    @endguest
</nav>
