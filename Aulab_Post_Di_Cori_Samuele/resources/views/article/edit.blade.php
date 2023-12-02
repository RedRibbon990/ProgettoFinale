<x-layout>
    <div class="container-fluid text-center text-white">
        <div class="row justify-content-center">
            <h1>Modifica un articolo</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="card p-5 shadow" action="{{ route('article.update', ['article' => $article]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $article->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ $article->subtitle }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine:</label>
                        <input name="image" type="text" class="form-control" id="image" value="{{ $article->image }}">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoria:</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($article->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" class="form-control" cols="30" rows="7" id="body">{{ $article->body }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input name="tags" id="tags" class="form-control" value="{{ $article->tags->implode('name', ',') }}">
                        <span class="small fst-italic">Dividi ogni Tag con una virgola</span>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-info text-white shadow px-4 py-2">Modifica l'articolo</button>
                        <a class="btn btn-outline-info" href="{{ route('homepage') }}">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
