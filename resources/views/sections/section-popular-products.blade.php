
@if ($section->has_content)
    <section class="section popular-products  {{ $section->classes ?? '' }} @if ($section->link) has-button @endif">
        <div class="container">
            <div class="section-header @if ($section->product_count <= 5)is-no-nav @endif">
                @if ($section->title)
                    <div class="title h2 text-center text-lg-left">{{ $section->title }}</div>
                @endif

                @if ($section->preamble)
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

        @if ($section->products)
            <div class="popular-products-grid-slider js-grid-slider">
                @foreach ($section->products as $product)
                    @include('partials.product-item',
                        [
                            'post' => $product,
                            'product' => TaxonomySilk_category::get_product($product->ID),
                            'isSlider' => true
                        ]
                    )
                    {{-- <div class="grid-slider-item">
                        <a href="#" class="grid-item">
                        <div class="product is-small p-0">
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
                    </div> --}}
                @endforeach
            </div>
        @endif

        @if ($section->link)
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
