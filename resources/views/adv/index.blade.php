<x-main>
    <div class="container my-5">
        @forelse ($advs as $adv)
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="https://placehold.co/300/6230A3/FFFFFF/png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $adv->title }}</h5>
                            <p class="card-text">{{ $adv->abstract }}</p>
                            <div class="row">
                                <div class="col">
                                    {{$adv->getCategory()}}
                                </div>
                                <div class="col">
                                    {{$adv->price}}
                                </div>
                            </div>
                            <a href="{{route('adv.show', ['adv'=> $adv['id']])}}" class="btn btn-show float-end">Vedi Annuncio</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
    </div>
</x-main>
