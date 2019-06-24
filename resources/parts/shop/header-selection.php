
<?php 
$selection = \EscGeneral::getSelection();
$request = !empty($_REQUEST) ? $_REQUEST : [];
$recentlyAdded = [];
?>

    <div class="cart-wrapper d-none d-lg-block">
        <div class="cart-title h3 text-center">Varan är tillagd!</div>
        
        <?php if ($selection['total_items'] > 0) : ?> 
            <div class="cart-list">
                <ul class="cart-items p-0">
                    <?php
                    foreach ($selection['items'] as $item) :
                        if ( !empty($_REQUEST) && $item['item'] == $_REQUEST['esc_product_item'] && $item['post_id'] == $_REQUEST['esc_post'] ) {
                            $recentlyAdded = $item;
                        }
                        ?>
                        <li class="item">
                            <?php 
                            $is_link = true;
                            $has_close = true;
                            include( locate_template( 'parts/shop/selection-item.php' ) )?>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="cart-summary">
                <div class="summary">
                    <div class="summary-group">
                        <div class="summary-item d-flex">
                            <div class="title w-50">Totalt</div>
                            <div class="price w-50 text-right">799 kr</div>
                        </div>
                        <div class="summary-item d-flex">
                            <div class="title w-50">Moms</div>
                            <div class="price w-50 text-right">46 kr</div>
                        </div>
                        <div class="summary-item d-flex">
                            <div class="title w-50">Frakt</div>
                            <div class="price w-50 text-right">0 kr</div>
                        </div>
                        <div class="summary-item d-flex">
                            <div class="title w-50">Sub Totalt</div>
                            <div class="price w-50 text-right"><strong>799 kr</strong></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <div class="cart-buttons">
            <button class="btn btn-lg btn-primary" type="button">Till kassan</button>
            <button class="btn btn-lg btn-outline-primary" type="button">Shoppa mer</button>
        </div>
    </div>

    <!-- Mobile Cart -->
    <div class="cart-wrapper is-mobile d-block d-lg-none">
        <div class="cart-title h3 text-center">Varan är tillagd!</div>

        <?php if (!empty($recentlyAdded)) :?>
            <div class="cart-list">
                <ul class="cart-items p-0">
                    <li class="item">
                        <?php include( locate_template( 'parts/shop/selection-item.php' ) )?> ?>
                    </li>
                </ul>
            </div>
        <?php endif?>

        <div class="cart-buttons">
            <button class="btn btn-lg btn-primary" type="button">Till kassan</button>
            <button class="btn btn-lg btn-outline-primary" type="button">Shoppa mer</button>
        </div>
    </div>    
