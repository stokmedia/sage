<?php

use App\Controllers\TaxonomySilk_category;

$product = TaxonomySilk_category::get_product($item['post_id']);
$productImage = !empty($product->images['mini']['0']) ? $product->images['mini']['0']['url'] : '';

if( !empty($product->display_price->is_sale) ) {
    $priceClass = 'is-sale';
    $price = '<span class="old-price">'. $product->display_price->price_before .'</span> <span class="new-price">'. $product->display_price->price .'</span>';
} else {
    $priceClass = '';
    $price = $product->display_price->price;
}
?>

<div class="product-details-inline {{$classname}}">
    <a href="<?php echo get_permalink( $item['post_id'] ) ?>" class="image-wrap">
        <div class="image">
            <figure>
                <?php if ($productImage) :?>
                <img src="<?php echo $productImage ?>" alt="">
                <?php endif ?>
            </figure>
        </div>
    </a>

    <div class="info">
        <a href="<?php echo get_permalink( $item['post_id'] ) ?>" class="name"><?php echo $item['productName'] ?></a>
        <div class="category">Kategori - Kjolar</div>
        <div class="color">Färg - <?php echo $product->product_meta->variantName ?></div>
        <div class="size">Storlek - <?php echo $item['size']; ?></div>
        <div class="qty">Quantity - <?php echo $item['quantity']; ?></div>
        <div class="price <?php echo $priceClass ?>">Pris - <?php echo $price?></div>
    </div>

    <div class="close-pos">
        <a href="<?php echo EscGeneral::getQueryRemoveProduct( $item ); ?>" class="close-btn js-cart-remove-item"></a>
    </div>
</div>
