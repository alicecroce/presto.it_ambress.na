<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" style="width: 10%" href="/">
            <img class="img-fluid" src="{{ asset(Storage::url('public/img/prestoit-logo-con-txt.png')) }}"
                alt="logo presto.it">
        </a>

        <form class="d-flex flex-grow-1" action="{{ route('advs.search') }}" method="GET" role="search">
            <input class="form-control flex-grow me-2" name="searched" type="search"
                placeholder="{{ __('ui.searchBar') }}" aria-label="Search">
            <button class="btn btn-cerca" type="submit">{{ __('ui.btn-search') }}</button>
        </form>

        <button class="navbar-toggler mx-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto d-flex align-content-center flex-row justify-content-end">
                <li class="nav-item dropdown p-1">
                    @auth
                        <a class="btn btn-accedi" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.profile') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('user_profile.index') }}">{{ __('ui.profile') }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Logout
                                </button>
                            </form>
                        </ul>
                    @else
                        <a class="btn btn-accedi mx-3" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.login') }} | {{ __('ui.register') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}"> {{ __('ui.login') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">{{ __('ui.register') }}</a></li>
                        </ul>
                    @endauth
                </li>
                @auth
                    <li class="nav-item p-1">
                        <a class="btn btn-accedi" role="button"
                            href="{{ route('adv.create') }}">{{ __('ui.addAdv') }}</a>
                    </li>
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item dropdown p-1">
                            <a class="btn btn-accedi" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ __('ui.revArea') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('revisor.index') }}">{{ __('ui.toRev') }}
                                        <span class="position-absolute top-25 start-75 badge rounded-pill bg-danger">
                                            {{ App\Models\Adv::toBeRevisionedCount() }}
                                            <span class="visually-hidden">
                                                Messaggi non letti
                                            </span>
                                        </span>
                                    </a></li>
                                <li><a class="dropdown-item" href="{{ route('rejected') }}">{{ __('ui.toRevRej') }}</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('adv.index') }}">{{ __('ui.allAdvs') }}</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                @endauth
                
                {{-- SELEZIONE MULTILINGUA --}}
                <li class="nav-item dropdown dropstart p-1">
                    <a class="btn btn-accedi" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if (App::isLocale('it'))
                            <x-locale locale lang="it" nation="it" />
                        @elseif (App::isLocale('en'))
                            <x-locale locale lang="en" nation="gb" />
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        @if (App::isLocale('it'))
                        <li class="dropdown-item"><a href="">
                            <x-locale locale lang="en" nation="gb" />
                        </a></li>
                        @elseif (App::isLocale('en'))
                        <li class="dropdown-item"><a href="">
                            <x-locale locale lang="it" nation="it" />
                        </a></li>                        
                        @endif
                    </ul>
                </li>
                {{-- FINE SELEZIONE MULTILINGUA --}}
            </ul>
        </div>
    </div>
</nav>
