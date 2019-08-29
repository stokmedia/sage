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
          <div class="product-header-title text-button text-center {{ !$hero_banner->image && !$hero_banner->image_mobile ? 'mb-1' : '' }}">
            <div class="container">
                <h1 class="title h1 text-center mb-0">{!! get_queried_object()->name !!}</h1>

                @if (!empty($title_breadcrumbs))
                  {!! $title_breadcrumbs !!}
                @endif

                @if (get_queried_object()->description)
                  <div class="preamble text-center mb-3">{!! get_queried_object()->description !!}</div>
                @endif

            </div>
          </div>
        @endif

        <div class="product-header-actionbox row align-items-center">

          <div class="product-breadcrumbs col-lg-8 text-lg-left text-center">
              @if (!empty($sub_category_list))
              @foreach ($sub_category_list as $item)
                @php $parentName = trim((App::getSiteTranslations()->general['all'] ?? '').' '.$item->name) @endphp
                {{-- {{ pr($translation) }} --}}
                <a href="{{ $item->link }}" class="btn btn-sm {{ $item->isActive ? 'btn-primary' : 'btn-outline-primary' }}">
                  {!! !empty($item->isParent) ? $parentName : $item->name !!}
                </a>
              @endforeach
            @endif
          </div>


          <div class="product-filter-toggle col-lg-4 text-center text-lg-right">
            <div class="h4 d-inline-block mb-0">
              <div class="js-filter-toggle">
                  <div class="filter-open js-filter-open text-capitalize">
                      {!! $translation->filter_and_sort_title ?? '' !!}
                      <button class="btn btn-lg btn-icon btn-default" type="button">
                        <img class="lazy" data-src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">
                      </button>
                  </div>
                  <div class="filter-close">
                      @if (!empty($translation->clear_button))
                      <a class="btn-clear silk-hash-clear" href="#" role="button">{!! $translation->clear_button ?? '' !!}</a>
                      @endif

                      @if (!empty($translation->update_button))
                      <button class="btn btn-primary text-uppercase js-filter-close" type="button">{!! $translation->update_button ?? '' !!}</button>
                      @endif

                      <button class="btn btn-lg btn-icon btn-default js-filter-close" type="button">
                        <img class="lazy" data-src="@asset('images/icon/filter-close.svg')" alt="" srcset="">
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
                    <button class="btn btn-primary text-uppercase js-filter-close" type="button">{!! $translation->update_button !!}</button>
                    <button class="btn btn-lg btn-icon btn-icon-lg btn-default js-filter-close" type="button">
                      <img class="lazy" data-src="@asset('images/icon/filter-close.svg')" alt="" srcset="">
                    </button>
                </div>
                <hr />
              </div>
            </div>
            <div class="filter-container">
              <div class="row ">
                @if(sizeof($product_size) > 0)
                <div class="column">
                  <div class="h4 title js-accordion-toggle is-open">{!! $translation->size ?? '' !!}</div>
                  <div class="js-accordion-body">
                    <ul class="size-selector">
                      @foreach ($product_size as $size)
                        @if (empty($size))
                          @continue
                        @endif
                        @php $checked = '' @endphp
                        @if(isset($filter_data['size']) && in_array($size, $filter_data['size']))
                          @php $checked = 'checked="checked"' @endphp
                        @endif

                        <li>
                          <div class="custom-control custom-checkbox">
                          <input name="size" {{ $checked }} type="checkbox"  id="sizeCheck{{ $size }}" class="custom-control-input silk-hash-filter" value="{{ strtolower($size) }}">
                            <label class="custom-control-label" for="sizeCheck{{ $size }}">
                                <span>{!! $size !!}</span>
                            </label>
                          </div>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                @endif

                @if(sizeof($product_color) > 0)
                <div class="column">
                  <div class="h4 title js-accordion-toggle">{{ $translation->color ?? '' }}</div>
                  <div class="js-accordion-body">
                    <ul class="color-selector">
                      @foreach ($product_color as $color)
                      @php $checked = '' @endphp
                      @if(isset($filter_data['color']) && in_array($color['Name'], $filter_data['color']))
                        @php $checked = 'checked="checked"' @endphp
                      @endif

                      <li>
                        <div class="custom-control custom-checkbox">
                          <input name="color" {{ $checked }} type="checkbox" id="colorCheck{{ $color['slug'] }}" value="{{ $color['slug'] }}" class="custom-control-input silk-hash-filter">
                          <label class="custom-control-label" for="colorCheck{{ $color['slug'] }}"
                            style="{{ $color['Image'] ? 'background-image:url('.$color['Image'].')' : 'background-color:'.$color['Hex'] }};"></label>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                @endif

                @if(sizeof($category_list) > 0)
                <div class="column">
                  <div class="h4 title js-accordion-toggle">{{ $translation->category ?? '' }}</div>
                  <div class="js-accordion-body">
                    <ul class="category-selector">
                      @foreach ($category_list as $category)
                      @php $checked = '' @endphp
                      @if(isset($filter_data['category']) && in_array($category->slug, $filter_data['category']))
                        @php $checked = 'checked="checked"' @endphp
                      @endif

                      <li>
                        <div class="custom-control custom-control-lg custom-checkbox">
                          <input name="category" {{ $checked }} id="customCheck{{ $category->term_id }}" value="{{ $category->slug }}" class="custom-control-input silk-hash-filter" type="checkbox">
                          <label class="custom-control-label" for="customCheck{{ $category->term_id }}">
                            <span>{!! $category->name !!}</span>
                          </label>
                        </div>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                @endif
              </div>
            </div>
            <div class="sort-container">
              <div class="row">
                  <div class="column">

                    @if (!empty($translation->sort['sort_title']))
                    <div class="h4 title d-block d-lg-inline-block js-accordion-toggle">{!! $translation->sort['sort_title'] ?? '' !!}</div>
                    @endif

                    <div class="js-accordion-body d-block d-lg-inline-block">
                        <div class="sort-selector text-center text-sm-left">
                            <div class="btn-group btn-group-toggle d-inline-block d-sm-inline-flex" data-toggle="buttons">

                              @if (!empty($translation->sort['title_asc']))
                              <label class="btn btn-outline-primary silk-hash-filter">
                                <input id="orderby_title_asc" value="title_asc" name="orderby" type="radio" class="silk-hash-orderby">
                                {!! $translation->sort['title_asc'] ?? '' !!}
                              </label>
                              @endif

                              @if (!empty($translation->sort['title_desc']))
                              <label class="btn btn-outline-primary silk-hash-filter">
                                <input id="orderby_title_desc" value="title_desc" name="orderby" type="radio" class="silk-hash-orderby">
                                {!! $translation->sort['title_desc'] ?? '' !!}
                              </label>
                              @endif

                              @if (!empty($translation->sort['popular']))
                              <label class="btn btn-outline-primary silk-hash-filter">
                                <input id="orderby_pop_asc" value="pop_asc" name="orderby" type="radio" class="silk-hash-orderby">
                                  {!! $translation->sort['popular']  ?? ''!!}
                              </label>
                              @endif

                              @if (!empty($translation->sort['price_low_to_high']))
                              <label class="btn btn-outline-primary silk-hash-filter">
                                <input id="orderby_price_desc" value="price_desc" name="orderby" type="radio" class="silk-hash-orderby">
                                {!! $translation->sort['price_low_to_high'] ?? '' !!}
                              </label>
                              @endif

                              @if (!empty($translation->sort['price_high_to_low']))
                              <label class="btn btn-outline-primary silk-hash-filter">
                                <input id="orderby_price_asc" value="price_asc" name="orderby" type="radio" class="silk-hash-orderby">
                                {!! $translation->sort['price_high_to_low'] ?? '' !!}
                              </label>
                              @endif

                            </div>
                        </div>
                    </div>
                  </div>
              </div>
            </div>

            @if (!empty($translation->clear_button))
              <div class="button-container d-block d-lg-none">
                <div class="row text-center d-block d-lg-flex">
                  <div class="column">
                    <a href="#" class="btn-clear">{!! $translation->clear_button ?: '' !!}</a>
                  </div>
                </div>
              </div>
            @endif

        </div>
      </div>
    </form>
  </section>

  <section class="section product-listing">
    <div class="container p-0">
      <div class="bg-image m-auto rounded-circle lazy d-none" data-bg="url({{ $background_image->image }})"></div>
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
      <div class="spinner text-center position-relative">
        <div class="spinner-btn">
        <button class="btn btn-lg btn-primary silk-loadmore {{ (!empty($show_load_more_button)) ? null : 'd-none' }}"
          data-currentpage="1"
          data-currentcategory="{{ $current_category->slug }}"
          data-currentterm_id="{{ $current_category->term_id }}"
          type="button">{!! $translation->load_more ?? '' !!}</button>
        </div>
        <div class="spinner-border silk-spinner d-none" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
  </section>

  @include('partials.sections')

@endsection
