<x-errors-view>

    <section class="page_404 ">
        <div class="container ">
            <div class="row ">
                <div class="col-sm-12 ">
                    <div class="col-sm-offset-1 text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>


                        </div>

                        <div class="contant_box_404">
                            <h3 class="h2">
                                {{ __('ui.lost') }}
                            </h3>

                            <p>{{__('ui.pageUnavailable')}}</p>

                            <a href="{{ route('welcome') }}" class="link_404">{{__('ui.backHome')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-errors-view>
