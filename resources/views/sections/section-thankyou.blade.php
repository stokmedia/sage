<section class="section thankyou-details">
  <div class="container">
    <div class="row">
      <div class="col-lg-5 offset-lg-1 col-md-6">
        <h3 class="h3">Produkter</h3>
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
            <h3 class="h3">Summering</h3>
            <div class="summary-group">
              <div class="summary-item">
                <div class="title">@php(!empty( $translation['sub_total'] ) ? $translation['sub_total'] : null)</div>
                <div class="price">@php($receipt_info['totals']['itemsTotalPrice'])</div>
              </div>

              @if( $receipt_info['totals']['totalDiscountPriceAsNumber'] )
              <div class="summary-item">
                <div class="title">@php(!empty( $translation['discount'] ) ? $translation['discount'] : null)</div>
                <div class="price">@php($receipt_info['totals']['totalDiscountPrice'])</div>
              </div>
              @endif

              @if( $receipt_info['totals']['taxDeductedAsNumber'] )
              <div class="summary-item">
                <div class="title">@php(!empty( $translation['vat_included'] ) ? $translation['vat_included'] : null)</div>
                <div class="price">@php($receipt_info['totals']['taxDeductedAsNumber'])</div>
              </div>
              @endif
              
              <div class="summary-item">
                <div class="title">@php(!empty( $translation['shipping'] ) ? $translation['shipping'] : null)</div>
                <div class="price">@php($receipt_info['totals']['shippingPrice'])</div>
              </div>

              <div class="summary-item">
                <div class="title">@php(!empty( $translation['total'] ) ? $translation['total'] : null)</div>
                <div class="price"><strong>@php($receipt_info['totals']['grandTotalPrice'])</strong></div>
              </div>
            </div>
          </div>
        @endif
        <div class="summary-small small">In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volu tpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula</div>
      </div>
    </div>
  </div>
</section>