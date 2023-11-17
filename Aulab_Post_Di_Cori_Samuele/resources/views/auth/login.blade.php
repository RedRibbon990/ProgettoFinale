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
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <div class="mt-3">
                            <label for="exampleInputEmail" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" value="{{ old('email') }}" autocomplete="email">
                            <div class="form-text" id="emailHelp">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mt-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" autocomplete="current-password">
                        </div>
                        <div class="mt-3 form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }} autocomplete="on">
                            <label class="form-check-label" for="exampleCheck1">Ricordati di me</label>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-info text-white">Login</button>
                            <p class="small mt-2">Non sei registrato? <a href="{{ route('register') }}">Clicca qui</a></p>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-layout>