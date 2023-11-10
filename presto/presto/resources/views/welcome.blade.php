<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title">{{__('ui.welcome')}}</h1>
                <div class=" headerContain absolute inset-0 bg-neutral-darkest opacity-40" style="background-image: url('/sfondo.jpg');">
                    <header class="absolute inset-0 flex flex-col justify-center p-6 text-shadow-medium gap-2 laptop:gap-0 laptop:flex-row laptop:items-center laptop:p-12">
                        <div class="introText left-0 text-center bg-faded p-5 rounded infoHome">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Discover and buy everything you want</span><br>
                                <span class="section-heading-lower">Acquire New Interests</span>
                            </h2>
                            <p class="mb-3">Ads from all over the world directly in your hand. Whether it's numismatics, collecting or for your daily well-being, you will find it here.!</p>
                            <div class="introButton text-center mx-auto">
                                <a class="btn btn-warning btn-xl" href="{{ route('announcements.index') }}">Visit Us Today!</a>
                            </div>
                        </div>
                        <div class="secondTitle">
                            <h1>{!! __('ui.new') !!}</h1>
                        </div>
                    </header>
                </div>
                
                <section class="pageSection">
                    <div>
                        <div class="row">
                            <div class="col-xl-9 mx-auto">
                                <div class="cta-inner bg-faded text-center rounded">
                                    <h2 class="section-heading mb-4">
                                        <span class="section-heading-upper">Our Promise</span>
                                        <span class="section-heading-lower">To You</span>
                                    </h2>
                                    <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                @if (Request::is('/'))
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark navHome">
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
                            <div id="langContainer">
                                <li class="nav-item"> 
                                    <x-_locale lang='it' nation='it'/>
                                </li>
                                <li class="nav-item"> 
                                    <x-_locale lang='en' nation='gb'/>
                                </li>
                                <li class="nav-item"> 
                                    <x-_locale lang='es' nation='es'/>
                                </li>
                            </div>
                            
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

                    </div>
                </nav>
                @endif
                <div class="row" id="container">
                    @foreach ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card shadow" style="width: 18rem">
                                <img src="{{!$announcement->images()->get()->isEmpty() ? Storage::url($announcement->images()->first()->path) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}</p>
                                    <p class="card-text">{{$announcement->price}}</p>
                                    <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-primary shadow">Visualizza</a>
                                    @if ($announcement->category !== null)
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category->id]) }}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{ $announcement->category->name }}</a>
                                    @endif
                                    <p class="card-footer mt-3 mb-0 ">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
