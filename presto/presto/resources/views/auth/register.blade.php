<x-layout>

    <div class="container-fluid register">
        <div class="left-side">
            <h1 class="text-center">Benvenuto!</h1>
        </div>

        <div class="right-side">
            <h1 class="text-center">Registrati!</h1>
            <form action="{{route('register')}}" method="POST" class="register">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome completo</label>
                    <input type="text" name="name" class="form-control" id="name" autocomplete="name" aria-describedby="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" autocomplete="email">
                    <div class="form-text" id="emailHelp">We'll never share your Email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Registrati</button>
            </form>
        </div>
    </div>

</x-layout>
