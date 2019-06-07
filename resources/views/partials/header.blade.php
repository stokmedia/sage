{{-- <header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header> --}}

<nav class="navbar navbar-expand-lg fixed-top js-header">
  <div class="container">
    <a class="navbar-brand order-1 order-lg-0" href="#">
      <img src="@asset('images/company-logo.svg')" alt="" srcset="">
      <img src="@asset('images/company-logo-mobile.svg')" class="mobile-logo" alt="" srcset="">
    </a>
    <button class="navbar-toggler order-0 js-nav-toggle" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <div class="collapse navbar-collapse order-3 order-lg-1" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Kjolar</a>
        </li>
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
                <button class="btn btn-lg btn-outline-primary btn-checkout" type="button">Go to Check out</button>
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
        <li class="nav-item nav-item-cart js-cart-overlay">
          <a class="nav-link nav-link-cart" href="#">
              <img src="@asset('images/icon/icon_cart.svg')" alt="" srcset="">
              <span class="cart-item-count text-center">1</span>
          </a>
          <div class="cart">

            {{-- Desktop Cart --}}
            <div class="cart-wrapper d-none d-lg-block">
              <div class="cart-title h3 text-center">Varan är tillagd!</div>
              <div class="cart-list">
                <ul class="cart-items p-0">
                  <li class="item">
                      @include('partials.product-details-inline')
                  </li>
                  <li class="item">
                      @include('partials.product-details-inline')
                  </li>
                </ul>
              </div>
              <div class="cart-summary">
                <div class="summary">
                  <div class="summary-group">
                    <div class="summary-item d-flex">
                      <div class="title w-50">Totalt</div>
                      <div class="price w-50 text-right">799 kr</div>
                    </div>
                    <div class="summary-item d-flex">
                      <div class="title w-50">Moms</div>
                      <div class="price w-50 text-right">46 kr</div>
                    </div>
                    <div class="summary-item d-flex">
                      <div class="title w-50">Frakt</div>
                      <div class="price w-50 text-right">0 kr</div>
                    </div>
                    <div class="summary-item d-flex">
                      <div class="title w-50">Sub Totalt</div>
                      <div class="price w-50 text-right"><strong>799  kr</strong></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="cart-buttons">
                <button class="btn btn-lg btn-primary" type="button">Till kassan</button>
                <button class="btn btn-lg btn-outline-primary" type="button">Shoppa mer</button>
              </div>
            </div>

            {{-- Mobile Cart --}}
            <div class="cart-wrapper is-mobile d-block d-lg-none">
              <div class="cart-title h3 text-center">Varan är tillagd!</div>
              <div class="cart-list">
                <ul class="cart-items p-0">
                  <li class="item">
                      @include('partials.product-details-inline')
                  </li>
                </ul>
              </div>
              <div class="cart-buttons">
                <button class="btn btn-lg btn-primary" type="button">Till kassan</button>
                <button class="btn btn-lg btn-outline-primary" type="button">Shoppa mer</button>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

