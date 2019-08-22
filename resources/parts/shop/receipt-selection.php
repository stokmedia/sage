<?php

    use App\Controllers\TaxonomySilk_category;  

    $postID = $item->product_post->ID;
    $product = TaxonomySilk_category::get_product( $postID );
    $translations = App::getSiteTranslations()->selections;
    $productImage = !empty($product->images['mini']['0']) ? $product->images['mini']['0']['url'] : '';
    $categories = wp_list_pluck(wp_get_post_terms( $postID, 'silk_category'), 'name' );
    $category = end( $categories );

    if( !empty($item->product_data['anyDiscount']) ) {
        $priceClass = 'is-sale';
        $price = '<span class="old-price">'. $item->product_data['priceEachBeforeDiscount'] .'</span> <span class="new-price">'. $item->product_data['priceEach'] .'</span>';

    } else {
        $priceClass = '';
        $price = $item->product_data['priceEach'];

    }

    // Translations
    $catLabel = !empty($translations['category']) ? $translations['category'].' - ' : '';
    $colorLabel = !empty($translations['color']) ? $translations['color'].' - ' : '';
    $sizeLabel = !empty($translations['size']) ? $translations['size'].' - ' : '';
    $qtyLabel = !empty($translations['quantity']) ? $translations['quantity'].' - ' : '';
    $priceLabel = !empty($translations['price']) ? $translations['price'].' - ' : '';
    ?>

    <div class="product-details-inline <?php echo !empty($classname) ? $classname : '' ?>">
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
            <a class="name"><?php echo $item->product_post->post_title ?></a>
            <div class="category"><?php echo $catLabel.$category ?></div>
            <div class="color"><?php echo $colorLabel.$product->product_meta->variantName ?></div>
            <div class="size"><?php echo $sizeLabel.$item->product_data['size']; ?></div>

            <?php if (!empty($has_qty)) : ?>
            <div class="qty"><?php echo $qtyLabel.$item->product_data['quantity']; ?></div>
            <?php endif ?>

            <div class="price <?php echo $priceClass ?>"><?php echo $priceLabel.$price?></div>
        </div>
    </div>