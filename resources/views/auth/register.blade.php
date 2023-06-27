<x-main>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Welcome!</h3>

                                <!-- Sign In Form -->
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-floating mb-3">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Gino">
                                        <label for="name">Nome</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="surname" class="form-control" id="surname"
                                            placeholder="Gini">
                                        <label for="surname">Cognome</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="name@example.com">
                                        <label for="email">Indirizzo mail</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="phone" class="form-control" id="phone"
                                            placeholder="081 555 6667">
                                        <label for="phone">Telefono</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="city" class="form-control" id="city"
                                            placeholder="Napoli (NA)">
                                        <label for="city">Città</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                        <label for="password_confirmation">Conferma password</label>
                                    </div>

                                    {{-- <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="rememberPasswordCheck">
                                        <label class="form-check-label" for="rememberPasswordCheck">
                                            Remember password
                                        </label>
                                    </div> --}}

                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2"
                                            type="submit">Sign in</button>
                                        {{-- <div class="text-center">
                                            <a class="small" href="#">Forgot password?</a>
                                        </div> --}}
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main>
