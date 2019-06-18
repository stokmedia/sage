/* eslint-disable no-unused-vars */

import { stokpress } from '../util/helper';
/* eslint-disable no-undef */
var Video = {};

window.onPlayerStateChange = function( event ) {
	if ( event.data === YT.PlayerState.PLAYING ) {
		var target = event.target.a;

		Array.prototype.forEach.call( target.parentNode.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
			element.parentNode.removeChild( element );
		} );

		target.style.opacity = 1;
	}
};

// Youtube callbacks
window.onYouTubeIframeAPIReady = function() {
	for ( var i = 0; i < Video.iframes.length; i++ ) {
		new YT.Player( Video.iframes[i].id, {
			events: {
				'onStateChange': onPlayerStateChange,
			},
		} );
	}
};


Video.initializeVimeo = function ( iframes ) {
    if ( iframes.length === 0 ) { return; }

	for ( var i = 0; i < iframes.length; i++ ) {
		var source = iframes[i].getAttribute( 'data-source' );

		if ( source !== 'vimeo' ) { continue; }

		var playVideo = iframes[i].parentNode.parentNode.querySelector( '.js-playvideo' );

        if ( !playVideo ) { continue; }

		playVideo.addEventListener( 'click', function (event) {
			event.preventDefault();
            var iframe = this.parentNode.parentNode.querySelector( '.js-video-iframe' );

            if ( !iframe ) { return; }

			Array.prototype.forEach.call( this.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
				element.parentNode.removeChild( element );
			} );

			iframe.style.opacity = 1;

			var player = new Vimeo.Player( iframe );
			player.play();
		} );
	}
};

Video.initializeYoutube = function ( iframe ) {
    var playVideo = iframe.parentNode.parentNode.querySelector( '.js-playvideo' );

	if ( !playVideo ) { return; }

	playVideo.addEventListener( 'click', function (event) {
		event.preventDefault();

		Array.prototype.forEach.call( this.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
			element.parentNode.removeChild( element );
		} );

		iframe.style.opacity = 1;
        iframe.src += '&autoplay=1';
	} );
};

Video.iframeProcess = function () {
	var includeYoutubeScript = false,
		includeVimeoScript = false;

	for ( var i = 0; i < Video.iframes.length; i++ ) {
		if ( !Video.iframes[i].getAttribute( 'data-autoplay' ) ) {
            var source = Video.iframes[i].getAttribute( 'data-source' );

			if ( source === 'vimeo' ) {
				includeVimeoScript = true;
			} else if ( source === 'youtube' ) {
				if ( stokpress.isMobile() ) {
					Video.iframes[i].style.zIndex = 10;
					Video.iframes[i].parentNode.style.zIndex = 10;
					includeYoutubeScript = true;
				} else {
					Video.initializeYoutube( Video.iframes[i] );
				}
			}

		} else {
			Array.prototype.forEach.call( Video.iframes[i].parentNode.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
				element.parentNode.removeChild( element );
            } );
            
			Video.iframes[i].style.opacity = 1;
		}
	}

	if ( includeVimeoScript ) {
		stokpress.getScript( 'https://player.vimeo.com/api/player.js', function () {
			Video.initializeVimeo( Video.iframes );
		} );
	}

	if ( includeYoutubeScript ) {
		stokpress.getScript( 'https://www.youtube.com/iframe_api' );
	}
};

Video.init = function () {
	Video.iframes = document.querySelectorAll( 'iframe.js-video-iframe' );
	Video.tags = document.querySelectorAll( 'video.js-video-tag' );

	if ( Video.iframes.length ) {
		Video.iframeProcess();
	}

	if ( Video.tags.length ) {
		for ( var i = 0; i < Video.tags.length; i++ ) {
			if ( Video.tags[i].getAttribute( 'data-autoplay' ) ) {
				// Put video to the front
				Video.tags[i].style.zIndex = 10;
			} else {
				// Play video upon clicking the play button
				var playVideo = Video.tags[i].parentNode.parentNode.querySelector( '.js-playvideo' );

				if ( !playVideo ) { continue; }

				playVideo.addEventListener( 'click', function (event) {
                    event.preventDefault();
                    var targetVideo = this.parentNode.parentNode.querySelector( 'video' );

					Array.prototype.forEach.call( this.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
						element.parentNode.removeChild( element );
					} );

                    targetVideo.play();
                    targetVideo.style.zIndex = 1;
				} );
			}
		}
	}
};

document.addEventListener( 'DOMContentLoaded', function () {
	Video.init();
} );