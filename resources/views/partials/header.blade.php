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

<nav class="navbar navbar-expand-lg fixed-top navbar-light js-header">
  <div class="container">
    <a class="navbar-brand order-1 order-lg-0" href="#">
      <img src="@asset('images/temp/company-logo.svg')" alt="" srcset="">
    </a>
    <button class="navbar-toggler order-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav m-auto">
        <li class="nav-item active">
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
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                  About Us
                </a>
                <div class="dropdown-menu" >
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                  Contact
                </a>
                <div class="dropdown-menu" >
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <button class="btn btn-lg btn-outline-primary" type="button">Go to Check out</button>
              </li>
          </ul>
          <div class="content-info">
            <div class="brand-container">
              <a href="#" class="brand-footer">
                <img src="@asset('images/temp/company-logo.svg')" class="" alt=""/>
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
    <div class="navbar-helper order-2">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link nav-link-cart" href="#">
              <img src="@asset('images/icon/icon_cart.svg')" alt="" srcset="">
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

