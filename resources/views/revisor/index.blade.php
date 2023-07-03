<x-main>
    <section id="portfolio-details" class="portfolio-details">
        @if ($adv_to_check)
            <div class="container">

                <div class="row gy-4">
                    <div class="col-lg-8">
                        <h1 class="display-2">
                            {{ $adv_to_check ? 'Ecco l\'annuncio da revisonare' : 'Non ci sono annunci da revisionare' }}
                        </h1>

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
                    </div>

                    <div class="col-lg-4">
                        <div class="portfolio-info">
                            <h3 class="display-5 fw-bold" style="color: #6230A3 ">{{ $adv_to_check->title }}</h3>
                            <ul>
                                <li><strong>Prezzo</strong>: € {{ $adv_to_check->price }} </li>
                                <li><strong>Breve descrizione:</strong>: {{ $adv_to_check->abstract }}</li>
                                <li><strong>Categorie</strong>: Categoria di esempio</li>
                                <hr>
                                <li><strong>Inserzionista</strong>: <a href="#">Inserzionista esempio</a></li>
                                <li><strong>Pubblicato il</strong>: {{ $adv_to_check->created_at->format('d/m/Y') }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portfolio-description">
                            <h2>Informazioni aggiuntive</h2>
                            <p>{{ $adv_to_check->description }}</p>
                        </div>
                    </div>


                </div>

<div class="row">
    <div class="col-12 col-md-6">
        <form action="{{route('revisor.accept_adv', [adv=>$adv_to_check])}}" method="POST">
        @CSRF
        
        
        
        </form>

    </div>

</div>





            </div>
        @endif
    </section>









</x-main>
