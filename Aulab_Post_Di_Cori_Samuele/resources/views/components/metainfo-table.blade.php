<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome tag</th>
            <th scope="col">Numero di articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @forelse($metaInfos as $metaInfo)
        <tr>
            <th scope="row">{{ $metaInfo->id }}</th>
            <td>{{ $metaInfo->name }}</td>
            <td>{{ $metaInfo->articles()->count() }}</td>
            @if($metaInfo->articles()->count() > 0)
            <td>
                <form action="{{ route('admin.editTag', ['tag' => $metaInfo]) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="text" name="name" id="newTagName_{{ $metaInfo->id }}" placeholder="Nuovo nome tag" class="form-control w-50 d-inline" autocomplete="new-data">
                    <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                </form>
            </td>
            
            <td>
                <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white">Elimina</button>
                </form>
            </td>
            @else
                <td>
                    <form action="">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 d-inline" autocomplete="off">
                        <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                    </form>
                </td>
                <td>
                    <form action="">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger text-white">Elimina</button>
                    </form>
                </td>
            @endif
        </tr>
    @empty
    <tr>
        <td colspan="5">Nessun dato disponibile</td>
    </tr>
    @endforelse
    </tbody>
</table>

