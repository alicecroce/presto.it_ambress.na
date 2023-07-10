<x-main>

    <div id="success-message">
        @if (session('success'))
            <div class="d-flex justify-content-center">
                <div class="alert alert-success w-75 align-items-center text-center" role="alert">
                    <span class="bi bi-check-circle m-2"></span>
                    {{ session('success') }}
                </div>
            </div>
        @endif
    </div>


    <div class="container my-5">
        {{-- Ho provato ma va in confitto con un controller, non sto capendo perché --}}
        {{-- <div class="container my-2 d-inline d-flex">
            <select class="form-select w-50" name="categories" id="">
                <option value="">Scegli una categoria</option>
                @forelse ($categories as $category)
            
                    <option value="">{{$category->name}}</option>
                @empty
                    Nessuna categoria, sorry
                @endforelse
            </select>
            <a class="btn btn-cerca mx-3" href="">Filtra ricerca</a>
        </div> --}}
        <div class="row">
            <h1 id="categoryName">
                @if (Route::currentRouteName() == 'categoryshow')
                    {{ ucFirst($category->name) }}
                @else
                    {{ __('ui.allAdvs') }}
                @endif
            </h1>
        </div>
        <div class="row">
            @forelse ($advs as $adv)
                <div class="col-12 col-md-3">
                    <div class="card my-3" style="height: 36rem;">
                        <a class="btn btn-warning no-pointer btn-sm text-violet text-capitalize position-absolute mt-3 ms-3 "
                            href="{{ route('categoryshow', ['category' => $adv->category_id]) }}">
                            {{ $adv->category->name }}</a>
                        <img src="{{ !$adv->images()->get()->isEmpty()? asset($adv->images()->first()->getUrl(300, 300)): 'https://placehold.co/300/6230A3/FFFFFF/png' }}"
                            class="card-img-top" alt="...">
                        <div class="card-body position-relative">
                            <h5 class="card-title">{{ ucFirst($adv->title) }}</h5>
                            <div class="h-50">
                                <p class="card-text">{{ ucFirst($adv->abstract) }}</p>
                            </div>
                            <div class="row">
                                <div class="col border-top">
                                    {{ ucfirst($adv->getCategory()) }}
                                </div>
                                <div class="col">
                                    € {{ $adv->price }}
                                </div>
                            </div>
                            <a href="{{ route('adv.show', ['adv' => $adv['id']]) }}"
                                class="btn btn-show position-absolute bottom-0 end-0 m-3">{{ __('ui.btnInfo') }}
                            </a>
                        </div>
                    </div>
                </div>
            @empty
        </div>
        <div class="row py-3">
            <div>
                {{ __('ui.noPost') }}
            </div>
        </div>
        @endforelse
        {{ $advs->links() }}
    </div>

</x-main>
