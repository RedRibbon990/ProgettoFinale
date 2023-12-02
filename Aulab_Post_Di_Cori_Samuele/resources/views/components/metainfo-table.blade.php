<table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            @if(isset($columnName))
                <th scope="col">{{ $columnName }}</th>
            @else
                <th scope="col">Nome Tag</th>

            @endif
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
            @if($metaType == 'tags')
            <td>
                <form action="{{ route('admin.editTag', ['tag' => $metaInfo]) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="text" name="name" id="Nuovo nome{{ $metaInfo }}" placeholder="Nuovo nome tag" class="form-control w-50 d-inline" autocomplete="new-data">
                    <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                </form>
            </td>
            
            <td>
                <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white">Elimina</button>
                </form>
            </td>
            @else
                <td>
                    <form action="{{ route('admin.editCategory', ['category' => $metaInfo]) }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 d-inline" autocomplete="new-data">
                        <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('admin.deleteCategory', ['category' => $metaInfo])}}" method="POST">
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


