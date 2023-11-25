<x-layout>

    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">Crea il tuo annuncio!</h1>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
    
                <form class="card p-5 shadow" action="{{route('article.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        
                    @if (session('message'))
                        <div class="alert alert-success text-center">
                            {{session('message')}}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo Annuncio:</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{old('title')}}">
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{old('subtitle')}}">
                    </div>
    
                    <div class="mb-3">
                        <label for="body" class="form-label">Descrizione:</label>
                        <textarea name="body" id="body" class="form-control">{{old('body')}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine:</label>
                        <input type="file" name="image" id="image" class="form-control" multiple>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select name="category" id="category" class="form-control text-capitalize">
                            <option value="">Scegli la categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mt-2">
                        <button type="submit" class="btn btn-info text-white shadow px-4 py-2">Crea</button>
                        <a href="{{route('homepage')}}">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

            @if (session()->has('message'))
                <div class="flex flex-row justify-center my-2 alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</x-layout>