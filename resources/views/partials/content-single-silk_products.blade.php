<section class="section selected-product no-mb">
    <div class="container">
        <div class="row">

            {{-- Images --}}
            <div class="selected-product-preview col-xxl-6 col-lg-7 p-0 invisible {{ $product->is_sold_out ? 'is-oos' : '' }}">
                <div class="row justify-content-xxl-start justify-content-center mx-0">
                    <div class="selected-product-slider-col p-md-0 m-0">
                        <div class="selected-product-slider overflow-hidden p-md-0">
                            @if (!empty($product->images))
                                @foreach ($product->images['standard'] as $item)
                                    @php($srcset = $item['url'].' 720w, ')
                                    @php($srcset .= $item['url'].' 1440w, ')
                                    @if ($product->images['full'][0]['url'])
                                        @php($srcset .= $product->images['full'][0]['url'].' 2880w')
                                    @endif
                                    <figure class="item align-items-center mb-0">
                                        <img data-src="{{ $item['url'] }}" alt="" class="lazy" data-srcset="{{ $srcset }}">
                                    </figure>
                                @endforeach
                            @endif
                        </div>
                        <div class="selected-product-blur-wrapper">
                          <div class="selected-product-blur d-lg-block d-none rounded-circle" style="background: url({{ $product_background_image ?? '' }}) no-repeat center/cover transparent"></div>
                        </div>
                        <div class="ie-blur"></div>
                    </div>

                    <div class="selected-product-thumbnail d-none d-lg-flex flex-column">
                        @if (!empty($product->images))
                            @foreach ($product->images['mini'] as $item)
                                <div class="item bg-white">
                                    <figure>
                                        <img src="{{ $item['url'] }}" alt="">
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
