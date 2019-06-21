
@if (!empty($section->has_content))
    <section class="section popular-products  {{ $section->classes ?? '' }} @if ($section->link) has-button @endif">
        <div class="container">
            <div class="section-header @if ($section->product_count <= 5)is-no-nav @endif">
                @if (!empty($section->title))
                    <div class="title h2 text-center text-lg-left">{{ $section->title }}</div>
                @endif

                @if (!empty($section->preamble))
                    <div class="content text-center text-lg-left">
                        <p>{!! $section->preamble !!}</p>
                    </div>
                @endif

                @if ($section->product_count > 5)
                    <div class="section-nav d-none d-lg-block">
                        <button class="btn btn-lg btn-icon btn-icon-lg bg-white js-flickity-prev" type="button">
                            <img src="@asset('images/icon/arrow-left.svg')" alt="" srcset="">
                        </button>
                        <button class="btn btn-lg btn-icon btn-icon-lg bg-white js-flickity-next" type="button">
                            <img src="@asset('images/icon/arrow-right.svg')" alt="" srcset="">
                        </button>
                    </div>
                @endif
            </div>
        </div>

        @if (!empty($section->products))
            <div class="popular-products-grid-slider js-grid-slider">
                @foreach ($section->products as $product)
                    @include('partials.product-item', [
                        'post' => $product,
                        'product' => TaxonomySilk_category::get_product($product->ID),
                        'isSlider' => true
                    ])
                @endforeach
            </div>
        @endif

        @if (!empty($section->link))
            <div class="container">
                <div class="section-footer text-center">
                    <a href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                        <button class="btn btn-lg btn-primary" type="button">{{ $section->link->title }}</button>
                    </a>
                </div>
            </div>
        @endif

    </section>
@endif
