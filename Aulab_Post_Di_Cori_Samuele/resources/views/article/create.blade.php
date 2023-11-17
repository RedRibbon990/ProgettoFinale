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
    
                <form class="card p-5 shadow" action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
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
                        @error('body')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="price" class="form-label">Prezzo</label>
                        <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
                        @error('price')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria</label>
                        <select wire:model.defer="category" id="category" class="form-control">
                            <option value="">Scegli la categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <input type="file" wire:model="temporary_images" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img"/>
                        @error('temporary_images.*')
                            <p class="text-danger mt-2">{{$message}}</p>
                        @enderror
                    </div>
                    @if (!empty($images))
                        <div class="row">
                            <div class="col-12">
                                <p>Photo preview:</p>
                                <div class="row border border-4 border-info rounded shadow py-4">
                                    @foreach ($images as $key => $image)
                                        <div class="col my-3">
                                            <div class="img-preview mx-auto shadow rounded cover" style="background-image: url({{$image->temporaryUrl()}});"><div style="height: 300px; width: 300px"></div></div>
                                            <button type="button" class="btn btn-danger shadow d-block text-center mt-2 mx-auto" wire:click="removeImage({{$key}})">Cancella</button>
                                        </div>                            
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @else
                        <p>Nessuna immagine caricata</p>    
                    @endif
                    
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