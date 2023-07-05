<x-main>

    <div id="success-message">
        @if (session('success'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-warning w-75 align-items-center text-center" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>

    <section id="portfolio-details" class="portfolio-details">
        @if ($adv_to_check)
            <div class="container">
                <h1>
                    {{ $adv_to_check ? 'Sono presenti annunci da revisionare' : 'Non ci sono annunci da revisionare' }}
                </h1>

                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <div class="card">

                            <div class="portfolio-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">

                                    <div id="carouselExampleIndicators" class="carousel slide">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="0" class="active" aria-current="true"
                                                aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators"
                                                data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="https://picsum.photos/200/200" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://picsum.photos/200/200" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="https://picsum.photos/200/200" class="d-block w-100"
                                                    alt="...">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden"></span>
                                        </button>
                                    </div>

                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                            <div class="portfolio-info">
                                <h4 class="card-title fw-bold" style="color: #6230A3 ">{{ $adv_to_check->title }}</h4>
                                <hr>
                                <ul>
                                    <li><strong>Prezzo</strong>: € {{ $adv_to_check->price }} </li>
                                    <li><strong>Provenienza</strong>: {{ $adv_to_check->user->city }} </li>
                                </ul>
                                <hr>
                                <div><strong>Breve descrizione:</strong> {{ $adv_to_check->abstract }}</div>
                                <br>
                                <div><strong>Informazioni aggiuntive: </strong>
                                    <p>{{ $adv_to_check->description }}</p>
                                </div>
                                <hr>

                                <ul>
                                    <li><strong>Categorie</strong>: {{ $adv_to_check->category->name }} </li>
                                    <li><strong>Inserzionista</strong>: {{ $adv_to_check->user->name }}
                                        {{ $adv_to_check->user->surname }}</li>
                                    <li><strong>Pubblicato il</strong>:
                                        {{ $adv_to_check->created_at->format('d/m/Y') }}</a>
                                    </li>
                                </ul>

                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <form action="{{ route('revisor.accept_adv', ['adv' => $adv_to_check]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-outline-success shadow mx-5">Accetta</button>
                                        </form>
                                    </div>


                                    <div class="col-12 col-md-6">
                                        <form action="{{ route('revisor.reject_adv', ['adv' => $adv_to_check]) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="btn btn-outline-danger shadow mx-2 ">Rifiuta</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        @endif
    </section>

</x-main>
