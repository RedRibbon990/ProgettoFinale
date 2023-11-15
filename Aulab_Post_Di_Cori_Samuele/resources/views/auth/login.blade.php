<x-layout>

    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
                <h1 class="display-1">Accedi!</h1>
            </div>
        </div>
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($error->all() as $error)
                                    <li>{{$error}}</li>                                
                                @endforeach
                            </ul>
                        </div>
                        
                    @endif

                    <form class="card p-t shadow" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="mt-2">
                            <label for="exampleInputEmail" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp">
                            <div class="form-text" id="emailHelp">We'll never share your Email whit anyone else.</div>
                        </div>
                        <div class="mt-2">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mt-2 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="esampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Ricordati di me</label>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <p class="small mt-2">Non sei registrato? <a href="{{route('register')}}">Clicca quì</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>