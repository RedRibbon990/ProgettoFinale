<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Cambia Ruolo per  {{ $user->name }}</h2>
                    </div>

                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                Ruolo utente cambiato con successo. Nuovo ruolo: {{ session('newRole') }}
                            </div>
                        @endif
                    

                        <p class="current-role">Il ruolo corrente dell'utente è <span class="badge bg-secondary">{{ $currentRole }}</span></p>

                        <form action="{{ route('admin.changeUserRole', compact('user', 'newRole')) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="user_id">ID Utente:</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $user->id }}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="new_role">Nuovo Ruolo:</label>
                                <select class="form-control" name="new_role">
                                    <option value="" disabled selected>Scegli un ruolo</option>
                                    <option value="admin" {{ $newRole == 'admin' ? 'selected' : '' }}>Amministratore</option>
                                    <option value="revisor" {{ $newRole == 'revisor' ? 'selected' : '' }}>Revisore</option>
                                    <option value="writer" {{ $newRole == 'writer' ? 'selected' : '' }}>Redattore</option>
                                </select>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Cambia Ruolo</button>
                        </form>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
