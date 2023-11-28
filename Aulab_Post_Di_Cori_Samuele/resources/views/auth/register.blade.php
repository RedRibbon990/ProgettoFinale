<x-layout>

    <div class="container-fluid register">
        <div class="left-side">
            
        </div>

        <div id="welcomeText" class="text-center">
                <h1>Benvenuto!</h1>
                <h2>Registrati &rArr;</h2>
            <p class="small mt-2">Oppure</p>
            <button class="welcome-btn btn-l"><a  href="{{route('login')}}">Entra qui!</a></button>
        </div>

        <div class="right-side">
            <div>
                <img src="/image/register/aulab.png" alt="" class="img-aulab">
            </div>

            <form action="{{route('register')}}" method="POST" class="register-form">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome completo</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="name" aria-describedby="name" value="{{old('name')}}">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" autocomplete="email"  value="{{old('email')}}">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    <div class="form-text text-white pb-2">We'll never share your Email with anyone else.</div>
                </div>


                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label ">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" autocomplete="new-password">
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label @error('password') is-invalid @enderror">Conferma password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" autocomplete="new-password">
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <button type="submit" class="right-side welcome-btn">Registrati</button>
            </form>
        </div>

    </div>

</x-layout>
