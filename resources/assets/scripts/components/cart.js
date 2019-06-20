var Cart = {};

(function ($) {
    var cartForm = '.js-selectProductSingle';
    // var removeItem = '.cart-remove-item';
    // var cartItemCount = $('.js-item-count');
    // var cartItems = $('.cart');
    // var cartNavButton = $('.navbar-cart-button');
    // var errorMessage = '.js-error-select-size';
    // var singlePageScope = $('body.single');
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
                console.log( result );

                // // Update cart item count
                // cartItemCount.each(function () {
                //     var cartItemCountCache = $(this).children();
                //     $(this).text(result.totalItems + ' ' + $(this).data('item-text')).append(cartItemCountCache);
                // });

                // cartItems.html(result.basket);
                // cartNavButton.addClass('has-added-item');
            },
            complete: function () {
                // setTimeout(function () {
                //     cartNavButton.removeClass('has-added-item');

                    if (button && button.length > 0) {
                        button.removeAttr('disabled');
                        button.removeClass('is-loading');
                    }

                //     cartAjaxRequestEnable = true;
                // }, 4000);
            },
            error: function (request) {
                console.debug(request);
            },
        });
    };

    Cart.add = function (_this) {
        if (_this.find('input[name="esc_product_item"]:checked').length > 0 || _this.find('select[name="esc_product_item"]').val()) {
            var data = _this.serialize();

            // if (typeof (fbq) == 'function' && _this.data('name')) {
            //     fbq('track', 'AddToCart', {
            //         'content_name': _this.data('name'),
            //         'content_ids': [_this.data('sku')],
            //         'content_type': 'product'
            //     });
            // }

            Cart.ajaxCall('POST', data, null, _this.find('button'));

        } else {
//             var errorEl = _this.find(errorMessage);
//             var stickyButton = _this.find('.product-section-sticky');
//             var scrollToError = !systerpHelper.isInView(errorEl[0], 'completely') || stickyButton.is(':visible');
//             var scrollToPos = 0;

//             if (stickyButton.is(':visible')) {
//                 if(parseInt(stickyButton.css('bottom')) > 0) {
//                     scrollToPos = Math.abs(document.documentElement.clientHeight - _this.offset().top - (stickyButton.height() + 160 - (parseInt(stickyButton.css('bottom')) * 2)));
// //                    var final_top = scrollToPos;
//                 } else {
//                     scrollToPos = Math.abs(document.documentElement.clientHeight - _this.offset().top - (stickyButton.height() + 170 + parseInt(stickyButton.css('bottom'))));
// //                     var final_top = scrollToPos;
//                 }


//             } else if (document.documentElement.clientWidth < 1024) {
//                 scrollToPos = (document.documentElement.clientHeight / 2) - ($('.product-wrapper').height() / 2);
//             }

//             // Display error message
//             errorEl.fadeIn();

//             // Scroll to size error if current page is single page
//             if (singlePageScope.length > 0 && errorEl.length > 0 && scrollToError) {
//                 $('html, body').animate({
//                     scrollTop: scrollToPos
//                 }, 1000);
//             }
        }
    };

    Cart.init = function () {
        // Add to bag
        console.log( cartForm );
        $(document).on('submit', cartForm, function (e) {
            e.preventDefault();

            Cart.add($(this));
        });

        // // Remove product
        // $(document).on('click', removeItem, function (e) {
        //     e.preventDefault();
        //     var _this = $(this);

        //     Cart.ajaxCall('GET', null, _this.attr('href'), null);
        // });

        // // Hide error when size selected
        // $(document).on('change', 'input[name="esc_product_item"], select[name="esc_product_item"]', function (e) {
        //     e.preventDefault();

        //     $(errorMessage).fadeOut();
        // });

    };

    Cart.init();

})(jQuery);
