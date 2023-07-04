<x-main>
    <div class="container my-5">

        <div class="row">
            @forelse ($advs as $adv)
                <div class="col-12 col-md-3">
                    <div class="card my-3" style="height: 36rem; width: 18rem;">

                        <img src="https://placehold.co/300/6230A3/FFFFFF/png" class="card-img-top" alt="img placeholder">
                        <div class="card-body position-relative">

                            <h5 class="card-title">{{ $adv->title }}</h5>
                            <div class="h-50">
                                <p class="card-text">{{ $adv->abstract }}</p>
                            </div>

                            <div class="row mt-3">
                                <div class="col border-top">
                                    {{ $adv->getCategory() }}
                                </div>
                                <div class="col">
                                    € {{ $adv->price }}
                                </div>
                            </div>

                            <div class="row mt-2 g-0">
                                <div class="col-6 g-0">
                                    <form action="{{ route('revisor.accept_adv', ['adv' => $adv]) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-cerca ">Accetta</button>
                                    </form>
                                </div>

                                <div class="col-6 g-0">
                                    <a href="{{ route('adv.show', ['adv' => $adv['id']]) }}"
                                        class="btn btn-accedi text-nowrap">Vedi
                                        Annuncio</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            @empty
                Nessun annuncio, sorry
            @endforelse
        </div>
        {{ $advs->links() }}
    </div>

</x-main>
