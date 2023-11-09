<nav class="navbar navbar-expand-lg navbar-dark bg-dark Home" style="padding: 7px 20px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/">Presto.it</a>
    <div class="collapse navbar-collapse justify-content-between " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="{{route('announcements.index')}}">Annunci</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categorie
                </a>
                <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                    @foreach ($categories as $category)
                    <li><a class="dropdown-item" href="{{route('categoryShow', compact('category'))}}">{{($category->name)}}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    @endforeach 
                </ul>
            </li>

            <li class="nav-item"> 
                <x-_locale lang='it' nation='it'/>
            </li>
            <li class="nav-item"> 
                <x-_locale lang='en' nation='gb'/>
            </li>
            <li class="nav-item"> 
                <x-_locale lang='es' nation='es'/>
            </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('announcements.create') }}">Nuovo Annuncio</a>
                </li>
                @if (Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success btn-sm position-relative" aria-current="page" href="{{route('revisor.index')}}">Zona revisore
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{App\Models\Announcement::toBeRevisionedCount()}}
                                <span class="visually-hidden">unread message</span>
                            </span>
                        </a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
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
        </ul>
        <form class="form-inline d-flex align-items-center my-2 my-lg-1 search" action="{{ route('announcements.search') }}" method="GET">
            <input class="form-control mr-sm-2" type="text" name="search_query" placeholder="Cerca annuncio">
            <button class="btn btn-outline-success mx-2 my-sm-0" type="submit">Cerca</button>
        </form>
    </div>
</nav>
