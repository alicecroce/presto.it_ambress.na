<x-main>

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4 ">

                <div class="col-6 ">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div id="carouselExampleIndica\tors" class="carousel slide">
                                @if ($adv->images)
                                    <div class="carousel-inner">
                                        @foreach ($adv->images as $image)
                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                <img src="{{ asset( $image->getUrl(300, 300)) }}" class="img-fluid p-3 rounded"
                                                    alt="{{$adv->title}}">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner ">
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
                                @endif
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

                <div class="col-6">
                    <div class="portfolio-info ">
                        <h1 style="color: #6230A3 ">{{ ucFirst($adv->title) }}</h1>
                        <ul>

                            <li>
                                <h2><strong>€ {{ $adv->price }} </strong></h2>
                            </li>

                            <li style="color: #778899"><i class="bi bi-tag"></i> {{ ucFirst($adv->category->name) }}
                            </li>

                            <li><strong>{{ __('ui.shortDesc') }}:</strong> {{ ucfirst($adv->abstract) }}</li>
                            <li>
                            <li style="color: #778899"> {{ ucFirst($adv->description) }}</li>
                            </li>
                            <hr>
                            <li><i class="bi bi-cursor" style="color: #778899"></i> {{ ucFirst($adv->user->city) }}</li>

                            <li>
                                <div class="row">
                                    <div class="col-4"> <i class="bi bi-person-circle" style="color: #778899"></i>
                                        {{ ucFirst($adv->user->name) }} {{ $adv->user->surname }}</div>

                                    <a class="col-3 btn btn-sm btn-accedi mx-2" href="tel:{{ $adv->user->phone }}">
                                        <i class="bi bi-telephone m-1"></i>{{ __('ui.call-me') }}
                                    </a>
                                    <a class="col-3 btn btn-sm btn-accedi mx-2" href="email:{{ $adv->user->email }}">
                                        <i class="bi bi-envelope m-1"></i>{{ __('ui.write-me') }}
                                    </a>

                                </div>
                            </li>




                        </ul>
                    </div>


                </div>

            </div>

        </div>
    </section>


</x-main>
