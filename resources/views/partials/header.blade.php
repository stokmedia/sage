<nav class="navbar navbar-expand-lg fixed-top js-header">
    <div class="container">
        <a class="navbar-brand order-1 order-lg-0" href="#">
            <img src="@asset('images/company-logo.svg')" alt="" srcset="">
            <img src="@asset('images/company-logo-mobile.svg')" class="mobile-logo" alt="" srcset="">
        </a>
        <button class="navbar-toggler order-0" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <span class="navbar-toggler-icon"></span> --}}
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="collapse navbar-collapse order-3 order-lg-1" id="navbarNav">
            {!! App::desktopNavigation() !!}
            
            {{--TODO: Remove comments when done--}}
            {{--<ul class="navbar-nav m-auto">--}}
                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="http://localhost:8080" role="button">--}}
                        {{--Kjolar--}}
                    {{--</a>--}}
                    {{--<button class="btn btn-icon btn-icon-sm" type="button" data-toggle="dropdown">--}}
                        {{--<img src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">--}}
                    {{--</button>--}}
                    {{--<div class="dropdown-menu">--}}
                        {{--<a class="btn-back" href="#" role="button">Back</a>--}}
                        {{--<ul class="navbar-nav m-auto">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#">Toppar</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#">Klänningar</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#">Byxor</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#">Funktion & Regn</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Toppar</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Klänningar</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Byxor</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Funktion & Regn</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
            <div class="navbar-nav-touch m-auto d-block d-lg-none">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://localhost:8080" role="button">
                            About Us
                        </a>
                        <button class="btn btn-icon btn-icon-sm" type="button" data-toggle="dropdown">
                            <img src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">
                        </button>
                        <div class="dropdown-menu">
                            <a class="btn-back" href="#" role="button">Back</a>
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Toppar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Klänningar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Byxor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Funktion & Regn</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://localhost:8080" role="button">
                            Contact
                        </a>
                        <button class="btn btn-icon btn-icon-sm" type="button" data-toggle="dropdown">
                            <img src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">
                        </button>
                        <div class="dropdown-menu">
                            <a class="btn-back" href="#" role="button">Back</a>
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Toppar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Klänningar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Byxor</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Funktion & Regn</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-lg btn-outline-primary btn-checkout" type="button">Go to Check out
                        </button>
                    </li>
                </ul>
                <div class="content-info">
                    <div class="brand-container">
                        <a href="#" class="brand-footer">
                            <img src="@asset('images/company-logo-mobile.svg')" class="" alt=""/>
                        </a>
                        <ul class="group-links">
                            <li>
                                <a href="#">
                                    <img src="@asset('images/icon/icon-insta.svg')" class="" alt=""/>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="@asset('images/icon/icon-facebook.svg')" class="" alt=""/>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-helper order-2 order-lg-2">
            <ul class="navbar-nav float-lg-right p-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-cart" href="#">
                        <img src="@asset('images/icon/icon_cart.svg')" alt="" srcset="">
                        <span class="cart-item-count text-center">1</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

