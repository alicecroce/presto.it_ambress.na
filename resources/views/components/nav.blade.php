<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" style="width: 10%" href="/">
            <img class="img-fluid" src="storage\img\prestoit-logo-con-txt.png" alt="logo presto.it">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <input class="form-control me-4" type="search" placeholder="cerca su Presto" aria-label="Search">

            <div class="d-flex me-3 nav-item dropdown" role="button">
                <button class="btn btn-outline-success" type="submit">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Accedi o registrati
                    </a>
                    <ul class="dropdown-menu">
                        @auth
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item"
                                        onclick="event.preventDefault(); this.closest('form').submit();">Logout
                                    </button>
                                </form>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                            </li>
                        @else
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('register') }}">Registrati</a>
                            </li>

                        @endauth
                    </ul>
                </button>
            </div>


            <div class="d-flex">
                <a class="btn btn-outline-success" role="button" href="#">Inserisci un annuncio</a>
            </div>
        </div>
    </div>
</nav>
