<x-main>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row position-relative">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="
                            @if (Auth::user()->user_img) {{ asset('storage/' . Auth::user()->user_img) }}
                            @else
                            {{ asset('storage/img/placeholderlogin.png') }} @endif"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ Str::ucfirst(Auth::user()->name) }}
                                {{ Str::ucfirst(Auth::user()->surname) }}</h5>
                            <p class="text-muted mb-4">{{ Str::ucfirst(Auth::user()->city) }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{ route('user_profile.edit') }}"
                                    class="btn btn-accedi ms-1">{{ __('ui.editProfile') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 ">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('ui.name') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Str::ucfirst(Auth::user()->name) }}
                                        {{ Str::ucfirst(Auth::user()->surname) }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">{{ __('ui.phone') }}</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Annunci Online</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Hai attualmente online {{ @count($advs) }} annunci</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($advs as $adv)
                            <div class="col-12 col-md-6">
                                <div class="card my-3" style="height: 38rem;">
                                    <img src="{{ !$adv->images()->get()->isEmpty()? asset($adv->images()->first()->getUrl(300, 300)): 'https://placehold.co/300/6230A3/FFFFFF/png' }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body position-relative">
                                        <h5 class="card-title">{{ $adv->title }}</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col mt-2">
                                                {{ ucfirst($adv->getCategory()) }}
                                            </div>
                                            <div class="col mt-2">
                                                € {{ $adv->price }}
                                            </div>
                                        </div>
                                        <div>
                                            <a href="{{ route('adv.show', ['adv' => $adv['slug']]) }}"
                                                class="btn btn-show float-end mt-2">{{ __('ui.btnInfo') }}
                                            </a>
                                        </div>
                                        <div>
                                            <a href="{{ route('adv.edit', ['adv' => $adv['slug']]) }}"
                                                class="btn btn-show float-start mt-2">{{ __('ui.btnEdit') }}
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @empty
                    </div>
                    <div class="row py-3">
                        <div>
                            Nessun annuncio, sorry. :(
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
        </div>
        {{-- {{$advs->link()}} --}}
    </section>

</x-main>
