<x-main>

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-6">
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
                                        <img src="https://picsum.photos/200/200" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/200/200" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://picsum.photos/200/200" class="d-block w-100" alt="...">
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

                <div class="col-lg-6">
                    <div class="portfolio-info">
                        <h2 class="display-5 fw-bold" style="color: #6230A3 ">{{ $adv->title }}</h2>
                        <ul>

                            <li><strong>Prezzo</strong>: € {{ $adv->price }} </li>
                            <li><strong>Categorie</strong>: Categoria di esempio</li>
                            <hr>
                            <li><strong>Breve descrizione:</strong> {{ $adv->abstract }}</li>
                            <li>
                            <li><strong>Informazioni aggiuntive:</strong> {{ $adv->description }}</li>
                            </li>
                            <hr>
                            <li><strong>Inserzionista</strong>: {{ $adv->user->name }} {{ $adv->user->surname }}</li>
                            <li><strong>Provenienza</strong>: {{ $adv->user->city }}</li>

                        </ul>


                    </div>


                </div>

            </div>

        </div>
    </section>


</x-main>
