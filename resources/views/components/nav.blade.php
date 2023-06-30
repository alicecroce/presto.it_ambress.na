<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" style="width: 10%" href="/">
            <img class="img-fluid" src="{{ asset(Storage::url('public/img/prestoit-logo-con-txt.png')) }}"
                alt="logo presto.it">
        </a>
        
        <form class="d-flex flex-grow-1" action="{{route('advs.search')}}" method="GET" role="search">
            <input class="form-control flex-grow me-2" name="searched" type="search" placeholder="Cerca su Presto.it" aria-label="Search">
            <button class="btn btn-cerca" type="submit">Cerca</button>
        </form>

        <button class="navbar-toggler mx-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown p-1">
                    @auth
                        <a class="btn btn-accedi mx-2" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Profilo
                        </a>
                        <ul class="dropdown-menu mx-2">
                            <li><a class="dropdown-item" href="#">Profilo</a></li>
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
                            Accedi | Registrati
                        </a>
                        <ul class="dropdown-menu mx-3">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Accedi</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Registrati</a></li>
                        </ul>
                    @endauth
                </li>
                @auth
                <li class="nav-item p-1 me-1">
                    <a class="btn btn-accedi" role="button" href="{{route('adv.create')}}">Inserisci un annuncio</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
