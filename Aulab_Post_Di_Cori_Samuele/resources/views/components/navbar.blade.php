<nav class="navbar navbar-dark bg-dark navbar-expand-lg" id="nav">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('image/logo.png') }}" alt="Logo" width="auto" height="50">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('article.index')}}">Annunci</a>
            </li>
        </ul>

        @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Benvenuto {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if(Auth::user()->is_admin)
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard admin</a></li>
                        @elseif(Auth::user()->is_revisor)
                            <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">Dashboard revisore</a></li>
                        @elseif(Auth::user()->is_writer)
                            <li><a class="dropdown-item" href="{{ route('writer.dashboard') }}">Dashboard redattore</a></li>
                        @endif
                        <li><a class="dropdown-item" href="#">Profilo</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a>
                            <form method="POST" action="{{ route('logout') }}" id="form-logout" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        @endauth
    
    
        @guest
            <ul class="navbar-nav ">
                <div class="dropdown wlcm">
                    <button type="button" class="btn btn-color dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                        Benvenuto
                    </button>
                    <li class="nav-item dropdown">
                        
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('register') }}">Registrati</a>
                            </li>
                        </ul>
                    </li>
                </div>

                
            </ul>
        @endguest
        <form action="{{route('article.search')}}" class="p-2">
            <input type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
            <button type="submit" class="btn btn-outline-info">Cerca</button>
        </form>
    </div>
</nav>
