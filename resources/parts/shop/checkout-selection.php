<?php
    // use App\Classes\Product;

    $selection = EscGeneral::getSelection();
    ?>
    <!-- <section class="section checkout-container d-md-flex no-mb">
    <div class="checkout-col align-self-stretch has-bg">
        <div class="product-shipping">
            <h3 class="h3">1. Dina varor</h2> -->

            <!-- Cart items -->
            <?php if(isset($selection['items']) && is_array($selection['items'])) : ?>
                <ul class="checkout-items">
                    <?php foreach ($selection['items'] as $key => $item) : ?>
                        <li class="item">

                            <?php 
                            $has_qty = $has_remove = true;
                            $removeClass = 'js-edit-item';
                            include( locate_template( 'parts/shop/selection-item.php' ) );
                            ?>

                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>

            <!-- Totals -->
            <?php  //include( locate_template( 'parts/shop/totals-selection.php' ) ); ?>
<!-- 
            <div class="discount-code">
                <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="collapse" data-target="#discountCollapse" aria-expanded="false" aria-controls="discountCollapse">+ Lägg till rabattkod</button>
                <div class="collapse" id="discountCollapse">
                    <input type="text" class="form-control form-control-md" placeholder="discount code">
                </div>
            </div>

            <div class="get-newsletter">
                <div class="custom-control custom-control-lg custom-checkbox">
                    <input id="newsletter-checkbox" class="custom-control-input" checked="checked" type="checkbox">
                    <label class="custom-control-label" for="newsletter-checkbox">
                    <span>Få vårt nyhetsbrev - Godkänn villkoren och GDPR kraven…</span>
                    </label>
                </div> 
            </div>

            <h3 class="h3">2. Betslsätt och fraktalternativ i din region</h2>
            <div class="appointment-radios">
                <div class="item">
                    <div class="custom-control custom-control-lg  custom-radio">
                    <input id="customRadio6" class="custom-control-input" name="customRadio" type="radio" checked="">
                    <label class="custom-control-label" for="customRadio6">
                        <span>KLARNA</span>
                    </label>
                    </div>
                </div>
                <div class="item">
                    <div class="custom-control custom-control-lg  custom-radio">
                        <input id="customRadio7" class="custom-control-input" name="customRadio" type="radio" checked="">
                        <label class="custom-control-label" for="customRadio7">
                        <span>DHL</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="checkout-col align-self-stretch">
            <div class="delivery-payment">
                <h3 class="h3">3. Leverans & betalning</h2>
                <iframe class="checkout-iframe" id="klarna-checkout-iframe" name="klarna-checkout-iframe" class="k-loading" scrolling="no" frameborder="0" style="height: 810px; width: 1px; min-width: 100%;" src="https://checkout-eu.playground.klarna.com/190607-11e653b/checkout-template.html#%7B%22ORDER_URL%22%3A%22https%3A%2F%2Fcheckout-eu.playground.klarna.com%2Fyaco%2Forders%2Fbd10413a-f686-568d-a5e6-2990093f8672%22%2C%22AUTH_HEADER%22%3A%22KlarnaCheckout%20r8kwuuuyt4dm6plypiy7%22%2C%22LOCALE%22%3A%22sv_SE%22%2C%22ORDER_STATUS%22%3A%22checkout_incomplete%22%2C%22MERCHANT_TAC_URI%22%3A%22http%3A%2F%2Fstage.c5442.cloudnet.cloud%2Fsv%2Fkontakt%2Fvillkor%2F%22%2C%22MERCHANT_NAME%22%3A%22Playground%20Demo%20Merchant%22%2C%22GUI_OPTIONS%22%3A%5B%5D%2C%22ALLOW_SEPARATE_SHIPPING_ADDRESS%22%3Atrue%2C%22PURCHASE_COUNTRY%22%3A%22swe%22%2C%22PURCHASE_CURRENCY%22%3A%22SEK%22%2C%22TESTDRIVE%22%3Atrue%2C%22CHECKOUT_DOMAIN%22%3A%22https%3A%2F%2Fcheckout-eu.playground.klarna.com%22%2C%22BOOTSTRAP_SRC%22%3A%22https%3A%2F%2Fx.klarnacdn.net%2Fkcoc%2F190607-11e653b%2Fcheckout.bootstrap.js%22%2C%22C2_ENABLED%22%3Atrue%2C%22MERCHANT_URL%22%3A%22http%3A%2F%2Fdev.systerp.stage.stokmedia.eu%22%2C%22TRACKING_OPTIONS%22%3A%7B%22baseUrl%22%3A%22https%3A%2F%2Fevt.playground.klarna.com%22%2C%22client%22%3A%22checkout%22%2C%22clientVersion%22%3A%22190607-11e653b%22%2C%22sessionId%22%3A%22bd10413a-f686-568d-a5e6-2990093f8672%22%2C%22instanceId%22%3A6893%7D%2C%22SDID%22%3A%220a320e51-dd9c-4768-b4f4-05635e0734a4%22%7D"></iframe>
            </div>
        </div>
    </section> -->

<?php /*

foreach( $selection['items'] as $key => $item ) :
    $itemsleft 		= true;
    $productData 	= new Product( $item['post_id'] );
    $productImage 	= $productData->getProductImages( 'mini');
    $variantName	= $productData->product_meta['variantName'];
    $productItems 	= $productData->product_meta['items'];
    $market         = EscGeneral::getCurrentMarket();

    if( is_array($productData) ) {
        foreach($productItems as $size => $productItem) {
            if( $productItem['sku'] == $item['sku'] ) {
                $itemsleft = ( $item['quantity'] == $productItem['stockByMarket'][$market] ) ? false : true;
            }
        }
    }

    //On Sale
    if( $item['anyDiscount'] ) {
        $price = '<strong class="price is-sale">' . $item['priceEach'] . '</strong><span class="old-price">' . $item['priceEachBeforeDiscount'] . '</span>';
    } else {
        $price = $item['priceEach'];
    }
    ?>

    <li class="item">
        <div class="columns is-mobile is-marginless">
            <div class="column is-narrow">
                <a href="<?php echo get_permalink( $item['post_id'] );?>" alt="<?php echo $item['productName']; ?>" >
                <figure class="image">
                    <?php echo $productImage ? $productImage[0] : null; ?>
                </figure>
                </a>
            </div>
            <div class="column">
                <a href="<?php echo get_permalink( $item['post_id'] );?>" class="small-title">
                    <em><?php echo $item['productName']; ?></em>
                    <small><?php echo $variantName; ?></small>
                </a>
                <dl class="cart-product-attr">
                    <dt class="size"><?php echo $translation['size']; ?> -</dt>
                    <dd class="size"><?php echo $item['size']; ?></dd>
                    <dt class="visually-hidden"><?php echo $translation['price']?>:</dt>
                    <dd class="price"><?php echo $price; ?></dd>
                    <dt class="amount"><?php echo $translation['quantity']?>:</dt>
                    <dd class="amount">
                        <?php echo $item['quantity']; ?>
                        <div class="amount-inc-dec-wrap">
                            <a data-href="<?php echo EscGeneral::getQueryRemoveProduct( $item ); ?>" class="minus edit-product amount-minus">-</a>

                            <?php if($itemsleft) : ?>
                                <a data-href="<?php echo EscGeneral::getQueryAddProduct( $item ); ?>" class="add edit-product amount-add">+</a>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>

                        </div>
                    </dd>

                </dl>
            </div>
        </div>
        
        <a data-href="<?php echo EscGeneral::getQueryRemoveProduct( $item, 'remove' ); ?>" class="cart-remove-item edit-product">
            <svg class="icon icon--stroke" viewBox="0 0 11 11" preserveAspectRatio="xMidYMid meet">
                <use xlink:href="#icon--cross"></use>
            </svg>
            <span class="visually-hidden"><?php echo $translation['remove_item']; ?></span>
        </a> 
    </li>

<?php endforeach; */ ?>
