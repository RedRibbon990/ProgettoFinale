<nav class="navbar navbar-dark bg-dark" id="nav" style="padding: 7px 20px;">
    <a class="navbar-brand" href="/">
        <img src="{{ asset('image/logo.png') }}" alt="Logo" width="auto" height="50">
    </a>
    <li class="nav-item">
        <a href="{{route('article.create')}}">Inserisci un articolo</a>
    </li>
    <li class="nav-item">
        <a href="{{route('article.index')}}">Annunci</a>
    </li>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @auth
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Benvenuto {{ Auth::user()->name }}</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown"> 
            <li><a class="dropdown-item" href="#">Profilo</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a></li>
            <form method="POST" action="{{ route('logout') }}" id="form-logout" class="d-none">
                @csrf
            </form>
        </ul>
    </li>    
    @endauth
    @guest
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a></li>
                <form id="form-logout" method="POST" class="d-none" action="{{ route('logout') }}">
                    @csrf
                </form>
            </ul>
        </li>
    @endguest
</nav>
