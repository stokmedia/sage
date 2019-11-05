/* eslint-disable no-unused-vars */
import Headroom from '../vendor/headroom';

var headroom = {};

( function($) {

    headroom.init = function() {
        var msg = document.getElementById( 'js-main-nav-msg' );
        var nav = document.getElementById( 'js-nav-menu' );

        if( msg && nav ) {
            var headroom = new Headroom( nav, {
                offset: msg.offsetHeight,
                classes: {
                    notTop: 'is-fixed-top',
                },
                onTop : function() {
                    msg.classList.remove( 'd-none' );
                },
                onNotTop : function() {
                    msg.classList.add( 'd-none' );
                },
            } );

            headroom.init();
        }
    };

    headroom.init();

})(jQuery);

window.headroom = headroom;
