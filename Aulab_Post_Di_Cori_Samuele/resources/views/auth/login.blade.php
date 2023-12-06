<x-layout>

    <section class="vh-100 bg-login">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body  p-5">
                                <h2 class="text-uppercase text-center mb-5">Login</h2>

                                <form method="POST" action="{{ route('login') }}" id="login">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="exampleInputEmail" class="form-label">Email address</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail"
                                            aria-describedby="emailHelp" value="{{ old('email') }}"
                                            autocomplete="email">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="form-text" id="emailHelp">We'll never share your email with anyone else.
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            autocomplete="current-password">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-check text-start d-flex my-auto">
                                        <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1" {{ old('remember') ? 'checked' : '' }} autocomplete="on">
                                        <label class="form-check-label" for="exampleCheck1">Ricordati di me</label>
                                        <a class="ms-auto btn btn-outline-primary" href="{{ route('register') }}">Registrati</a>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="welcome-btn btn-l text-white">Login</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
