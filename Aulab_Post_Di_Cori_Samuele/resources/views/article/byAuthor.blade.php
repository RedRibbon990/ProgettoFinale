<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1 text-capitalize">Annunci di: {{$user->name}}</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" alt="..." class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->subtitle}}</p>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            Redatto il {{$article->created_at->format('d/m/Y')}} da <br> {{$article->user->name}}
                            <a href="{{ route('article.show', ['article' => $article]) }}" class="btn btn-info text-white">Leggi</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Nessun annuncio disponibile per questo utente.</p>
            @endforelse
        </div>
    </div>
</x-layout>
