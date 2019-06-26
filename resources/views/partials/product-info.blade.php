
<div class="selected-product-options text-lg-left text-center pt-lg-0 pt-4 col-xxl-6 col-lg-5 pl-md-4">
    {{-- Title --}}
    <h1 class="h2 name mb-0">{{ $post->post_title }}</h1>

    {{-- Price --}}
    @include( 'partials.product-price', [
        'priceInfo' => $product->display_price,
        'priceClass' => 'price',
        'isSelectedProduct'=> true
    ])

    {{-- Extra info --}}
    @if ($product_categories)
        <div class="info text-uppercase d-lg-block d-none">{{ $product_categories }}</div>
    @endif

    {{-- Form Start --}}
    @php ($product_class->renderStartPurchaseForm())

        <div class="selectors">
            {{-- Selector: Sizes --}}
            <ul class="size-selector d-lg-inline-block d-flex  flex-wrap justify-content-center align-items-center w-100">
                @php ( $product_class->renderSizesLoop( '
                    <li class="mx-2">
                        <div class="custom-control custom-checkbox">
                            <input type="radio" id="size-check-{value}" class="custom-control-input" name="{selector}" value="{value}" {disabled} {selected}>
                            <label class="custom-control-label" for="size-check-{value}">
                                <span>{name}</span>
                            </label>
                        </div>
                    </li>'
                    )
                )
            </ul>

            {{-- Selector: Color --}}
            @if (!empty($product->colors))
                <ul class="color-selector js-plus-item d-lg-inline-block d-flex flex-wrap justify-content-center align-items-center w-100">
                    @php ($has_swatch = false)
                    @foreach ($product->colors as $color)
                        @if(!empty($color->swatch->background))
                            @php ($has_swatch = true)
                            <li class="mx-2 item d-none {{ $color->product === $product->product_meta->product ? 'is-active' : '' }}">
                                <a href="{{ $color->product_uri }}" class="custom-control custom-checkbox" title="{{ $color->swatch->desc ?? '' }}">
                                    <input id="color-check[{{ $loop->iteration }}]" class="custom-control-input">
                                    <label class="custom-control-label" for="color-check[{{ $loop->iteration }}]" style="{{ $color->swatch->background ?? '' }}"></label>
                                </a>
                            </li>
                        @endif
                    @endforeach

                    @if ($has_swatch && count($product->colors) > 5)
                        <li class="mx-2 js-plus-item-btn">
                            <div class="custom-control custom-checkbox">
                                <label class="align-items-center border custom-control-label d-flex justify-content-center" for="plusItem">+5</label>
                            </div>
                        </li>
                    @endif
                </ul>
            @endif
        </div>

        @if (!empty($addtocart_button->text))
            <button type="submit" class="btn btn-lg btn-primary text-uppercase" {!! $addtocart_button->attr ?? null !!}>
                <span class="js-button-text">{{ $addtocart_button->text ?? null }}</span>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <!-- Loading spinner, just add '.is-loading' class to '.btn' -->
            </button>
        @endif

    {{-- Form end --}}
    @php ($product_class->renderEndForm())

    {{-- Product Information --}}
    @if ($product_information)
        <ul class="list-group accordion mt-5" id="productAccordion">
            @foreach ($product_information as $info)
                <li class="list-group-item">
                    <div class="header d-flex  justify-content-between align-items-center collapsed" data-toggle="collapse" data-target="#collapse-{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse-{{ $loop->iteration }}">
                        <span class="text-uppercase">{{ $info->label ?? '' }}</span>
                        <button class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary bg-white border-0" type="button">
                            <img src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">
                        </button>
                    </div>
                    <div id="collapse-{{ $loop->iteration }}" class="collapse body text-left" aria-labelledby="headingOne" data-parent="#productAccordion">
                        {!! $info->image ?? null !!}
                        <div class="pb-4">{!! $info->content ?? '' !!}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
