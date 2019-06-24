<?php

    use App\Controllers\App;
    use App\Classes\Helper;

    $translations = App::getSiteTranslations()->selections;
    $selection = \EscGeneral::getSelection();
    $request = !empty($_REQUEST) ? $_REQUEST : [];
    $recentlyAdded = [];

    // Translations
    $totalLabel = !empty($translations['total_price']) ? $translations['total_price'] : '';
    $vatLabel = !empty($translations['vat']) ? $translations['vat'] : '';
    $shippingLabel = !empty($translations['shipping']) ? $translations['shipping'] : '';
    $subTotalLabel = !empty($translations['sub_total']) ? $translations['sub_total'] : '';
    $itemAdded = !empty($translations['item_added']) ? $translations['item_added'] : '';
    $noItem = !empty($translations['no_item_added']) ? $translations['no_item_added'] : '';
    $goToCheckout = !empty($translations['go_to_checkout']) ? $translations['go_to_checkout'] : '';
    $shopLink = !empty($translations['shop_link']) ? $translations['shop_link'] : [];

    // Cart title
    $cartTitle = $selection['total_items'] > 0 ? $itemAdded : $noItem;

    // Checkout page
    $checkoutPage = Helper::get_silk_architecture_page( 'selection' );
    ?>

    <div class="cart-wrapper d-none d-lg-block">
        <div class="cart-title h3 text-center"><?php echo $cartTitle; ?></div>
        
        <?php if ($selection['total_items'] > 0) : ?> 
            <div class="cart-list">
                <ul class="cart-items p-0">
                    
                    <?php foreach ($selection['items'] as $item) :
                        // Get recently added item in the cart
                        if ( !empty($_REQUEST) && $item['item'] == $_REQUEST['esc_product_item'] && $item['post_id'] == $_REQUEST['esc_post'] ) {
                            $recentlyAdded = $item;
                        }

                        $is_link = true;
                        $has_close = true;
                        ?>
                        <li class="item">
                            <?php include( locate_template( 'parts/shop/selection-item.php' ) ) ?>
                        </li>
                    <?php endforeach ?>

                </ul>
            </div>
            <div class="cart-summary">
                <div class="summary">
                    <div class="summary-group">
                        <div class="summary-item d-flex">
                            <div class="title w-50"><?php echo $totalLabel ?></div>
                            <div class="price w-50 text-right"><?php echo $selection['totals']['itemsTotalPrice']; ?></div>
                        </div>

                        <?php if ($selection['totals']['taxDeductedAsNumber']) : ?>
                            <div class="summary-item d-flex">
                                <div class="title w-50"><?php echo $vatLabel ?></div>
                                <div class="price w-50 text-right"><?php echo $selection['totals']['taxDeducted']; ?></div>
                            </div>
                        <?php endif ;?>

                        <div class="summary-item d-flex">
                            <div class="title w-50"><?php echo $shippingLabel ?></div>
                            <div class="price w-50 text-right"><?php echo $selection['totals']['shippingPrice']; ?></div>
                        </div>

                        <div class="summary-item d-flex">
                            <div class="title w-50"><?php echo $subTotalLabel ?></div>
                            <div class="price w-50 text-right"><strong><?php echo $selection['totals']['grandTotalPrice']; ?></strong></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-buttons">
                <?php if ( $goToCheckout && $checkoutPage ) :?>
                    <a href="<?php echo get_permalink($checkoutPage) ?>">
                        <button class="btn btn-lg btn-primary" type="button">
                            <?php echo $goToCheckout ?>
                        </button>
                    </a>
                <?php endif ?>

                <?php if ($shopLink) :?>
                    <a href="<?php echo $shopLink['url'] ? $shopLink['url'] : '' ?>" target="<?php echo $shopLink['target'] ? $shopLink['target'] : '' ?>">
                        <button class="btn btn-lg btn-outline-primary" type="button"><?php echo $shopLink['title'] ? $shopLink['title'] : '' ?></button>
                    </a>
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>

    <!-- Mobile Cart -->
    <div class="cart-wrapper is-mobile d-block d-lg-none">
        <div class="cart-title h3 text-center"><?php echo $cartTitle; ?></div>

        <?php if (!empty($recentlyAdded)) : ?>
            <div class="cart-list">
                <ul class="cart-items p-0">
                    <li class="item">
                        <?php include( locate_template( 'parts/shop/selection-item.php' ) )?>
                    </li>
                </ul>
            </div>
        <?php endif ?>

        <div class="cart-buttons">
            <?php if ( $goToCheckout && $checkoutPage ) :?>
                <a href="<?php echo get_permalink($checkoutPage) ?>">
                    <button class="btn btn-lg btn-primary" type="button">
                        <?php echo $goToCheckout ?>
                    </button>
                </a>
            <?php endif ?>
            
            <?php if ($shopLink) :?>
                <a href="<?php echo $shopLink['url'] ? $shopLink['url'] : '' ?>" target="<?php echo $shopLink['target'] ? $shopLink['target'] : '' ?>">
                    <button class="btn btn-lg btn-outline-primary" type="button"><?php echo $shopLink['title'] ? $shopLink['title'] : '' ?></button>
                </a>
            <?php endif ?>
        </div>
    </div>    
