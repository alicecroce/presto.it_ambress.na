    <footer id="footer">


        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Presto.it</h3>
                        <p>
                            Lorem ipsum dolor sit amet. <br>
                            Napoli, NA 90123<br>
                            Torino <br><br>
                            <strong>{{ __('ui.phone') }}</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@presto.it<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>{{ __('ui.links') }}</h4>
                        <ul>
                            <li>
                                <box-icon name='chevron-right' type='solid' color='#fec200'></box-icon><a href="/">
                                    Home</a>
                            </li>
                            @auth
                                <li>
                                    <box-icon name='chevron-right' type='solid' color='#fec200'></box-icon><a
                                        href="{{ route('adv.create') }}">{{ __('ui.addAdv') }}</a>
                                </li>
                            @else
                                <li>
                                    <box-icon name='chevron-right' type='solid' color='#fec200'></box-icon><a
                                        href="{{ route('register') }}">{{ __('ui.register') }}</a>
                                </li>
                                <li>
                                    <box-icon name='chevron-right' type='solid' color='#fec200'></box-icon><a
                                        href="{{ route('login') }}">{{ __('ui.login') }}</a>
                                </li>
                            @endauth
                        </ul>
                    </div>

                    @auth
                        <div class="col-lg-3 col-md-6 footer-links">
                            <h4>{{ __('ui.workWithUS') }}</h4>
                            <ul>
                                @if (Auth::user()->is_revisor)
                                    <li>
                                        <box-icon name='chevron-right' type='solid' color='#fec200'></box-icon>
                                        <a href="{{ route('revisor.index') }}">{{ __('ui.toRev') }}</a>
                                    </li>
                                @else
                                    <li>
                                        <box-icon name='chevron-right' type='solid' color='#fec200'></box-icon>
                                        <a href="{{ route('contactus.revisor') }}">{{ __('ui.becomRev') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endauth

                    <div class="col-lg-3 col-md-6 footer-links ms-auto">
                        <h4>{{ __('ui.ourSocial') }}</h4>
                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                        <div class="social-links mt-3">
                            <a href="{{ route('mancave') }}">
                                <box-icon type='logo' name='twitter' color='#ffffff'></box-icon>
                            </a>
                            <a href="#">
                                <box-icon name='facebook' type='logo' color='#ffffff'></box-icon>
                            </a>
                            <a href="#">
                                <box-icon name='instagram' type='logo' color='#ffffff'></box-icon>
                            </a>
                            <a href="#">
                                <box-icon type='logo' name='tiktok' color='#ffffff'></box-icon>
                            </a>
                            <a href="#">
                                <box-icon type='logo' name='linkedin' color='#ffffff'></box-icon>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Presto.it</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                </a> Designed by <strong><span>Giulia Volpe, Giuseppe Maria Arnone, Alice Croce e Maria
                        Fallacara</span></strong> per
                Aulab srl</a>
            </div>
        </div>
    </footer>
