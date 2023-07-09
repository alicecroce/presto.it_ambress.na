<x-main>

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user_profile.index')}}">User</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('ui.editProfile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row position-relative">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('/storage/img/placeholderlogin.png') }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h5>
                            <p class="text-muted mb-4">{{ Auth::user()->city }}</p>
                        </div>
                    </div>
                </div>
                <form action="{{ route('user-profile-information.update') }}" method="POST" class="was-validated">
                    @csrf
                    @method('PUT')
                    <fieldset class="rounded  bg-custom text-white">
                        <legend class="m-2 text-center">{{__('ui.editInfo')}}</legend>
                        <div class="m-3 d-flex">
                            <label class="form-label mx-auto" for="name">{{__('ui.name')}}</label>
                            <input class="form-control w-75" type="text" name="name"
                                value="{{ Auth::user()->name }}" id="name" />
                        </div>
                        <div class="m-3 d-flex">
                            <label class="form-label mx-auto" for="surname">{{__('ui.surname')}}</label>
                            <input class="form-control w-75" type="text" name="surname"
                                value="{{ Auth::user()->surname }}" id="surname" />
                        </div>
                        <div class="m-3 d-flex">
                            <label class="form-label mx-auto" for="email">{{__('ui.emailAdd')}}</label>
                            <input class="form-control w-75" type="mail" name="email"
                                value="{{ Auth::user()->email }}" id="email" />
                        </div>
                        <div class="m-3 d-flex">
                            <label class="form-label mx-auto" for="city">{{__('ui.city')}}</label>
                            <input class="form-control w-75" type="text" name="city"
                                value="{{ Auth::user()->city }}" id="city" />
                        </div>
                        <div class="m-3 d-flex">
                            <label class="form-label mx-auto" for="phone">{{__('ui.telephone')}}</label>
                            <input class="form-control w-75" type="text" name="phone"
                                value="{{ Auth::user()->phone }}" id="phone" />
                        </div>



                        <button type="submit" class="btn btn-form m-3 float-end">{{__('ui.editProfile')}}</button>
                    </fieldset>
                </form>



                <form action="{{ route('user_profile.destroy') }}" method="POST" class=""
                    id="delete-{{ Auth::user()->id }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-end m-3">{{__('ui.btnDelete')}}</button>

                </form>
            </div>
        </div>
    </section>

</x-main>
