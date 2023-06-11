<header>
    <a href="{{ url('/') }}" class="pe-5">
        <img class="logo" src="{{ Vite::asset('resources/img/logo.png') }}" alt="logo">
    </a>

    <div class="d-flex gap-3">
        @guest
            <a href="{{ Route('login') }}">Login</a>

            <a href="{{ Route('register') }}">Registrati</a>
        @else
            <div onclick="window.Func.showMenu(event)" class="d-flex al-menu-data position-relative cursor-pointer">
                <div class="d-flex align-items-center gap-2 al-text-no-wrap">

                    @if (Auth::user()->profile_image == null)
                        <img src="{{ Vite::asset('resources/img/default-user-image.png') }}" alt="err" class="al-profile-image">
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="err" class="al-profile-image">
                    @endif
                    
                    <i class="d-none d-md-block">{{ Auth::user()->name }}</i>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <div class="al-menu">


                    <a href="{{ Route('admin.project.index', Auth::user()->name) }}" class="al-menu-item">
                        <span>Progetti</span>
                    </a>


                    <a href="{{ Route('admin.account.index', Auth::user()->name) }}" class="al-menu-item">
                        <span>Account</span>
                    </a>

                    <a href="{{ Route('admin.profile.index', Auth::user()->name) }}" class="al-menu-item">
                        <span>Profilo</span>
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
