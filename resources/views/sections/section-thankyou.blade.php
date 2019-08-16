<section class="section thankyou-details {{ $sectionClass ?? '' }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-6">
                @if (!empty($page_info->product_label))
                <h3 class="h3">{{ $page_info->product_label ?? '' }}</h3>
                @endif

                @php $selection = EscGeneral::getSelection(); @endphp
                @if (isset($selection['items']) && is_array($selection['items']))
                    @foreach($selection['items'] as $item)
                        @php $has_qty = $has_remove = true @endphp
                        @php(include( locate_template( 'parts/shop/selection-item.php' ) ))
                    @endforeach
                @endif
            </div>
            <div class="col-lg-6 col-md-6">
                @if (isset($receipt_info['order']))
                    <div class="summary">
                        @if (!empty($page_info->summary_label))
                        <h3 class="h3">{!! $page_info->summary_label ?? '' !!}</h3>
                        @endif

                        <div class="summary-group">
                            <div class="summary-item">
                                <div class="title">{!! !empty( $translation['sub_total'] ) ? $translation['sub_total'] : null !!}</div>
                                <div class="price">{!! $receipt_info['totals']['itemsTotalPrice'] !!}</div>
                            </div>

                            @if( !empty($receipt_info['totals']['totalDiscountPriceAsNumber']) )
                            <div class="summary-item">
                                <div class="title">{!! !empty( $translation['discount'] ) ? $translation['discount'] : null !!}</div>
                                <div class="price">{!! $receipt_info['totals']['totalDiscountPrice'] !!}</div>
                            </div>
                            @endif

                            @if( !empty($receipt_info['totals']['taxDeductedAsNumber']) )
                            <div class="summary-item">
                                <div class="title">{!! !empty( $translation['vat_included'] ) ? $translation['vat_included'] : null !!}</div>
                                <div class="price">{!! $receipt_info['totals']['taxDeductedAsNumber'] !!}</div>
                            </div>
                            @endif
                            
                            <div class="summary-item">
                                <div class="title">{!! !empty( $translation['shipping'] ) ? $translation['shipping'] : null !!}</div>
                                <div class="price">{!! $receipt_info['totals']['shippingPrice'] !!}</div>
                            </div>

                            <div class="summary-item">
                                <div class="title">{!! !empty( $translation['total'] ) ? $translation['total'] : null !!}</div>
                                <div class="price"><strong>{!! $receipt_info['totals']['grandTotalPrice'] !!}</strong></div>
                            </div>
                        </div>
                    </div>
                @endif

                @if (!empty($page_info->summary_text))
                <div class="summary-small small">{!! $page_info->summary_text ?? '' !!}</div>
                @endif

            </div>
        </div>

        {{-- Klarna Snippet --}}
        @if (!empty($receipt_info['paymentMethodData']['snippet']))
            <div class="row">
                {!! $receipt_info['paymentMethodData']['snippet'] !!}
            </div>
        @endif            

    </div>
</section>