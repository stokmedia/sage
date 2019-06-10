{{--
  Template Name: Product Listing Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    <section class="section category-banner no-mb" style="background-image:url( @asset('images/temp/category-banner.jpg') );">
      <div class="box-wrapper d-flex align-items-end">
        <div class="container">
          <div class="category-banner-info text-center text-sm-left">
            <div class="title h3">
              Skhoop Kjolar
            </div>
            <div class="content">
              <p>In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section product-header no-mb">
      <div class="container">

        {{-- TODO: Hide this if category banner is present --}}
        {{-- <h1 class="product-header-title h1 text-center">Skhoop Kjolar</h1> --}}

        <div class="product-header-actionbox row align-items-center">
          <div class="product-breadcrumbs col-lg-6 d-none d-lg-block">
              <div class="breadcrumb bg-white d-inline-block mb-0">
                <a class="breadcrumb-item" href="#">Home</a>
                <a class="breadcrumb-item" href="#">Level 2</a>
                <span class="breadcrumb-item active">Level 3</span>
              </div>
          </div>
          <div class="product-filter-toggle col-lg-6 text-center text-lg-right">
            <div class="h4 d-inline-block mb-0">
              <div class="js-filter-toggle">
                  <div class="filter-open js-filter-open">
                      Filtrera & Sortera
                      <button class="btn btn-lg btn-icon btn-icon-lg btn-default" type="button">
                        <img src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">
                      </button>
                  </div>
                  <div class="filter-close">
                      <a class="btn-clear" href="#" role="button">Rensa Alla</a>
                      <button class="btn btn-primary text-uppercase js-filter-close" type="button">Uppdatera</button>
                      <button class="btn btn-lg btn-icon btn-icon-lg btn-default js-filter-close" type="button">
                        <img src="@asset('images/icon/filter-close.svg')" alt="" srcset="">
                      </button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="product-filter js-filter-collapse">
        <div class="container">
            <div class="button-container d-block d-lg-none">
              <div class="row text-center d-block d-lg-flex">
                <div class="column">
                    <button class="btn btn-primary js-filter-close" type="button">Uppdatera</button>
                    <button class="btn btn-lg btn-icon btn-icon-lg btn-default js-filter-close" type="button">
                      <img src="@asset('images/icon/filter-close.svg')" alt="" srcset="">
                    </button>
                </div>
                <hr />
              </div>
            </div>
            <div class="filter-container">
              <div class="row ">
                  <div class="column">
                    <div class="h4 title js-accordion-toggle is-open">Size</div>
                    <div class="js-accordion-body">
                      <ul class="size-selector">
                        <li>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="sizeCheck1" class="custom-control-input">
                              <label class="custom-control-label" for="sizeCheck1">
                                  <span>XS</span>
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="sizeCheck2" class="custom-control-input" checked="checked">
                              <label class="custom-control-label" for="sizeCheck2">
                                  <span>S</span>
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="sizeCheck3" class="custom-control-input">
                              <label class="custom-control-label" for="sizeCheck3">
                                <span>M</span>
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="sizeCheck4" class="custom-control-input" disabled="disabled">
                              <label class="custom-control-label" for="sizeCheck4">
                                <span>L</span>
                              </label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" id="sizeCheck5" class="custom-control-input">
                              <label class="custom-control-label" for="sizeCheck5">
                                <span>XL</span>
                              </label>
                            </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="column">
                    <div class="h4 title js-accordion-toggle">Color</div>
                    <div class="js-accordion-body">
                      <ul class="color-selector">
                        <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="colorCheck1" class="custom-control-input">
                            <label class="custom-control-label" for="colorCheck1" style="background-color: #B7CAD0;"></label>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="colorCheck2" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="colorCheck2" style="background-color: #DAB4B4;"></label>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="colorCheck3" class="custom-control-input">
                            <label class="custom-control-label" for="colorCheck3" style="background-color: #B2B2B2;"></label>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="colorCheck4" class="custom-control-input" disabled="disabled">
                            <label class="custom-control-label" for="colorCheck4" style="background-color: #B7CAD0;"></label>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="colorCheck5" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="colorCheck5" style="background-color: #DAB4B4;"></label>
                          </div>
                        </li>
                        <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="colorCheck6" class="custom-control-input">
                            <label class="custom-control-label" for="colorCheck6" style="background-color: #B2B2B2;"></label>
                          </div>
                        </li>
                        @for ($i = 7; $i < 19; $i++)
                          <li>
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="colorCheck{{ $i }}" class="custom-control-input">
                              <label class="custom-control-label" for="colorCheck{{ $i }}" style="background-color: #B2B2B2;"></label>
                            </div>
                          </li>
                        @endfor
                      </ul>
                    </div>
                  </div>
                  <div class="column">
                    <div class="h4 title js-accordion-toggle">Kategori</div>
                    <div class="js-accordion-body">
                      <ul class="category-selector">
                        @for ($i = 0; $i < 4; $i++)
                          <li>
                          <div class="custom-control custom-control-lg custom-checkbox">
                            <input id="customCheck{{ $i }}" class="custom-control-input" checked="checked" type="checkbox">
                              <label class="custom-control-label" for="customCheck{{ $i }}">
                                <span>Sub category {{ $i }}</span>
                              </label>
                            </div>
                          </li>
                        @endfor
                      </ul>
                      <ul class="category-selector">
                        @for ($i = 5; $i < 9; $i++)
                          <li>
                          <div class="custom-control custom-control-lg custom-checkbox">
                            <input id="customCheck{{ $i }}" class="custom-control-input" disabled="disabled" type="checkbox">
                              <label class="custom-control-label" for="customCheck{{ $i }}">
                                <span>Sub category {{ $i }}</span>
                              </label>
                            </div>
                          </li>
                        @endfor
                      </ul>
                    </div>
                  </div>
              </div>
            </div>
            <div class="sort-container">
              <div class="row">
                  <div class="column">
                    <div class="h4 title d-block d-lg-inline-block js-accordion-toggle">Sort list by</div>
                    <div class="js-accordion-body d-block d-lg-inline-block">
                        <div class="sort-selector text-center text-sm-left">
                            <div class="btn-group btn-group-toggle d-inline-block d-sm-inline-flex" data-toggle="buttons">
                              <label class="btn btn-outline-primary">
                                <input id="option1" name="options" type="radio">
                                A-Ö
                              </label>
                              <label class="btn btn-outline-primary">
                                <input id="option2" name="options" type="radio">
                                Populäritet
                              </label>
                              <label class="btn btn-outline-primary">
                                <input id="option3" name="options" type="radio">
                                Övrigt
                              </label>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="button-container d-block d-lg-none">
              <div class="row text-center d-block d-lg-flex">
                <div class="column">
                  <a href="#" class="btn-clear">Rensa alla</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </section>

    <section class="section product-listing">
        <div class="container p-0">
          <div class="bg-image m-auto rounded-circle" style="background-image:url( <?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/bg-product-listing.jpg );"></div>
          <div class="products d-flex flex-wrap justify-content-center">
            @for ($i = 0; $i < 3; $i++)
              <div class="product is-big">
                <a href="#" class="product-wrapper bg-white d-block">
                  <figure class="product-image">
                    <img src="@asset('images/temp/erika-skirt.jpeg')" />
                    <img src="@asset('images/temp/erika-skirt1.jpeg')" class="visible-on-hover"/>
                  </figure>
                </a>
                <a href="#" class="product-details bg-white d-block text-center">
                  <div class="product-name h4">Prouct title</div>
                  <div class="product-price"><span>750 kr</span></div>
                </a>
              </div>
            @endfor
            <div class="product is-small">
              <a href="#" class="product-wrapper bg-white d-block">
                <figure class="product-image">
                  <img src="@asset('images/temp/erika-skirt.jpeg')" />
                  <img src="@asset('images/temp/erika-skirt1.jpeg')" class="visible-on-hover"/>
                </figure>
              </a>
              <a href="#" class="product-details bg-white d-block text-center">
                <div class="product-name h4">Prouct title</div>
                <div class="product-price"><span>750 kr</span></div>
              </a>
            </div>
            <div class="product is-small is-sale">
              <a href="#" class="product-wrapper bg-white d-block">
                <div class="product-status text-center"><span>REA</span></div>
                <figure class="product-image">
                  <img src="@asset('images/temp/erika-skirt.jpeg')" />
                  <img src="@asset('images/temp/erika-skirt1.jpeg')" class="visible-on-hover"/>
                </figure>
              </a>
              <a href="#" class="product-details bg-white d-block text-center">
                <div class="product-name h4">Prouct title</div>
                <div class="product-price"><span>750 kr</span>450 kr</div>
              </a>
            </div>
            <div class="product is-small is-oos">
              <a href="#" class="product-wrapper bg-white d-block">
                <div class="product-status text-center"><span>Slutsåld</span></div>
                <figure class="product-image">
                  <img src="@asset('images/temp/erika-skirt.jpeg')" />
                  <img src="@asset('images/temp/erika-skirt1.jpeg')" class="visible-on-hover"/>
                </figure>
              </a>
              <a href="#" class="product-details bg-white d-block text-center">
                <div class="product-name h4">Prouct title</div>
                <div class="product-price"><span>750 kr</span></div>
              </a>
            </div>
            <div class="product is-small">
              <a href="#" class="product-wrapper bg-white d-block">
                <figure class="product-image">
                  <img src="@asset('images/temp/erika-skirt.jpeg')" />
                  <img src="@asset('images/temp/erika-skirt1.jpeg')" class="visible-on-hover"/>
                </figure>
              </a>
              <a href="#" class="product-details bg-white d-block text-center">
                <div class="product-name h4">Prouct title</div>
                <div class="product-price"><span>750 kr</span></div>
              </a>
            </div>
            @for ($i = 0; $i < 8; $i++)
              <div class="product is-small">
                <a href="#" class="product-wrapper bg-white d-block">
                  <figure class="product-image">
                    <img src="@asset('images/temp/erika-skirt.jpeg')" />
                    <img src="@asset('images/temp/erika-skirt1.jpeg')" class="visible-on-hover"/>
                  </figure>
                </a>
                <a href="#" class="product-details bg-white d-block text-center">
                  <div class="product-name h4">Prouct title</div>
                  <div class="product-price"><span>750 kr</span></div>
                </a>
              </div>
            @endfor
          </div>
        </div>
    </section>

    <section class="section text-button">
      <div class="container">
        <div class="title h2 text-center text-lg-left">Textmodule</div>
        <div class="preamble text-center text-lg-left">
            In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus
        </div>
        <div class="content clearfix">
          <p class="has-padding">
              In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.
          </p>
          <blockquote>
              In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.
          </blockquote>
          <p><img class="alignleft wp-image-141 size-thumbnail" src="http://localhost:8080/wp-content/uploads/2019/05/lookbooks1911-150x150.jpg" alt="" width="150" height="150"></p>
          <p class="has-padding">
              In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.
          </p>
          <p><img class="alignleft wp-image-141 size-medium" src="http://localhost:8080/wp-content/uploads/2019/05/lookbooks1911-300x213.jpg" alt="" width="300" height="213" srcset="/wp-content/uploads/2019/05/lookbooks1911-300x213.jpg 300w, /wp-content/uploads/2019/05/lookbooks1911-768x544.jpg 768w, /wp-content/uploads/2019/05/lookbooks1911.jpg 940w" sizes="(max-width: 300px) 100vw, 300px"></p>
          <p class="has-padding">
              In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.
          </p>
          <p><img class="aligncenter wp-image-141 size-full" src="http://localhost:8080/wp-content/uploads/2019/05/lookbooks1911.jpg" alt="" width="940" height="666" srcset="/wp-content/uploads/2019/05/lookbooks1911.jpg 940w, /wp-content/uploads/2019/05/lookbooks1911-300x213.jpg 300w, /wp-content/uploads/2019/05/lookbooks1911-768x544.jpg 768w" sizes="(max-width: 940px) 100vw, 940px"></p>
          <p class="has-padding">
              In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.
          </p>
        </div>
        <div class="buttons text-center text-lg-left">
            <button class="btn btn-lg btn-outline-primary" type="button">Gå till shoppen</button>
        </div>
      </div>
    </section>

    <section class="section popular-products">
      <div class="container">
        <div class="popular-products-header">
            <div class="h2">Populära produkter</div>
            <div class="content">
              <p>
                  In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat. non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat
              </p>
            </div>
            <div class="popular-products-nav">
              <button class="btn btn-lg btn-icon btn-icon-lg bg-white js-flickity-prev" type="button">
                <img src="http://localhost:8080/wp-content/themes/stokpress/dist/images/icon/arrow-left.svg" alt="" srcset="">
              </button>
              <button class="btn btn-lg btn-icon btn-icon-lg bg-white js-flickity-next" type="button">
                <img src="http://localhost:8080/wp-content/themes/stokpress/dist/images/icon/arrow-right.svg" alt="" srcset="">
              </button>
            </div>
        </div>
      </div>

      <div class="popular-product-grid-slider js-grid-slider">
        @for ($i = 0; $i < 10; $i++)
          <div class="grid-slider-item">
            <a href="#" class="grid-item">
              <div class="product is-small">
                <div class="product-wrapper bg-white d-block">
                  <figure class="product-image">
                    <img src="@asset('images/temp/erika-skirt.jpeg')" />
                    <img src="@asset('images/temp/erika-skirt1.jpeg')" class="visible-on-hover"/>
                  </figure>
                </div>
                <div class="product-details bg-white d-block text-center">
                  <div class="product-name h4">Prouct title</div>
                  <div class="product-price"><span>750 kr</span></div>
                </div>
              </div>
            </a>
          </div>
        @endfor
      </div>
    </section>

    @include('partials.content-page')
  @endwhile
@endsection
