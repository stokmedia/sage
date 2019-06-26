<section class="section selected-product no-mb">
    <div class="container">
        <div class="row">

            {{-- Images --}}
            <div class="selected-product-preview col-xxl-6 col-lg-7 p-0 invisible {{ $product->is_sold_out ? 'is-oos' : '' }}">
                <div class="row justify-content-xxl-start justify-content-center mx-0">
                    <div class="selected-product-slider-col p-md-0 m-0">
                        <div class="selected-product-slider overflow-hidden p-md-0 shadow-sm">
                            @if (!empty($product->images))
                                @foreach ($product->images['standard'] as $item)
                                    <figure class="item align-items-center mb-0">
                                        <img src="{{ $item['url'] }}" alt="" srcset="">
                                    </figure>
                                @endforeach
                            @endif
                        </div>
                        <div class="selected-product-blur d-lg-block d-none rounded-circle" style="background: url({{ $product_background_image ?? '' }}) no-repeat center/cover transparent"></div>
                    </div>

                    <div class="selected-product-thumbnail d-none d-lg-flex flex-column">
                        @if (!empty($product->images))
                            @foreach ($product->images['thumb'] as $item)
                                <div class="item bg-white">
                                    <figure>
                                        <img src="{{ $item['url'] }}" alt="" srcset="">
                                    </figure>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                {{-- Breadcrumbs --}}
                <div class="container-fluid">
                    {!! $breadcrumbs !!}
                </div>
            </div>

            {{-- Product info --}}
            @include( 'partials.product-info' )
        </div>
    </div>
</section>

{{-- Sections --}}
@include( 'partials.sections' )