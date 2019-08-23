@if ($no_items)

    <section class="section text-button has-pt has-mb is-thank-you">
        <div class="container">
            
            @if (!empty($no_selected_item_content->title))
                <h2 class="title h2 text-center">{!! $no_selected_item_content->title !!}</h2>
            @endif

            @if (!empty($no_selected_item_content->text))
            <div class="preamble text-center">{!! $no_selected_item_content->text !!}</div>
            @endif

        </div>
    </section>
    

@else

    @php ($ctr = 0)
    {!! TemplateCheckout::startSelectionForm() !!}
        <section id="js-checkout-content" class="section checkout-container d-md-flex no-mb">
            <div class="checkout-col align-self-stretch has-bg">
                <div class="product-shipping">

                    @if (!empty($page_content->order['title']))
                        @php ($ctr++)
                        <h3 class="h3">{!! $ctr.'. '.$page_content->order['title'] !!}</h3>
                    @endif

                    {{-- Cart items --}}
                    <div id="js-selectedItems--selection">
                        @php(include(locate_template('parts/shop/checkout-selection.php')))
                    </div>

                    {{-- Totals --}}
                    <div id="js-selectedTotals">
                        @php (include( locate_template( 'parts/shop/totals-selection.php' ) ))
                    </div>
                    
                    {{-- Voucher --}}
                    <div class="discount-code">
                        @if (!empty($page_content->order['voucher_collapse_text']))
                        <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="collapse" data-target="#js-voucher-field" aria-expanded="false" aria-controls="js-voucher-field">+ {!! $page_content->order['voucher_collapse_text'] !!}</button>
                        @endif

                        <div class="collapse" id="js-voucher-field">
                            @php (include( locate_template( 'parts/shop/voucher.php' ) ))
                        </div>
                    </div>

                    @if (!empty($page_content->additional_options['title']))
                        @php ($ctr++)
                        <h3 class="h3">{!! $ctr.'. '.$page_content->additional_options['title'] !!}</h3>
                    @endif

                    {{-- Newsletter --}}
                    <div id="js-selectedNewsletter" class="get-newsletter">
                        {!! TemplateCheckout::newsletterField() !!}
                    </div>

                    @if (!empty($page_content->payment['title']))
                        @php ($ctr++)
                        <h3 class="h3">{!! $ctr.'. '.$page_content->payment['title'] !!}</h3>
                    @endif
                    
                    {{-- Payment Method --}}
                    <div id="js-selectedPaymentMethod" class="appointment-radios">
                        @php (include( locate_template( 'parts/shop/payment-options.php' ) ))
                    </div>              
                </div>
            </div>

            <div class="checkout-col align-self-stretch">
                <div class="delivery-payment">
                
                    @if (!empty($page_content->delivery['title']))
                        @php ($ctr++)
                        <h3 class="h3">{!! $ctr.'. '.$page_content->delivery['title'] !!}</h3>
                    @endif

                    <div id="js-paymentFields">
                        @php (include( locate_template( 'parts/shop/payments-selection.php' ) ))
                    </div>
                </div>
            </div>

        </section>
    {!! TemplateCheckout::endSelectionForm() !!}
    
@endif
