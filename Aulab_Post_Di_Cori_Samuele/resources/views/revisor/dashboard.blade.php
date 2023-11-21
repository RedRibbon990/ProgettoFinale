<x-layout>
    <div class="container-fluid p-5 text-center bg-info text-white">
        <h1 class="display-1">
            Bentornato, Revisore
        </h1>
    </div>

    @if (session('message'))
        <div class="alert alert-success text-center">
            {{session('messsage')}}
        </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli da revisionare</h2>
                <x-article-table :articles="$unrevisionedArticles" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli pubblicati</h2>
                <x-article-table :articles="$acceptedArticles" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Articoli respinti</h2>
                <x-article-table :articles="$rejectedArticles" />
            </div>
        </div>
    </div>
</x-layout>