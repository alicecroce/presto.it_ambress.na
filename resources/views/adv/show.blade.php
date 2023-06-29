<x-main>

    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <div class="row">
                    <h1 class="display-5 text-center">{{ $adv->title }}</h1>
                    <div class="col-12 col-md-6">
                        <img class="img-fluid" style="height: 24rem;" src="{{ Storage::url($adv->image) }}" alt="...">
                    </div>
                    <div class="col-12 col-md-4 text-wrap">
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

</x-main>
