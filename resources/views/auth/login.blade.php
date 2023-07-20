<x-main>
    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image opacity-75">
            </div>
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
                                <h3 class="login-heading mb-4">{{ __('ui.welcBack') }}!</h3>

                                <!-- Sign In Form -->
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    @method('POST')


{{--                                     
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                    <div class="form-floating mb-3">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="name@example.com">
                                        <label for="email">{{ __('ui.emailAdd') }}</label>
                                        @error('email')
                                        <p class="text-danger mt-1">{{ __($message) }}</p>
                                    
                                    @enderror
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" name="password" class="form-control" id="password">
                                        <label for="password">Password</label>
                                    </div>



                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-login text-uppercase fw-bold mb-2 btn-cerca"
                                            type="submit">{{ __('ui.login') }}</button>
                                        {{-- <div class="text-center">
                                            <a class="small" href="#">Forgot password?</a>
                                        </div> --}}

                                        <div class="d-flex flex-column align-items-center">
                                            <a href="{{ route('socialite.login') }}"
                                                class="btn btn-login text-uppercase fw-bold mb-2 px-1 btn-github col-12">{{ __('ui.gitHub') }}<i class="bi bi-github ms-3"></i></a>
                                            <a href="{{ url('authorized/google') }}"
                                                class="btn btn-login text-uppercase fw-bold mb-2 px-1 btn-google col-12">{{ __('ui.google') }}<img
                                                    src="{{ asset(Storage::url('public/img/g-logo.png')) }}"
                                                    class="align-self-center ms-2" style="height: 15px"
                                                    alt="g-logo"></i></a>
                                        </div>
                                        <div class="text-center">
                                            {{ __('ui.noAccount') }}?
                                            <a href="{{ route('register') }}">{{ __('ui.register') }}!</a>
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
