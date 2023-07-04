<x-main>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image opacity-75">
                
            </div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-4">
                    <div class="container">
                        <div class="row">
                            <div class="d-flex align-items-center">
                                <a href="/" class="text-center">
                                    <img class="img-fluid w-50" src="{{ asset(Storage::url('public/img/prestoit-logo_alpha.png')) }}"
                                    alt="logo presto.it">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Bentornatə!</h3>

                                <!-- Sign In Form -->
                                <form action="{{ route('login') }}" method="POST">
                                @csrf
                                @method('POST')

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="name@example.com">
                                        <label for="email">Indirizzo mail</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="password">
                                        <label for="password">Password</label>
                                    </div>

                                    {{-- <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="rememberPasswordCheck">
                                        <label class="form-check-label" for="rememberPasswordCheck">
                                            Remember password
                                        </label>
                                    </div> --}}

                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-login text-uppercase fw-bold mb-2 btn-cerca"
                                            type="submit">Sign in</button>
                                        {{-- <div class="text-center">
                                            <a class="small" href="#">Forgot password?</a>
                                        </div> --}}
                                        <div class="text-center">
                                            Non hai un account?
                                            <a href="{{route('register')}}">Registrati!</a>
                                        </div>
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
