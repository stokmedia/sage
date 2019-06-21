<div class="navbar-helper order-2 order-lg-2">
    <ul class="navbar-nav float-lg-right p-0">
        <li class="nav-item nav-item-cart js-cart-overlay">
            <a class="nav-link nav-link-cart" href="#">
                <img src="@asset('images/icon/icon_cart.svg')" alt="" srcset="">
                <span class="cart-item-count text-center js-item-count">{{ $selection['total_items'] ?? 0 }}</span>
            </a>

            <div class="cart">
                {{-- Desktop Cart --}}
                <div class="cart-wrapper d-none d-lg-block">
                    <div class="cart-title h3 text-center">Varan är tillagd!</div>
                    <div class="cart-list">
                        <ul class="cart-items p-0">
                            <li class="item">
                                @include('partials.product-details-inline', ['is_link'=>true, 'has_close'=>true])
                            </li>
                            <li class="item">
                                @include('partials.product-details-inline', ['is_link'=>true, 'has_close'=>true])
                            </li>
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
                    <div class="cart-buttons">
                        <button class="btn btn-lg btn-primary" type="button">Till kassan</button>
                        <button class="btn btn-lg btn-outline-primary" type="button">Shoppa mer</button>
                    </div>
                </div>

                {{-- Mobile Cart --}}
                <div class="cart-wrapper is-mobile d-block d-lg-none">
                    <div class="cart-title h3 text-center">Varan är tillagd!</div>
                    <div class="cart-list">
                        <ul class="cart-items p-0">
                            <li class="item">
                                @include('partials.product-details-inline')
                            </li>
                        </ul>
                    </div>
                    <div class="cart-buttons">
                        <button class="btn btn-lg btn-primary" type="button">Till kassan</button>
                        <button class="btn btn-lg btn-outline-primary" type="button">Shoppa mer</button>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>