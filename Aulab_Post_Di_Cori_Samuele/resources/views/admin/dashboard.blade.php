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
            <a href="{{ route('admin.showUser') }}" class="btn btn-primary mt-3">Visualizza Tutti gli Utenti</a>
        </div>
    </div>
    <hr>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>I tag della piattaforma</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tags" />
            </div>
        </div>
    </div>
</x-layout>