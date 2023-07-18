<x-main>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image opacity-75 "></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center position-relative py-4">
                    <li class="nav-item dropdown p-5 position-absolute top-0 end-0" id="flag-button">
                        <a class="btn btn-accedi" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @if (App::isLocale('it'))
                                <x-locale locale lang="it" nation="it" />
                            @elseif (App::isLocale('en'))
                                <x-locale locale lang="en" nation="gb" />
                            @elseif (App::isLocale('fr'))
                                <x-locale locale lang="fr" nation="fr" />
                            @elseif (App::isLocale('es'))
                                <x-locale locale lang="es" nation="es" />
                            @endif
                        </a>
                        <ul class="dropdown-menu flags-dropdown" id="flags-dropdown">
                            @if (App::isLocale('it'))
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="en" nation="gb" />
                                    </a></li>
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="fr" nation="fr" />
                                    </a></li>
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="es" nation="es" />
                                    </a></li>
                            @elseif (App::isLocale('en'))
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="it" nation="it" />
                                    </a></li>
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="fr" nation="fr" />
                                    </a></li>
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="es" nation="es" />
                                    </a></li>
                            @elseif(App::isLocale('fr'))
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="en" nation="gb" />
                                    </a></li>
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="it" nation="it" />
                                    </a></li>
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="es" nation="es" />
                                    </a></li>
                            @elseif(App::isLocale('es'))
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="en" nation="gb" />
                                    </a></li>
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="it" nation="it" />
                                    </a></li>
                                <li class="dropdown-item"><a href="">
                                        <x-locale locale lang="fr" nation="fr" />
                                    </a></li>
                            @endif
                        </ul>
                    </li>
                    <div class="container">
                        <div class="row">
                            <div class="d-flex align-items-center">
                                <a href="/" class="text-center">
                                    <img class="img-fluid w-50"
                                        src="{{ asset(Storage::url('public/img/prestoit-logo_alpha.png')) }}"
                                        alt="logo presto.it">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">{{ __('ui.1welc') }}!</h3>

                                <!-- Sign In Form -->
                                <form action="{{ route('register') }}" method="POST">
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
                                    <div class="d-flex d-inline">
                                        <div class="form-floating flex-grow-1 mb-3 me-2">
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Gino">
                                            <label for="name">{{ __('ui.name') }}</label>
                                        </div>
                                        <div class="form-floating flex-grow-1 mb-3 ">
                                            <input type="text" name="surname" class="form-control" id="surname"
                                                placeholder="Gini">
                                            <label for="surname">{{ __('ui.surname') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="name@example.com">
                                        <label for="email">{{ __('ui.emailAdd') }}</label>
                                    </div>
                                    <div class="d-flex d-inline">
                                        <div class="form-floating flex-grow-1 mb-3 me-2">
                                            <input type="text" name="phone" class="form-control" id="phone"
                                                placeholder="081 555 6667">
                                            <label for="phone">{{ __('ui.telephone') }}</label>
                                        </div>
                                        <div class="form-floating flex-grow-1 mb-3">
                                            <input type="text" name="city" class="form-control" id="city"
                                                placeholder="Napoli (NA)">
                                            <label for="city">{{ __('ui.city') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="password">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="password_confirmation">
                                        <label for="password_confirmation">{{ __('ui.pwdConfirm') }}</label>
                                    </div>


                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-login text-uppercase fw-bold mb-2 btn-cerca"
                                            type="submit">Sign in</button>
                                        {{-- <div class="text-center">
                                            <a class="small" href="#">Forgot password?</a>
                                        </div> --}}
                                        <div class="row d-flex justify-content-evenly">
                                            <a href="{{ route('socialite.login') }}"
                                                class="btn btn-login text-uppercase fw-bold mb-2 px-1 btn-github col-5">Accedi
                                                con GitHub <i class="bi bi-github"></i></a>
                                            <a href="{{ url('authorized/google') }}"
                                                class="btn btn-login text-uppercase fw-bold mb-2 px-1 btn-google col-5">Accedi
                                                con Google <img src="{{asset(Storage::url('public/img/g-logo-btn.png'))}}" class="align-self-center" style="height: 15px; background-color:white" alt="g-logo"></i></a>
                                        </div>
                                        <div class="text-center">
                                            {{ __('ui.alreadySign') }}?
                                            <a href="{{ route('login') }}">{{ __('ui.login') }}!</a>
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
