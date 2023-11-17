<x-layout>

    <div class="container-fluid p-2 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">The Aulab Post</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" alt="..." class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <p class="card-text">{{ $article->body }}</p>
                            <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}" class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <p>Redatto il <br> {{ $article->created_at->format('d/m/Y') }}</p>
                            <p>Autore: <br> <a href="{{ route('article.byAuthor', ['user' => $article->user]) }}">{{ $article->user->name }}</a></p>
                        </div>
                        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-info text-white">Leggi</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    

</x-layout>