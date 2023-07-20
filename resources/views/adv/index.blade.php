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
                    <div class="card my-3">
                        <a class="btn btn-warning no-pointer btn-sm text-violet  position-absolute mt-3 ms-3 "
                            href="{{ route('categoryshow', ['category' => $adv->category_id]) }}">
                            {{ __('ui.' . $adv->category->slug) }}</a>
                        <img src="{{ !$adv->images()->get()->isEmpty()? asset($adv->images()->first()->getUrl(300, 300)): 'https://placehold.co/300/6230A3/FFFFFF/png' }}"
                            class="card-img-top" alt="...">
                        <div class="card-body position-relative" style="height: 14rem">
                            <h6 class="card-title"><strong>{{ ucFirst($adv->title) }}</strong></h6>
                            <hr>
                            <div class="row m-2">
                                <div class="text-center">
                                    {{ __('ui.' . $adv->category->slug) }}
                                </div>
                            </div>
                            <div class="position-absolute bottom-0 start-0 m-3">
                                € {{ $adv->price }}
                            </div>
                            <div class="m-2 ">
                                <a href="{{ route('adv.show', ['adv' => $adv['slug']]) }}"
                                    class="btn btn-show m-3 position-absolute bottom-0 end-0">{{ __('ui.btnInfo') }}
                                </a>
                            </div>



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

    
    <x-footer/>

</x-main>
