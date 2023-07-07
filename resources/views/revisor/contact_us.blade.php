<x-main>
    <div id="success-message">
        @if (session('success'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success w-75 align-items-center text-center" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>

    <div class="container-fluid ps-md-0">
        <div class="row g-0">
            <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image opacity-75 "></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-4">
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
                                <h3 class="login-heading mb-4">Contattaci! Entra nel team di Presto.it</h3>

                                <!-- Sign In Form -->
                                <form action="{{ route('savecontact.revisor') }}" method="POST">
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
                                            <input readonly type="text" value="{{ Auth::user()->name }}"
                                                name="name" class="form-control" id="name" placeholder="Gino">
                                            <label for="name">Nome</label>
                                        </div>
                                        <div class="form-floating flex-grow-1 mb-3 ">
                                            <input readonly type="text" value="{{ Auth::user()->surname }}"
                                                name="surname" class="form-control" id="surname" placeholder="Gini">
                                            <label for="surname">Cognome</label>
                                        </div>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" value="{{ Auth::user()->email }}" name="email"
                                            class="form-control" id="email" placeholder="name@example.com">
                                        <label for="email">Indirizzo mail</label>
                                    </div>

                                    <div class="mb-3">
                                        <textarea style="height: 8rem;" name="description" class="form-control"
                                            placeholder="Scrivi un breve messaggio sul perchè vorrresti collaborare come revisore nel team di Ambress.na per Presto.it"
                                            id="description"></textarea>
                                    </div>




                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-login text-uppercase fw-bold mb-2 btn-cerca"
                                            type="submit">Invia la tua candidatura</button>
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
