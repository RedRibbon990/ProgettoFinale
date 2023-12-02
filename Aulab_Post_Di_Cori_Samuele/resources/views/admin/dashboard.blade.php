<x-layout>
    <div class="container-fluid p-5 text-center bg-info text-white">
        <h1 class="display-1">
            Bentornato, Amministratore..
        </h1>
    </div>

    @if(session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif
    {{-- Roles --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richiesta per il ruolo Amministratore</h2>
                <x-request-table :roleRequests="$allRequests['amministratore']" role="amministratore" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richiesta per il ruolo Revisore</h2>
                <x-request-table :roleRequests="$allRequests['revisore']" role="revisore" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richiesta per il ruolo Redattore</h2>
                <x-request-table :roleRequests="$allRequests['redattore']" role="redattore" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <a href="{{ route('admin.showUser') }}" class="btn btn-primary mt-3">Visualizza Tutti gli
                Utenti</a>
        </div>
    </div>
    <hr>
    {{-- Tag --}}
    <div class="container-fluid my-5 text-center">
        <div class="col-12">
            <h2>I tag della piattaforma</h2>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <x-metainfo-table :metaInfos="$tags" metaType="tags" />
        </div>
    </div>
    <hr>
    {{-- Category --}}
    <div class="container-fluid my-5 text-center">
        <div class="col-12">
            {{-- Category Create --}}
            <h2>Le categorie della piattaforma</h2>
            <x-metainfo-table :metaInfos="$categories" metaType="categorie" :columnName="$columnName" />
            <form class="d-flex" action="{{ route('admin.storeCategory') }}" method="POST">
                @csrf
                <input type="text" name="name" class="form-control me-2" placeholder="Inserisci una nuova categoria">
                <button type="submit" class="btn btn-success text-white">Aggiungi</button>
            </form>
            
        </div>
    </div>

</x-layout>
