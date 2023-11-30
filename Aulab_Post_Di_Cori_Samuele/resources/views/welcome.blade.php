<x-layout>

    <div class="container-fluid p-2 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">The Aulab Post</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="card-img-top">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <p class="card-text">{{ $article->body }}</p>
                            @if ($article->category)
                                <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                                @foreach($article->tags as $tag)
                                    <p class="small fst-italic text-capitalize">
                                        #{{$tag->name}}
                                    </p>
                                @endforeach
                            @else
                                <p class="small text-muted fst-italic">Nessuna categoria associata</p>
                            @endif
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <p>Redatto il <br> {{ $article->created_at->format('d/m/Y') }}</p>
                            <p>Autore <br> <cite> <a href="{{ route('article.byAuthor', $article->user->id) }}">{{ $article->user->name ?? 'Utente anonimo' }}</a> </cite></p>
                        </div>
                        
                        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-info text-white">Leggi</a>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Nessun articolo disponibile.</p>
                </div>
            @endforelse
        </div>
    </div>

</x-layout>
