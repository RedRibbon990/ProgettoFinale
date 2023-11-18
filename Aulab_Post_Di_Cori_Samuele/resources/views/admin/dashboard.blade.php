<x-layout>
    <div class="container-fluid p-5 text-center bg-info text-white">
        <h1 class="display-1">
            Bentornato, Amministratore..
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
                <h2>Richiesta per il ruolo Amministratore</h2>
                <x-requests-table ::roleRequests="$adminRequests" role="amministratore" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richiesta per il ruolo Revisore</h2>
                <x-requests-table ::roleRequests="$revisorRequests" role="revisore" />
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richiesta per il ruolo Redattore</h2>
                <x-requests-table ::roleRequests="$writerRequests" role="redattore" />
            </div>
        </div>
    </div>
</x-layout>