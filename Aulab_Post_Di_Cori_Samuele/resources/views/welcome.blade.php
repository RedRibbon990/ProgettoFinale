<x-layout>

    <div class="container-fluid p-4 bg-black text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-2">The Aulab Post</h1>
        </div>

        <div class="front-page">
            <div class="front-page-text text-start p-3">
                <div class="eyebrow pb-3">Crea il tuo sito web</div>
                <h1>Il leader della progettazione di siti web</h1>

                <p class="sub-text" data-reveal-self="" data-has-intersected="true" data-scrolled-into-view="true">
                    <span class="desktop">Distinguiti online con un website, un negozio online o un portfolio
                        professionale. Con la Programmazione, puoi trasformare qualsiasi idea in una realtà.
                    </span>
                    <span class="mobile">Fatti notare online con un sito web, un negozio online o un portfolio
                        professionali.
                    </span>
                </p>
                <a href="" class="btn-color btn">
                    <span class="link__text" property="name">Inizia da qui</span>
                </a>
            </div>

            <div class="sub-page ">
                <img src="https://source.unsplash.com/random">
            </div>
        </div>
    </div>

    <div class="container-fluid text-center">
        <h1 class="display-1">Gli ultimi annunci</h1>
    </div>

    <div class="container my-3 pt-3 bg-black">
        <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @forelse($articles as $key => $article)
                    <div class="carousel-item {{ $key === 0 ? ' active' : '' }}">
                        <div class="row justify-content-around">
                            <div class="col-12 col-md-3 mb-4">
                                <div class="card">
                                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                                        class="card-img-top">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        <p class="card-text">{{ $article->subtitle }}</p>
                                        <p class="card-text">{{ $article->body }}</p>
                                        @if($article->category)
                                            <p class="small text-muted fst-italic text-capitalize">Categoria:
                                                {{ $article->category->name }}</p>
                                        @else
                                            <p class="small text-muted fst-italic">Nessuna categoria associata</p>
                                        @endif
                                        <div class="d-flex justify-content-center flex-wrap">
                                            @forelse($article->tags as $tag)
                                                <span
                                                    class="badge bg-secondary small fst-italic text-capitalize m-1">#{{ $tag->name }}</span>
                                            @empty
                                                <p class="small text-muted fst-italic">Nessun tag associato</p>
                                            @endforelse
                                        </div>
                                    </div>
                                    <div
                                        class="card-footer text-muted d-flex justify-content-between align-items-center">
                                        <p class="mb-0">Redatto il
                                            {{ $article->created_at->format('d/m/Y') }}</p>
                                        <p class="mb-0">Autore: <a
                                            href="{{ route('article.byAuthor', $article->user->id) }}">{{ $article->user->name ?? 'Utente anonimo' }}</a>
                                        </p>
                                    </div>
                                    <a href="{{ route('article.show', compact('article')) }}"
                                        class="btn btn-info text-white mt-2">Leggi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Nessun articolo disponibile.</p>
                    </div>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


</x-layout>
