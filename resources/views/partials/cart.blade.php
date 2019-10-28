@php $cartCountClass = empty($selection['total_items']) ? 'd-none' : '' @endphp

<div class="navbar-helper order-2 order-lg-2">
    <ul class="navbar-nav float-lg-right p-0">
        <li class="nav-item nav-item-search js-search-open d-none d-lg-inline" data-toggle="collapse" data-target="#navbarNav" data-focus="#js-search-input">
            <a class="nav-link d-flex align-items-center flex-column justify-content-center">
                <img src="@asset('images/icon/search.svg')" alt="" srcset="">
            </a>
        </li>
        <li class="nav-item nav-item-cart js-cart-overlay">
            <a class="nav-link nav-link-cart" {{ !empty($checkout_link) ? 'href='. $checkout_link : '' }}>
                <img src="@asset('images/icon/icon_cart.svg')" alt="" srcset="">
                <div class="cart-item-count text-center js-item-count {{ $cartCountClass }}"><span>{{ $selection['total_items'] ?? 0 }}</span></div>
            </a>

            <div id="js-selectedItems" class="cart js-cart-items">
                @php (include(locate_template( 'parts/shop/header-selection.php' )))
            </div>
        </li>
    </ul>
</div>