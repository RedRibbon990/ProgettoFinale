<x-layout>
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">{{ $article->title }}</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            <div class="col-12 col-md-8">
                <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-fluid my-3">
                <div class="text-center">
                    <h2>{{ $article->subtitle }}</h2>
                    <div class="my-3 text-muted fst-italic">
                        <p>Redatto il {{ $article->created_at->format('d/m/Y') }} <br> Autore  <a href="{{ route('article.byAuthor', $article->user->id) }}">{{ $article->user->name ?? 'N/A' }}</a></p>
                    </div>
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
