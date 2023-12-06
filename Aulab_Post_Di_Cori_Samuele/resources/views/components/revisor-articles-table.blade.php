<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Sottotitolo</th>
            <th scope="col">Redattore</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @forelse($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->user ? $article->user->name : 'N/A' }}</td>
                <td class="d-flex justify-content-between">
                    @if(is_null($article->is_accepted))
                    <a href="{{ route('article.show', compact('article')) }}" class="btn btn-info btn-sm text-white">Leggi</a>
                    <a href="{{ route('revisor.reject', compact('article')) }}" class="btn btn-danger btn-sm text-white">Respingi</a>
                    @else
                        <a href="{{ route('revisor.undo', compact('article')) }}" class="btn btn-warning btn-sm text-white">Riporta in revisione</a>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Nessun articolo disponibile</td>
            </tr>
        @endforelse
    </tbody>
</table>
