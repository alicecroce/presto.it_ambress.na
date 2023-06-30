<x-main>
    <div class="container my-5">
        <div class="row">
            @forelse ($advs as $adv)
                <div class="col-12 col-md-3">
                    <div class="card my-3" style="height: 36rem;">
                        <img src="https://placehold.co/300/6230A3/FFFFFF/png" class="card-img-top" alt="...">
                        <div class="card-body position-relative">
                            <h5 class="card-title">{{ $adv->title }}</h5>
                            <p class="card-text">{{ $adv->abstract }}</p>
                            <div class="row">
                                <div class="col">
                                    {{ $adv->getCategory() }}
                                </div>
                                <div class="col">
                                    {{ $adv->price }}
                                </div>
                            </div>

                            <a href="{{ route('adv.show', ['adv' => $adv['id']]) }}"
                                class="btn btn-show position-absolute bottom-0 end-0 m-3">Vedi
                                Annuncio</a>


                        </div>
                    </div>
                </div>

            @empty
                Nessun annuncio, sorry
            @endforelse
        </div>
    </div>
</x-main>
