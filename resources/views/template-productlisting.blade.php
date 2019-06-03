{{--
  Template Name: Product Listing Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')

    <section class="section category-banner no-mb" style="background-image:url( <?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/category-banner.jpg );">
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
                  <div class="default">
                      Filtrera & Sortera
                      <button class="btn btn-lg btn-icon btn-icon-lg btn-default" type="button">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon/arrow-down.svg" alt="" srcset="">
                      </button>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="product-filter js-filter">
        <div class="container">
            <div class="filter-container">
              <div class="row ">
                  <div class="column">
                    <div class="h4 title d-block d-lg-inline-block">Size</div>
                    <ul class="size-selector">
                      <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="customCheck1" class="custom-control-input">
                            <label class="custom-control-label" for="customCheck1">
                                <span>XS</span>
                            </label>
                          </div>
                      </li>
                      <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="customCheck2" class="custom-control-input" checked="checked">
                            <label class="custom-control-label" for="customCheck2">
                                <span>S</span>
                            </label>
                          </div>
                      </li>
                      <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="customCheck3" class="custom-control-input">
                            <label class="custom-control-label" for="customCheck3">
                              <span>M</span>
                            </label>
                          </div>
                      </li>
                      <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="customCheck4" class="custom-control-input" disabled="disabled">
                            <label class="custom-control-label" for="customCheck4">
                              <span>L</span>
                            </label>
                          </div>
                      </li>
                      <li>
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" id="customCheck5" class="custom-control-input">
                            <label class="custom-control-label" for="customCheck5">
                              <span>XL</span>
                            </label>
                          </div>
                      </li>
                    </ul>
                  </div>
                  <div class="column">
                    <div class="h4 title d-block d-lg-inline-block">Color</div>
                    <ul class="color-selector">

                    </ul>
                  </div>
                  <div class="column">
                    <div class="h4 title d-block d-lg-inline-block">Kategori</div>
                    <div class="category-selector">

                    </div>
                  </div>
              </div>
            </div>
            <div class="sort-container">
              <div class="row">
                  <div class="column">
                    <div class="h4 title d-block d-lg-inline-block">Sort list by</div>
                    <div class="sort-selector d-block d-lg-inline-block">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
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
      </div>
    </section>

    <section class="section product-listing">
        <div class="container p-0">
          <div class="bg-image m-auto rounded-circle" style="background-image:url( <?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/bg-product-listing.jpg );"></div>
          <div class="products d-flex flex-wrap justify-content-center">
            <div class="product is-big is-sale">
              <a href="#" class="product-wrapper bg-white d-block">
                <div class="product-status text-center"><span>REA</span></div>
                <figure class="product-image">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
                </figure>
              </a>
              <a href="#" class="product-details bg-white d-block text-center">
                <div class="product-name h4">Prouct title</div>
                <div class="product-price"><span>750 kr</span>450 kr</div>
              </a>
            </div>
            <div class="product is-big">
              <a href="#" class="product-wrapper bg-white d-block">
                <figure class="product-image">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
                </figure>
              </a>
              <a href="#" class="product-details bg-white d-block text-center">
                <div class="product-name h4">Prouct title</div>
                <div class="product-price"><span>750 kr</span></div>
              </a>
            </div>
            <div class="product is-big">
              <a href="#" class="product-wrapper bg-white d-block">
                <figure class="product-image">
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
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
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt.jpeg" />
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/temp/erika-skirt1.jpeg" class="visible-on-hover"/>
                </figure>
              </a>
              <a href="#" class="product-details bg-white d-block text-center">
                <div class="product-name h4">Prouct title</div>
                <div class="product-price"><span>750 kr</span></div>
              </a>
            </div>
          </div>
        </div>
    </section>

    @include('partials.content-page')
  @endwhile
@endsection
