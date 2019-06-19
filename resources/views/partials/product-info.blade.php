{{-- <pre>{{ var_dump( $product->product_meta ) }}</pre> --}}

<div class="selected-product-options text-lg-left text-center pt-lg-0 pt-4 col-xxl-6 col-lg-5 pl-md-4">
    {{-- Title --}}
    <h1 class="h2 name mb-0">{{ $post->post_title }}</h1>

    {{-- Price --}}
    {{-- <div class="price">
        <span><del>799 kr</del></span> <!-- line through text -->
        <span class="text-red">799 kr</span> <!-- red text -->
    </div> --}}

    @include('partials.product-price', ['priceInfo' => $product->display_price, 'priceClass'=>'price', 'isSelectedProduct'=>true] )

    {{-- Extra info --}}
    <div class="info text-uppercase d-lg-block d-none">Kjolar  |  Underkategori  |  Sea Blue</div>

    <!--
      Selectors
      NOTE: Static looping
    -->
    <div class="selectors">
        <ul class="size-selector d-lg-inline-block d-flex  flex-wrap justify-content-center align-items-center w-100">
            @foreach (['XS', 'S', 'M', 'L', 'XL'] as $size)
            <li class="mx-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="sizeCheck[{{ $size }}]" class="custom-control-input" {{ $size == 'L' ? 'disabled="disabled"' : '' }}>
                    <label class="custom-control-label" for="sizeCheck[{{ $size }}]">
                        <span>{{ $size }}</span>
                    </label>
                </div>
            </li>
            @endforeach
        </ul>

        <ul class="color-selector js-plus-item d-lg-inline-block d-flex flex-wrap justify-content-center align-items-center w-100">
            @for ($color = 0; $color < 10; $color++)
            <li class="mx-2 item d-none">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="colorCheck[{{ $color }}]" class="custom-control-input">
                    <label class="custom-control-label" for="colorCheck[{{ $color }}]" style="background-color: #{{ substr(md5(mt_rand()), 0, 6) }}"></label>
                </div>
            </li>
            @endfor
            <li class="mx-2 js-plus-item-btn">
                <div class="custom-control custom-checkbox">
                    <label class="align-items-center border custom-control-label d-flex justify-content-center" for="plusItem">+5</label>
                </div>
            </li>
        </ul>
    </div>

    <button type="button" class="btn btn-lg btn-primary text-uppercase is-loading">
        Lägg i kundkorg
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <!-- Loading spinner, just add '.is-loading' class to '.btn' -->
    </button>

    <ul class="list-group accordion mt-5" id="productAccordion">
        @for ($accordion = 0; $accordion < 4; $accordion++)
            <li class="list-group-item">
                <div class="header d-flex  justify-content-between align-items-center collapsed" data-toggle="collapse" data-target="#collapse{{$accordion}}" aria-expanded="false" aria-controls="collapse{{$accordion}}">
                    <span class="text-uppercase">Collapsible Group Item #{{$accordion}}</span>
                    <button class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary bg-white border-0" type="button">
                        <img src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">
                    </button>
                </div>
                <div id="collapse{{$accordion}}" class="collapse body text-left" aria-labelledby="headingOne" data-parent="#productAccordion">
                    <div class="pb-4">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid quibusdam reprehenderit eligendi quae voluptatibus quos voluptates nulla quis corrupti sint?
                    </div>
                </div>
            </li>
        @endfor
    </ul>
  </div>