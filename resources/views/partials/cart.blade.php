<div class="navbar-helper order-2 order-lg-2">
    <ul class="navbar-nav float-lg-right p-0">
        <li class="nav-item nav-item-cart js-cart-overlay">
            <a class="nav-link nav-link-cart" {{ !empty($checkout_link) ? 'href='. $checkout_link : '' }}>
                <img src="@asset('images/icon/icon_cart.svg')" alt="" srcset="">
                <span class="cart-item-count text-center js-item-count">{{ $selection['total_items'] ?? 0 }}</span>
            </a>

            <div id="js-selectedItems" class="cart js-cart-items">
                @php (include(locate_template( 'parts/shop/header-selection.php' )))
            </div>
        </li>
    </ul>
</div>