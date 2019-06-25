(function($) {
    var Checkout = {};

    var editProduct = '.js-edit-item';
    var cartContainer = $(document).find( '#js-selectedItems' );
    var selectedItemsContainer = $(document).find( '#js-selectedItems--selection' );
    var selectedTotalsContainer = $(document).find( '#js-selectedTotals' );
    var voucherContainer = $(document).find('#js-voucher-field');
    var paymentMethodContainer = $(document).find( '#js-selectedPaymentMethod' );
    var newsletterContainer = $(document).find( '#js-selectedNewsletter' );
    var giftContainer = $(document).find( '#js-selectedGiftwrap' );
    var paymentFieldsContainer = $(document).find( '#js-paymentFields' );
    var commentContainer = $(document).find('#js-selectedComment');
    var shippingMethodContainer = $(document).find( '#js-selectedShippingMethod' );
    var scope = $(document).find( '#js-checkout-content' );


	Checkout.init = function() {

		// Add/Remove product
        $(document).on( 'click', editProduct, function (e) {
            e.preventDefault();
            Checkout.processItems( $(this) );
        });

        // Voucher
		$(document).on( 'keydown', '#js-voucher-field #voucher', function(e) {
            //If not enter pushed
            if (e.keyCode !== 13) { return; }

            e.preventDefault();
            Checkout.voucherProcess( $(this).parent().next() );
		});

		$(document).on( 'click', '#js-voucher-field button', function(e) {
            e.preventDefault();
            Checkout.voucherProcess( $(this) );
		});

        // Newsletter
		newsletterContainer.find( ':checkbox' ).on( 'change', function(e) {
            e.preventDefault();
            Checkout.processNewsletter( 'click' );
		});

        // Gift
        giftContainer.find( ':checkbox' ).on( 'change', function(e) {
            e.preventDefault();
            Checkout.processComment( 'click' );
        });

        // Comment
        commentContainer.find( 'textarea' ).on( 'blur', function(e) {
            e.preventDefault();
            Checkout.processComment( 'click' );
        });

        // Payment Method
		$(document).on( 'change', '#js-selectedPaymentMethod :radio', function(e) {
            e.preventDefault();
            Checkout.processPaymentMethod( paymentMethodContainer );
		});

        // Shipping Method
        $(document).on( 'change', '#js-selectedShippingMethod :radio', function(e) {
            e.preventDefault();
            Checkout.processShippingMethod( shippingMethodContainer );
        });

        // Country
		$(document).on( 'change', 'select#address_country', function(e) {
            e.preventDefault();
            Checkout.countryChangeProcess( this.value );
		} );

    };

    Checkout.ajaxCall = function() {
    };
	
	Checkout.updateHtml = function( data ) {

        paymentMethodContainer.html( data.paymentOptions );
        shippingMethodContainer.html( data.shippingOptions );
		paymentFieldsContainer.html( data.payments );
		cartContainer.html( data.basket );
		selectedItemsContainer.html( data.items );
		selectedTotalsContainer.html( data.totals );
        voucherContainer.html( data.voucher );
        console.log('reinit payments');
        
    };
    
    Checkout.processItems = function( el ) {
        if ( !el ) { return; }

        console.log( el, el.attr( 'href' ) );
        
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: el.attr( 'href' ),
            success: function(data) {

                if( data.totalItems === 0 ) {
                    window.location.href = location.pathname;
                } else {
                    Checkout.updateHtml( data );
                    console.log( data );
                }

            },
            error: function (request) {
                console.debug(request);
            },
        });        
    };    

	Checkout.processPaymentMethod = function( wrapper ) {
		var paymentValue = wrapper.find( ':radio:checked' ).val();
		
        console.log( 'processPaymentMethod' );

        $.ajax( {
            url: window.ajaxURL,
            dataType: 'JSON',
            data: {
                action: 'get_payment_method_form',
                payment_method: paymentValue,
            },
            success: function ( result ) {
                if( result.html ) {
                    $( '#js-paymentFields' ).html( result.html );
                } else {
                    window.location.reload();	
                }
            },
            error: function( error ) {
                console.log( error );
            },          
        } );		
	}

	Checkout.voucherProcess = function( $button ) {
		var sendData = $( '#esc_purchase' ).serialize();
		var buttonName = $button.attr('name');
		var buttonValue = $button.attr('value');

		sendData += '&' + buttonName + '=' + buttonValue + '&ajax=1';

		//Update all HTML
		$.ajax( {
			data: sendData,
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				Checkout.updateHtml( data );
			},
		} );
	};

	Checkout.countryChangeProcess = function( $countryCode ) {

        console.log('countryChangeProcess');

		var sendData = 'esc_action=esc_change_country';
        var form = $( '#esc_purchase' );
        var state = form.find( '#address_state' ).val();
        
        sendData += '&esc_country='+ $countryCode +'&ajax=1';
        sendData += '&address[state]=' +state;

		//Update all HTML
		$.ajax( {
			data: sendData,
			type: 'POST',
			dataType: 'JSON',
			success: function(data) {
				Checkout.updateHtml( data );
			},
		} );
	};	

    Checkout.processShippingMethod = function( wrapper ) {

        var shippingValue = wrapper.find( ':radio:checked' ).val();
        
        var sendData = $( '#esc_purchase' ).serialize();

        sendData += '&shipping_method=' + shippingValue + '&ajax=1';

        console.log('processShippingMethod');

        $.ajax( {
            dataType: 'JSON',
            type: 'POST',
            data: sendData,
            success: function ( data ) {
                // console.log(result);
                Checkout.updateHtml( data );
                console.log(data.shippingOptions);
            },
            error: function( error ) {
                console.log( error );
            },            
        } );

    };

    Checkout.processComment = function( action ) {

        console.log('send comment');

        var value = giftContainer.find( ':checkbox:checked' ).length;
        var form = $( '#esc_purchase' );
        var sendData = form.serializeArray();
        var voucher = form.find( '#js-voucher-field button' ).val();

        $.each( sendData, function() {
            if( this.name === 'voucher' ) {
                this.value = voucher;
            }
        });
        
        sendData = $.param( sendData );

        if( value === 0 ) {
            sendData += '&internalComment[giftwrap]=0';
        }

        sendData +=  '&submit_comment'+ '=' + value +'&ajax=1';
        
        //Update all HTML
        $.ajax( {
            data: sendData,
            type: 'POST',
            dataType: 'JSON',
            success: function( data ) {
                if( action === 'click' ) {
                    Checkout.updateHtml( data );
                }
            },
        } );
    };


	Checkout.processNewsletter = function( action ) {
        console.log('newsletter');

		var value = newsletterContainer.find( ':checkbox:checked' ).length;
        var form = $( '#esc_purchase' );
        var sendData = form.serializeArray();
        var voucher = form.find( '#js-voucher-field button' ).val();

        $.each(sendData, function() {
            if( this.name === 'voucher' ) {
                this.value = voucher;
            }
        });
        
        sendData = $.param( sendData );

        if( value === 0 ) {
            sendData += '&address[newsletter]=0';
        }

        sendData +=  '&submit_newsletter'+ '=' + value +'&ajax=1';
        
        //Update all HTML
        $.ajax( {
            data: sendData,
            type: 'POST',
            dataType: 'JSON',
            success: function( data ) {
                if( action === 'click' ) {
                    Checkout.updateHtml( data );
                }
            },
        } );
    };

    if( scope.length > 0) {
        $(document).ready( function() {
            Checkout.init();
        } );
    }

})(jQuery);