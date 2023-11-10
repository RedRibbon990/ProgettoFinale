<x-layout>
    <div class="container-fluid p-5 bg-gradient bg-success shadow mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class="display-2">Esplora la categoria {{$category->name}}</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @forelse ($category->announcements as $announcement )
                        <div class="col-12 col-md-4 my-2">
                            <div class="card shadow" style="width: 18rem">
                                <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}</p>
                                    <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-primary shadow">Visualizza</a>
                                    <p class="card-footeer my-2">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore: {{$announcement->user->name ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="h1">Non sono presenti annunci per questa categoria!</p>
                            <p class="h2">Pubblicane uno: <a href="{{route('announcements.create')}}" class="btn btn-success shadow">Nuovo annuncio</a></p>
                        </div>
                    @endforelse

                </div>

            </div>

        </div>

    </div>


</x-layout>