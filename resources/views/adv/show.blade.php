<x-main>

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">

                <div class="row align-items-center">
                    <div class="col-12 col-md-6 ">

                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
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

                    <div class="col-12 col-md-4 text-wrap">
                        <h1 class="display-5 fw-bold" style="color: #6230A3 ">{{ $adv->title }}</h1>
                        <h4>Prezzo: {{ $adv->price }}</h4>
                        <h5 class="fw-bold">Descrizione</h5>
                        <p class="lh-base">{{ $adv->abstract }}</p>
                        <h5 class="fw-bold">Informazioni aggiuntive</h5>
                        <p class="lh-base">{{ $adv->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</x-main>
