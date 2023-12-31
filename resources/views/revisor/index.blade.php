<x-main>


    <div class="d-flex justify-content-center">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible w-75" role="alert">
                <div> {{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row justify-content-center my-2">

            @if ($adv_to_check)
                <div class="col-6">

                    <div id="portfolio-details" class="portfolio-details">
                        <div class="card">
                            <div class="portfolio-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">

                                    <div id="carouselExampleIndicators" class="carousel slide">

                                        @if ($adv_to_check->images->count() > 0)
                                            <div class="carousel-inner">
                                                @foreach ($adv_to_check->images as $image)
                                                    <div
                                                        class="carousel-item @if ($loop->first) active @endif">
                                                        <img src="{{ asset($image->getUrl(300, 300)) }}"
                                                            class="img-fluid p-3 rounded" alt="...">
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


                                        @if ($adv_to_check->images->count() > 0)
                                            <div class="col-12 col-md-6">
                                                <h5 class="tc-accent mt-3">Tags</h5>
                                                <div class="p-2">
                                                    @if ($image->labels)
                                                        @foreach ($image->labels as $label)
                                                            <p class="d-inline">{{ $label }}</p>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="tc-accent">Revisione Immagini</h5>
                                                    <p><b>Adulti:</b> <span class="{{ $image->adult }}"></span></p>
                                                    <p><b>Satira:</b> <span class="{{ $image->spoof }}"></span></p>
                                                    <p><b>Medicina:</b> <span class="{{ $image->medical }}"></span>
                                                    </p>
                                                    <p><b>Violenza:</b> <span class="{{ $image->violence }}"></span>
                                                    </p>
                                                    <p><b>Contenuto Ammiccante:</b> <span
                                                            class="{{ $image->racy }}"></span></p>
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

                            <div class="portfolio-info">
                                <h4 class="card-title fw-bold" style="color: #6230A3 ">
                                    {{ Str::ucfirst($adv_to_check->title) }}
                                </h4>
                                <hr>
                                <ul>
                                    <li><strong>{{ __('ui.revPrice') }}</strong>: € {{ $adv_to_check->price }} </li>
                                    <li><strong>{{ __('ui.from') }}</strong>:
                                        {{ Str::ucfirst($adv_to_check->user->city) }} </li>
                                </ul>
                                <hr>
                                <div><strong>{{ __('ui.shortDesc') }}:</strong>
                                    {{ Str::ucfirst($adv_to_check->abstract) }}</div>
                                <br>
                                <div class="text-justify about-text-justify">
                                    <strong>{{ __('ui.moreInfo') }}: </strong>
                                    <p>{{ Str::ucfirst($adv_to_check->description) }}</p>
                                </div>
                                <hr>

                                <ul>
                                    <li><strong>{{ __('ui.categ') }}</strong>:
                                        {{ Str::ucfirst($adv_to_check->category->name) }}
                                    </li>
                                    <li><strong>{{ __('ui.Advertiser') }}</strong>: {{ Str::ucfirst($adv_to_check->user->name) }}
                                        {{ Str::ucfirst($adv_to_check->user->surname) }}</li>
                                    <li><strong>{{ __('ui.pubDate') }}</strong>:
                                        {{ $adv_to_check->created_at->format('d/m/Y') }}</a>
                                    </li>
                                </ul>

                                <div class="row">

                                    <div class="col-6 ">
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ route('revisor.accept_adv', ['adv' => $adv_to_check]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-outline-success ">{{ __('ui.accept') }}</button>
                                            </form>
                                        </div>
                                    </div>


                                    <div class="col-6 ">
                                        <div class="d-flex justify-content-center">
                                            <form action="{{ route('revisor.reject_adv', ['adv' => $adv_to_check]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="btn btn-outline-danger">{{ __('ui.reject') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            @else
                {{ __('ui.noPostRev') }}
            @endif
        </div>
    </div>
</x-main>
