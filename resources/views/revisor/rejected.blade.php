<x-main>
    <div class="container my-5">

        <div class="row">
            @forelse ($advs as $adv)
                <div class="col-12 col-md-3">
                    <div class="card my-3" style="height: 36rem;">
                        <img src="https://placehold.co/300/6230A3/FFFFFF/png" class="card-img-top" alt="...">
                        <div class="card-body position-relative">
                            <h5 class="card-title">{{ $adv->title }}</h5>
                            <div class="h-50">
                                <p class="card-text">{{ $adv->abstract }}</p>
                            </div>

                            <div class="row">
                                <div class="col border-top">
                                    {{ $adv->getCategory() }}
                                </div>
                                <div class="col">
                                    € {{ $adv->price }}
                                </div>
                            </div>

                            
                            <div class="col-12 col-md-6">
                                <form action="{{ route('revisor.accept_adv', ['adv' => $adv_to_check]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success shadow">Accetta</button>
                                </form>
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
        {{ $advs->links() }}
    </div>

</x-main>
