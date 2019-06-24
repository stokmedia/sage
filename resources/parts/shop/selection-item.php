<?php

    use App\Controllers\TaxonomySilk_category;

    $postID = $item['post_id'];
    $product = TaxonomySilk_category::get_product( $postID );
    $translations = App::getSiteTranslations()->selections;
    $productImage = !empty($product->images['mini']['0']) ? $product->images['mini']['0']['url'] : '';
    $categories = wp_list_pluck(wp_get_post_terms( $postID, 'silk_category'), 'name' );
    $category = end( $categories );

    if( !empty($product->display_price->is_sale) ) {
        $priceClass = 'is-sale';
        $price = '<span class="old-price">'. $product->display_price->price_before .'</span> <span class="new-price">'. $product->display_price->price .'</span>';

    } else {
        $priceClass = '';
        $price = $product->display_price->price;

    }

    // Translations
    $catLabel = !empty($translations['category']) ? $translations['category'].' - ' : '';
    $colorLabel = !empty($translations['color']) ? $translations['color'].' - ' : '';
    $sizeLabel = !empty($translations['size']) ? $translations['size'].' - ' : '';
    $qtyLabel = !empty($translations['quantity']) ? $translations['quantity'].' - ' : '';
    $priceLabel = !empty($translations['price']) ? $translations['price'].' - ' : '';
    ?>

    <div class="product-details-inline {{$classname}}">
        <a href="<?php echo get_permalink( $postID ) ?>" class="image-wrap">
            <div class="image">
                <figure>
                    <?php if ($productImage) :?>
                    <img src="<?php echo $productImage ?>" alt="">
                    <?php endif ?>
                </figure>
            </div>
        </a>

        <div class="info">
            <a href="<?php echo get_permalink( $postID ) ?>" class="name"><?php echo $item['productName'] ?></a>
            <div class="category"><?php echo $catLabel.$category ?></div>
            <div class="color"><?php echo $colorLabel.$product->product_meta->variantName ?></div>
            <div class="size"><?php echo $sizeLabel.$item['size']; ?></div>
            <div class="qty"><?php echo $qtyLabel.$item['quantity']; ?></div>
            <div class="price <?php echo $priceClass ?>"><?php echo $priceLabel.$price?></div>
        </div>

        <div class="close-pos">
            <a href="<?php echo EscGeneral::getQueryRemoveProduct( $item ); ?>" class="close-btn js-cart-remove-item"></a>
        </div>
    </div>
