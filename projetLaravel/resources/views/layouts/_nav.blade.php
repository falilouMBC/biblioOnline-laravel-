<div class=" container-fluid bg-dark w-100 h-15 fixed-top mb-5">
    <div class="row justify-content-center">
        <nav class="navbar bg-gray-800 navbar-expand-sm navbar-dark">
            @if (Route::has('login'))
            @auth
            <div class="col-2 col-lg-2 justify-content-start mr-3 text-center">
                <a href="{{ url('/home') }}" class="navbar-brand mr-3">
                    <span class="text-gray-400 hover:text-white"><i class="fa-solid fa-book"></i> eLIBRARY</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="justify-content-center lg:justify-content-end lg:text-lg collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if (Auth::user()->is_admin)
                    <li class="nav-item active">
                        <a href="/admin" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white hover:break-after-column"><i class="fa fa-desktop" aria-hidden="true"></i> Admin</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item active">
                        <a href="{{route('home')}}" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white hover:break-after-column"><i class="fas fa-book-reader    "></i> Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="{{ route('epreuvesUser.create') }}" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white"><i class="fas fa-book-open    "></i> Poster une epreuve</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <span class="d-none d-md-inline"><i class="fa-solid fa-user"></i> Profil</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- Menu Footer-->
                            <li class="user-footer mx-3">
                                <a href="{{ route('profil') }}" class="btn btn-default btn-flat "><i class="fa fa-cog" aria-hidden="true"></i> Profile</a>
                            </li>
                            <li class="user-footer mx-auto">
                                <a href="#" class="btn btn-default btn-flat float-right"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                @else
            <div class="col-lg-2 col-lg-2 text-center">
                <a href="{{ url('/') }}" class="navbar-brand mr-5">
                    <span class="text-gray-400 hover:text-white"><i class="fa-solid fa-book"></i> eLIBRARY</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col justify-content-end text-center mx-5 lg:text-lg collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white"><i class="fa fa-sign-in" aria-hidden="true"></i> Se connecter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white"><i class="fa fa-user-plus" aria-hidden="true"></i> S'inscrire</span>
                        </a>
                    </li>
                </ul>
            </div>
                @endif
            @endif
        </nav>

    </div>
</div>

