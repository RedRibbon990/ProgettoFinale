<div class="min-vh-100">
        <div>
            <h1>Crea il tuo annuncio!</h1>

            @if (session()->has('message'))
                <div class="flex flex-row justify-center my-2 alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="store">
                @csrf
                <div class="mb-3">
                    <label for="title">Titolo Annuncio</label>
                    <input wire:model="title" type="text" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <p class="text-danger mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body">Descrizione</label>
                    <textarea wire:model="body" class="form-control @error('body') is-invalid @enderror"></textarea>
                    @error('body')
                        <p class="text-danger mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price">Prezzo</label>
                    <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <p class="text-danger mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category">Categoria</label>
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

                <button type="submit" class="btn btn-primary shadow px-4 py-2">Crea</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
