/* COOKIES */

(function ( $ ) {

	var siteCookie = {};

	siteCookie.set = function( cname, cvalue, exdays ) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = 'expires=' +d.toUTCString();
		document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
	};

	siteCookie.get = function( cname ) {
		var name = cname + '=';
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');

		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) === ' ') {
				c = c.substring(1);
			}

			if (c.indexOf(name) === 0) {
				return c.substring(name.length, c.length);
			}
		}
		return '';
	};

	siteCookie.init = function( wrapperID, btnClass ) {
		var wrapper = $( wrapperID );

		if( !wrapper ) { return; }

		var cookieName = wrapper.attr( 'data-cookie' );

		// if cookies allowed but not yet saved
		if( document.cookie.indexOf(cookieName) < 0 && navigator.cookieEnabled ) {

			//show cookie
			wrapper.css( 'display' , 'block' );

			//init approval buttons
			// var button = wrapper.find( btnClass );

			wrapper.on( 'click keydown', btnClass, function(e) {
				var etype = e.type;

				if(etype === 'keydown' && (e.keyCode !== 13 && e.keyCode !== 32)) {
					return true;
				}

				e.preventDefault();	

				siteCookie.set( cookieName, true, 365 );

				wrapper.slideUp( 'slow' );

			} );
		}
	};

	$( document ).ready( function() {
		siteCookie.init( '#js-cookie', '.js-cookie-approve' );
	});

})( jQuery );