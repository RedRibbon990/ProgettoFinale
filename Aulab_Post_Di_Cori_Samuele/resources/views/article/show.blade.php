<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">{{ $article->title }}</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            <div class="col-12 col-md-8">
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-fluid my-3 mx-auto d-block">
                <div class="text-center">
                    <h2>{{ $article->subtitle }}</h2>
                    <div class="my-3 text-muted fst-italic">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br> Autore  <a href="{{ route('article.byAuthor', $article->user->id) }}">{{ $article->user->name ?? 'N/A' }}</a></p>
                    </div>
                    @if ($article->category)
                        <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                    @else
                        <p class="small text-muted fst-italic">Nessuna categoria associata</p>
                    @endif
                    <p class="small fst-italic text-capitalize mt-1">
                        @foreach($article->tags as $tag)
                            <span class="badge bg-secondary small fst-italic text-capitalize m-1">#{{ $tag->name }}</span>
                        @endforeach
                    </p>
                </div>
                <hr>
                <p>{{ $article->body }}</p>
                @if (Auth::user() && Auth::user()->is_writer)
                    <div class="text-center">
                        <a href="{{ route('article.index') }}" class="btn btn-info text-white my-5">Torna indietro</a>
                    </div>
                @endif
                @if (Auth::user() && Auth::user()->is_revisor)
                    <div class="text-center">
                        <a href="{{ route('revisor.accept', compact('article')) }}" class="btn btn-success text-white my-3">Accetta articolo</a>
                        <a href="{{ route('revisor.reject', compact('article')) }}" class="btn btn-danger text-white my-3">Rifiuta articolo</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
