<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">Tutti gli articoli</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" alt="Immagine articolo" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title"><p class="font-italic text-secondary m-0 ">Titolo</p>  {{ $article->title }}</h5>
                            <p class="card-text"><p class="font-italic text-secondary m-0">Sottotitolo</p>{{ $article->subtitle }}</p>
                            <p class="card-text"><p class="font-italic text-secondary m-0">Descrizione</p>{{ $article->body }}</p>
                            @if ($article->category)
                                <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                            @else
                                <p class="small text-muted fst-italic">Nessuna categoria associata</p>
                            @endif
                            <div class="small fst-italic text-capitalize mt-3">
                                @foreach($article->tags as $tag)
                                    <span class="badge bg-secondary small fst-italic text-capitalize m-1">#{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <p>Redatto il <br> {{ $article->created_at->format('d/m/Y') }}</p>
                            <p>Autore: <br> <cite> <a href="{{ route('article.byAuthor', $article->user->id) }}">{{ $article->user->name ?? 'Utente anonimo' }}</a></cite></p>
                        </div>
                        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-info text-white">Leggi</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
