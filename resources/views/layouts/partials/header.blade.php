<header>
    <a href="{{ url('/') }}" class="pe-5">
        <img class="logo" src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo">
    </a>

    <div class="d-flex gap-3">
        @guest
            <a href="{{ Route('login') }}">Login</a>

            <a href="{{ Route('register') }}">Registrati</a>
        @else
            <div onclick="window.alFunc.showMenu(event)" class="d-flex al-menu-data position-relative al-cursor-pointer">
                <div class="d-flex align-items-center gap-2 al-text-no-wrap">

                    @if (Auth::user()->profile_image != null)
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="err" class="al-profile-image">
                    @endif

                    @if (Auth::user()->profile_image == null)
                        <i>{{ Auth::user()->name }}</i>

                    @else
                        <i class="d-none d-md-block">{{ Auth::user()->name }}</i>
                    @endif
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <div class="al-menu">
                    <a href="{{ Route('admin.dashboard') }}" class="al-menu-item">
                        <span>Dashboard</span>
                    </a>

                    <div class="al-menu-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span >Logout</span>
                    </div>



                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </div>
            </div>
        @endguest
    </div>
</header>

@auth

@endauth
