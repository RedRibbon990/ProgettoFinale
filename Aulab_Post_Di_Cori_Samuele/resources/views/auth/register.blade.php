<x-layout>

    <div class="container-fluid register">
        <div class="left-side">
            <div id="welcomeText">
                <div class="text-center">
                    <h1>Benvenuto!</h1>
                    <h2>Testo 1</h2>
                </div>
            </div>
        </div>

        <div class="right-side">
            <h1 class="text-center">Registrati!</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{route('register')}}" method="POST" class="register">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome completo</label>
                    <input type="text" name="name" class="form-control" id="name" autocomplete="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" autocomplete="email">
                    <div class="form-text text-white pb-2" id="emailHelp">We'll never share your Email with anyone else.</div>
                </div>

                <h6 class="mb-0 me-4">Gender:</h6>
                <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="variable" id="femaleGender" value="option1" />
                    <label class="form-check-label" for="femaleGender">Female</label>
                </div>
                <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="variable" id="maleGender" value="option2" />
                    <label class="form-check-label" for="maleGender">Male</label>
                </div>
                <div class="form-check form-check-inline mb-0 me-4">
                    <input class="form-check-input" type="radio" name="variable" id="otherGender" value="option3" />
                    <label class="form-check-label" for="otherGender">Other</label>
                </div>
                
                <div class="form-check form-check-inline mb-0 me-4" id="additionalField" style="display: none;">
                    <label for="additionalText" class="form-label">Additional Text:</label>
                    <input type="text" class="form-control" id="additionalText" name="additionalText" placeholder="Enter additional text">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label pt-3">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Registrati</button>
                <p class="small mt-2">Già registrato? <a href="{{route('login')}}">Clicca quì</a></p>
            </form>
        </div>
    </div>

</x-layout>