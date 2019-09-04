<?php

    $selection = EscGeneral::getSelection();
    $isHeaderCart = false;
    ?>

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