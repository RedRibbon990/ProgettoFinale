<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequests as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @switch($role)
                        @case('amministratore')
                            <a href="{{ route('admin.setAdmin', compact('user')) }}" class="btn btn-info text-white">Attiva {{$role}}</a>
                            @break
                        @case('revisore')
                            <a href="{{ route('admin.setRevisor', compact('user')) }}" class="btn btn-info text-white">Attiva {{$role}}</a>
                            @break
                        @case('redattore')
                            <a href="{{ route('admin.setWriter', compact('user')) }}" class="btn btn-info text-white">Attiva {{$role}}</a>
                            @break
                        @default
                            <!-- Gestione per ruolo sconosciuto -->
                            <span>Ruolo sconosciuto</span>
                    @endswitch
                    <!-- Aggiungi il pulsante "Elimina" -->
                    @if ($role !== null)
                        <form action="{{ route('admin.rejectRequest', ['user' => $user, 'role' => $role]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('PATCH') <!-- Usa PATCH anziché DELETE -->
                            <button type="submit" class="btn btn-warning" onclick="return confirm('Sei sicuro di voler rifiutare questa richiesta?')">Rifiuta</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
