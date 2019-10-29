@include('partials.alert')
<nav class="navbar navbar-expand-lg fixed-top {{(get_page_template_slug() == 'views/template-checkout.blade.php') ? 'is-checkout': ''}} js-header">

    @if (get_page_template_slug() !== 'views/template-checkout.blade.php')

        <div class="container">
            <a class="navbar-brand order-1 order-lg-0" href="{{ $home_url }}">
                {!! $logo['desktop'] !!}
                {!! $logo['mobile'] !!}
            </a>

            <button class="navbar-toggler order-0 js-nav-toggle" type="button" data-toggle="collapse"
                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="{{ $site_translate->general['toggle_navigation'] ?: 'Toggle navigation' }}">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="collapse navbar-collapse dont-collapse-lg order-3 order-lg-1" id="navbarNav">
                {{--
                    NOTE:
                    If you want to display search by default add class .show to div.js-search-form
                --}}
                <div class="search js-search-form">
                    <button class="btn btn-icon btn-icon-sm btn-primary-outline d-none d-lg-block search-close js-search-close" type="button">
                        <img src="@asset('images/icon/close.svg')" alt="" srcset="">
                    </button>
                    <form action="{{ $home_url }}" method="get" class="m-0">
                        <input id="js-search-input" type="search" name="s" class="search-input" placeholder="Search...">
                        <button type="submit" class="search-submit border-0">
                            <img src="@asset('images/icon/search.svg')" alt="" srcset="">
                        </button>
                    </form>
                </div>

                @if($desktop_menu)
                    <ul class="navbar-nav m-auto">
                        @foreach($desktop_menu as $menuItem)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $menuItem->url  }}" target="{{ $menuItem->target  }}">{!! $menuItem->title !!}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif

                <div class="navbar-nav-touch m-auto d-block d-lg-none">

                    @if (!empty($mobile_menu) || (!empty($checkout_link_array->title) && !empty($checkout_link_array->url)))
                    <ul class="navbar-nav">
                        @if($mobile_menu)
                            @foreach($mobile_menu as $menuItem)
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                        href="{{ $menuItem->url  }}"
                                        target="{{ $menuItem->target }}"
                                        role="button">{!! $menuItem->title !!}</a>

                                    @if( isset($menuItem->children) && count($menuItem->children) )
                                        <button class="btn btn-icon btn-icon-sm" type="button" data-toggle="dropdown">
                                            <img src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="btn-back">{!! $site_translate->general['back'] ?: 'Back' !!}</a>
                                            <ul class="navbar-nav m-auto">
                                                @foreach($menuItem->children as $subMenuItem)
                                                    <li class="nav-item">
                                                        <a class="nav-link"
                                                        href="{{ $subMenuItem->url }}"
                                                        target="{{ $subMenuItem->target }}">{!! $subMenuItem->title !!}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        @endif

                        {{-- Checkout button --}}
                        @if (!empty($checkout_link_array->title) && !empty($checkout_link_array->url))
                            <li class="nav-item">
                                <a href="{{ $checkout_link_array->url }}">
                                    <button class="btn btn-lg btn-outline-primary btn-checkout" type="button">{!! $checkout_link_array->title !!}</button>
                                </a>
                            </li>
                        @endif
                    </ul>
                    @endif

                    <div class="content-info">
                        <div class="brand-container">
                            <a href="{{ $home_url }}" class="brand-footer">
                                {!! $logo['mobile_menu'] !!}
                            </a>

                            @if($social_links)
                                <ul class="group-links">
                                    @foreach($social_links as $link)
                                        <li>
                                            <a href="{{ $link['url']  }}" target="_blank" rel="nofollow noreferrer">
                                                @if($link['media'] === 'instagram')
                                                    <img src="@asset('images/icon/icon-insta.svg')" class="" alt="">
                                                @else
                                                    <img src="@asset('images/icon/icon-facebook.svg')" class="" alt="">
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            @include( 'partials.cart' )
        </div>

    @else

        {{-- Checkout Navigation --}}
        <div class="container nav-checkout">
            <div class="navbar-spacer">
                @if (!empty($checkout_header->shop_link))
                    <a href="{{ $checkout_header->shop_link['url'] }}" class="navbar-back" target="{{ $checkout_header->shop_link['target'] }}">{!! $checkout_header->shop_link['title'] !!}</a>
                @endif
            </div>


            @if (!empty($checkout_header->title))
                <h1 class="navbar-checkout h1 m-auto">{!! $checkout_header->title !!}</h1>
            @endif

            <div class="navbar-spacer d-none d-lg-block"></div>
        </div>
        {{-- End Checkout Navigation --}}

    @endif
</nav>

