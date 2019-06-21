/* eslint-disable no-unused-vars */

import { stokpress, stokpressViewPort } from '../util/helper';
/* eslint-disable no-undef */

var Cart = {};

(function ($) {
    var cartForm = '.js-selectProductSingle';
    var navCart = '.js-cart-overlay';
    // var removeItem = '.cart-remove-item';
    var cartItemCount = $('.js-item-count');
    // var cartItems = $('.cart');
    // var cartNavButton = $('.navbar-cart-button');
    var buttonText = '.js-button-text';
    var singlePageScope = $('body.single');
    var cartAjaxRequestEnable = true;

    Cart.ajaxCall = function (type, data, url, button) {
        // To avoid double send of ajax request
        if (!cartAjaxRequestEnable) {
            return;
        }

        $.ajax({
            url: url,
            data: data,
            type: type,
            dataType: 'json',
            beforeSend: function () {
                cartAjaxRequestEnable = false;

                if (button && button.length > 0) {
                    button.attr('disabled', 'disabled');
                    button.addClass('is-loading');
                }
            },
            success: function (result) {

                // Update cart item count
                cartItemCount.each( function () {
                    $(this).text(result.totalItems);
                });

                // cartItems.html(result.basket);
                // cartNavButton.addClass('has-added-item');
                Cart.toggleCart( 'open' );
            },
            complete: function () {
                setTimeout(function () {
                //     cartNavButton.removeClass('has-added-item');
                    Cart.toggleCart( 'close' );

                    if (button && button.length > 0) {
                        button.removeAttr('disabled');
                        button.removeClass('is-loading');
                    }

                    cartAjaxRequestEnable = true;
                }, 2000);
            },
            error: function (request) {
                console.debug(request);
            },
        });
    };

    Cart.toggleCart = function(action) {
        var cartContainer = $(navCart);
        var body = $('body');

        if (!cartContainer) { return; }

        if (action==='open') {

            cartContainer.addClass( 'is-open' );
            body.addClass( 'cart-overlay' );  
            
        } else if(action==='close') {

            cartContainer.removeClass( 'is-open' );
            body.removeClass( 'cart-overlay' ); 

        }

    };

    Cart.add = function (_this) {
        var buttonEl = _this.find('button');

        if (_this.find('input[name="esc_product_item"]:checked').length > 0 || _this.find('select[name="esc_product_item"]').val()) {
            var data = _this.serialize();

            // if (typeof (fbq) == 'function' && _this.data('name')) {
            //     fbq('track', 'AddToCart', {
            //         'content_name': _this.data('name'),
            //         'content_ids': [_this.data('sku')],
            //         'content_type': 'product'
            //     });
            // }

            Cart.ajaxCall( 'POST', data, null, buttonEl );

        } else {

            // Display error in button
            Cart.updateButtonText( 'error', buttonEl );

            var isMobile = stokpress.isMobile() || stokpressViewPort.documentWidth().width < 720;
            var navHeight = $('nav').height();
            var scrollToPos = 0;

            // Scroll to sizes
            if (isMobile) { 
                scrollToPos = Math.abs(document.documentElement.clientHeight - buttonEl.offset().top - (buttonEl.height() + navHeight));
            }

            // Scroll to size error if current page is single page
            if (singlePageScope.length) {
                $('html, body').animate({
                    scrollTop: scrollToPos,
                }, 1000);
            }
        }
    };

    Cart.updateButtonText = function( dataAttr, buttonEl ) {
        if (!buttonEl) { return; }

        var textVal = buttonEl.data( dataAttr );
        var buttonTextEl = buttonEl.find( buttonText );

        if (buttonTextEl) {
            buttonTextEl.text(textVal);
        }        
    };

    Cart.init = function () {

        // Add to bag
        $(document).on( 'submit', cartForm, function(e) {
            e.preventDefault();

            Cart.add($(this));
        });

        // // Remove product
        // $(document).on('click', removeItem, function (e) {
        //     e.preventDefault();
        //     var _this = $(this);

        //     Cart.ajaxCall('GET', null, _this.attr('href'), null);
        // });

        // Has size selected
        $(document).on( 'change', 'input[name="esc_product_item"], select[name="esc_product_item"]', function (e) {
            e.preventDefault();

            Cart.updateButtonText( 'text', $(cartForm).find('button') );
        });

    };

    Cart.init();

})(jQuery);
