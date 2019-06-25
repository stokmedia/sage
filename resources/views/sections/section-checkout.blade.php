@if ($no_items)

    <section class="section text-button has-pt has-mb is-thank-you">
        <div class="container">
            
            @if (!empty($no_selected_item_content->title))
                <h2 class="title h2 text-center">{{ $no_selected_item_content->title }}</h2>
            @endif

            @if (!empty($no_selected_item_content->preamble))
            <div class="preamble text-center">{!! $no_selected_item_content->preamble !!}</div>
            @endif

        </div>
    </section>
    

@else

    {!! TemplateCheckout::startSelectionForm() !!}
        <section id="js-checkout-content" class="section checkout-container d-md-flex no-mb">
            <div class="checkout-col align-self-stretch has-bg">
                <div class="product-shipping">
                    <h3 class="h3">1. Dina varor</h2>

                    {{-- Cart items --}}
                    <div id="js-selectedItems--selection">
                        @php(include(locate_template('parts/shop/checkout-selection.php')))
                    </div>

                    {{-- Totals --}}
                    <div id="js-selectedTotals">
                        @php (include( locate_template( 'parts/shop/totals-selection.php' ) ))
                    </div>
                    
                    <div class="discount-code">
                        <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="collapse" data-target="#js-voucher-field" aria-expanded="false" aria-controls="js-voucher-field">+ Lägg till rabattkod</button>
                        <div class="collapse" id="js-voucher-field">
                            @php (include( locate_template( 'parts/shop/voucher.php' ) ))
                        </div>
                    </div>


                    <div id="js-selectedNewsletter" class="get-newsletter">
                        {!! TemplateCheckout::newsletterField() !!}
                    </div>

                    <h3 class="h3">2. Betslsätt och fraktalternativ i din region</h2>
                    <div id="js-selectedPaymentMethod" class="appointment-radios">
                        @php (include( locate_template( 'parts/shop/payment-options.php' ) ))
                    </div>              
                </div>
            </div>

            <div class="checkout-col align-self-stretch">
                <div class="delivery-payment">
                <h3 class="h3">3. Leverans & betalning</h2>
                    <div id="js-paymentFields">
                        @php (include( locate_template( 'parts/shop/payments-selection.php' ) ))
                    </div>
                </div>
            </div>

        </section>
    {!! TemplateCheckout::endSelectionForm() !!}
@endif
