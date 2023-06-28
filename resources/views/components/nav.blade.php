<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" title="e-commerce">
            <picture>
                <img src="/public/img/prestoit-logo-con-txt.svg" alt="logo presto.it">
            </picture>



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
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Regitrati</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </button>

            </div>


            <div class="d-flex">
                <a class="btn btn-outline-success" role="button" href="#">Inserisci un annuncio</a>
            </div>
        </div>
    </div>
</nav>
