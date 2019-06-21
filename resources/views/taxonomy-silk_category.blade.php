@extends('layouts.app')

@section('content')

  {{-- Hero banner --}}
  @if ($hero_banner->image || $hero_banner->image_mobile)
    @include('sections.section-category-banner')
  @endif
  
  <section class="section product-header no-mb">
  <form id="silkFilterForm" action="" data-ajaxurl="{{ $ajax_url_listing }}" method="GET">
      <div class="container">
        {{-- TODO: Hide this if category banner is present --}}
        @if (!$hero_banner->image && !$hero_banner->image_mobile)
        <div class="product-header-title text-button">
          <div class="container">
              <div class="title h1 text-center mb-0">{{ get_queried_object()->name }}</div>
              <div class="preamble text-center mb-3">{{ get_queried_object()->description }}</div>
          </div>
        </div>
        @endif

        <div class="product-header-actionbox row align-items-center">
          <div class="product-breadcrumbs col-lg-6 d-none d-lg-block">
            {!! $breadcrumbs !!}
              {{-- <div class="breadcrumb bg-white d-inline-block mb-0">
                <a class="breadcrumb-item" href="#">Home</a>
                <a class="breadcrumb-item" href="#">Level 2</a>
                <span class="breadcrumb-item active">Level 3</span>
              </div> --}}
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
                      <button class="btn btn-primary text-uppercase" type="submit">Uppdatera</button>
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
                    <button class="btn btn-primary text-uppercase" type="submit">Uppdatera</button>
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
                        @foreach ($product_size as $size)
                          @php $checked = '' @endphp
                          @if(isset($filter_data['size']) && in_array($size, $filter_data['size']))
                            @php $checked = 'checked="checked"' @endphp
                          @endif

                          <li>
                            <div class="custom-control custom-checkbox">
                            <input name="filters[size][]" {{ $checked }} type="checkbox"  id="sizeCheck{{ $size }}" class="custom-control-input" value="{{ $size }}">
                              <label class="custom-control-label" for="sizeCheck{{ $size }}">
                                  <span>{{ $size }}</span>
                              </label>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  <div class="column">
                    <div class="h4 title js-accordion-toggle">Color</div>
                    <div class="js-accordion-body">
                      <ul class="color-selector">
                        @foreach ($product_color as $color)
                        @php $checked = '' @endphp
                        @if(isset($filter_data['color']) && in_array($color['Name'], $filter_data['color']))
                          @php $checked = 'checked="checked"' @endphp
                        @endif

                        <li>
                          <div class="custom-control custom-checkbox">
                            <input name="filters[color][]" {{ $checked }} type="checkbox" id="colorCheck{{ $color['Name'] }}" value="{{ $color['Name'] }}" class="custom-control-input">
                            <label class="custom-control-label" for="colorCheck{{ $color['Name'] }}" 
                              style="{{ $color['Image'] ? 'background-image:url('.$color['Image'].')' : 'background-color:'.$color['Hex'] }};"></label>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  <div class="column">
                    <div class="h4 title js-accordion-toggle">Kategori</div>
                    <div class="js-accordion-body">
                      <ul class="category-selector">
                        @foreach ($category_list as $category)
                        @php $checked = '' @endphp
                        @if(isset($filter_data['category']) && in_array($category->slug, $filter_data['category']))
                          @php $checked = 'checked="checked"' @endphp
                        @endif

                        <li>
                          <div class="custom-control custom-control-lg custom-checkbox">
                            {{-- Add disabled="disabled" to checkbox if needed for proper layout return --}}
                          <input name="filters[category][]" {{ $checked }} id="customCheck{{ $category->term_id }}" {{ $current_category!=$category->slug ? 'disabled' : 'checked'  }} value="{{ $category->slug }}" class="custom-control-input" type="checkbox">
                            <label class="custom-control-label" for="customCheck{{ $category->term_id }}">
                              <span>{{ $category->name }}</span>
                            </label>
                          </div>
                        </li>
                        @endforeach
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
                              <label class="btn btn-outline-primary {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='title_asc') ? 'active' : '' }}">
                                <input id="option1" value="title_asc" {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='title_asc') ? 'checked=checked' : '' }} name="filters[orderby]" type="radio">
                                A-Ö
                              </label>
                              <label class="btn btn-outline-primary {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='title_desc') ? 'active' : '' }}">
                                <input id="option2" value="title_desc" {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='title_desc') ? 'checked=checked' : '' }} name="filters[orderby]" type="radio">
                                Ö-A
                              </label>
                              <label class="btn btn-outline-primary {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='pop_asc') ? 'active' : '' }}">
                                <input id="option3" value="pop_asc" {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='pop_asc') ? 'checked=checked' : '' }} name="filters[orderby]" type="radio">
                                Populäritet
                              </label>
                              <label class="btn btn-outline-primary {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='price_desc') ? 'active' : '' }}">
                                <input id="option4" value="price_desc" {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='price_desc') ? 'checked=checked' : '' }} name="filters[orderby]" type="radio">
                                Price (High to Low)
                              </label>
                              <label class="btn btn-outline-primary {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='price_asc') ? 'active' : '' }}">
                                <input id="option5" value="price_asc" {{ (isset($filter_data['orderby']) && $filter_data['orderby']=='price_asc') ? 'checked=checked' : '' }} name="filters[orderby]" type="radio">
                                Price (Low to High)
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
    </form>
  </section>

  <section class="section product-listing">
    <div class="container p-0">
      <div class="bg-image m-auto rounded-circle" style="background-image:url( {{ $background_image->image }} );"></div>
      <div class="products d-flex flex-wrap justify-content-center silk-product-item-holder">
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
    </div>
    @if($show_load_more_button)
      <div class="spinner text-center position-relative">
        <div class="spinner-btn">
        <button class="btn btn-lg btn-primary silk-loadmore" data-currentpage="1" data-currentcategory="{{ $current_category }}" type="button">Load More...</button>
        </div>
        <div class="spinner-border silk-spinner d-none" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    @endif
  </section>

  @include('sections.section-text-header')

  @include('sections.section-popular-products')
@endsection

{{-- @debug --}}