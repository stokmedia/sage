( function ( $ ) {
	var Scroll = {};

	Scroll.To = function ( target, adjHeight ) {
		target = $( target );

		if( typeof adjHeight === 'undefined' || adjHeight === null ) { 
			adjHeight = 0; 
		}		

		if ( target.length === 0 ) {
			return;
		}
		var scrollTop = target.offset().top;

		// Get nav height and subtract to top offset of target element
		var navBar = $( 'nav' );
		if ( navBar.length > 0 ) {
			scrollTop -= parseInt( navBar.css( 'height' ) );
		}	

		// Get wpadminbar height and subtract to top offset of target element
		var wpAdminBar = $( '#wpadminbar' );
		if ( wpAdminBar.length > 0 ) {
			scrollTop -= parseInt( wpAdminBar.css( 'height' ) );
		}

		if( adjHeight > 0 ) {
			scrollTop -= parseInt( adjHeight );
		}

		// Call stop() to avoid shaking behavior in Chrome
		$( 'html, body' ).stop( true ).animate( {
			scrollTop: scrollTop,
		}, 1000 );
	};

	$( window ).load( function() {

		// Scroll to specific element id on page load
		if( window.location.hash !== null && window.location.hash !== '' ) {
			var hash = window.location.hash.substring(1);
			var target = $( '#' + hash );

			if (target.length) {
				Scroll.To( target, 0 );
			}
		}

		var links = $(document).find( 'a' );
		if (links.length) {
			links.off('click').on( 'click', function(e) {
				var targetLink = $(this).attr('href');

				if (targetLink && $( targetLink )) {
					e.preventDefault();
					Scroll.To( $( targetLink ), 0 );
				}
			} );
		}


	} );
} )( jQuery );