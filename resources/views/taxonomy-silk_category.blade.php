@extends('layouts.app')

@section('content')

  {{-- Hero banner --}}
  @if ($hero_banner->image || $hero_banner->image_mobile)
    @include('sections.section-category-banner')
  @endif

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
      <div class="bg-image m-auto rounded-circle" style="background-image:url( {{ $background_image->image }} );"></div>
      <div class="products d-flex flex-wrap justify-content-center">
          @php $count = 1 @endphp
          @while (have_posts()) @php(the_post())

            @if($count <= 3)
              @php($imageSize = ' is-big')
            @else
              @php($imageSize = ' is-small')
            @endif

            @include('partials.product-item',
              ['product' => TaxonomySilk_category::get_product(), 'imageSize' => $imageSize ]
            )

            @php($count++)

          @endwhile
      {{-- <div class="spinner text-center">
        <div class="spinner-btn">
            <button class="btn btn-lg btn-primary" type="button">Load More...</button>
        </div>
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div> --}}
    </div>
  </section>

  @include('sections.section-text-header')

  @include('sections.section-popular-products')
@endsection

{{-- @debug --}}