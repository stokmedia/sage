/* eslint-disable no-unused-vars */
/* eslint-disable no-undef */
var Video = {};

function onPlayerStateChange( event ) {
	if ( event.data === YT.PlayerState.PLAYING ) {
		var target = event.target.a;

		Array.prototype.forEach.call( target.parentNode.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
			element.parentNode.removeChild( element );
		} );

		target.style.opacity = 1;
		target.classList.remove( 'is-video-hidden' );
	}
}

// Youtube callbacks
function onYouTubeIframeAPIReady() {
	for ( var i = 0; i < Video.iframes.length; i++ ) {
		new YT.Player( Video.iframes[i].id, {
			events: {
				'onStateChange': onPlayerStateChange,
			},
		} );
	}
}

Video.initializeVimeo = function ( iframes ) {
	if ( iframes.length === 0 ) { return; }

	for ( var i = 0; i < iframes.length; i++ ) {
		var source = iframes[i].getAttribute( 'data-source' );
		// var isAutoPlay = iframes[i].getAttribute( 'data-autoplay' );

		if ( source !== 'vimeo' ) { continue; }

		var playVideo = iframes[i].parentNode.parentNode.querySelector( '.js-playvideo' );

		if ( !playVideo ) { continue; }

			playVideo.addEventListener( 'click', function (event) {
				event.preventDefault();
				var iframe = this.parentNode.parentNode.querySelector( '.js-video-iframe' );
	
				if ( !iframe ) { return; }
	
				// this.parentNode.parentNode.classList.add( 'no-after' );
	
				Array.prototype.forEach.call( this.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
					element.parentNode.removeChild( element );
				} );
	
				iframe.style.opacity = 1;
				iframe.style.zIndex = 10;
				iframe.parentNode.style.zIndex = 10;	
				iframe.classList.remove( 'is-video-hidden' );
	
				var player = new Vimeo.Player( iframe );
				player.play();
			} );
	}
};

Video.playVimeo = function ( e ) {
	if ( e.length === 0 ) { return; }

	for ( var i = 0; i < e.length; i++ ) {
		var source = e[i].getAttribute( 'data-source' );
		// var isAutoPlay = e[i].getAttribute( 'data-autoplay' );

		if ( source !== 'vimeo' ) { continue; }

		var playVideo = e[i].parentNode.parentNode.querySelector( '.js-playvideo' );

		if ( !playVideo ) { continue; }

		var iframe = e[i].parentNode.parentNode.querySelector( '.js-video-iframe' );
	
		if ( !iframe ) { return; }

		// this.parentNode.parentNode.classList.add( 'no-after' );

		Array.prototype.forEach.call( this.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
			element.parentNode.removeChild( element );
		} );

		iframe.style.opacity = 1;
		iframe.style.zIndex = 10;
		iframe.parentNode.style.zIndex = 10;	
		iframe.classList.remove( 'is-video-hidden' );

		var player = new Vimeo.Player( iframe );
		player.play();
	}
};

Video.initializeYoutube = function ( iframe ) {
	var playVideo = iframe.parentNode.parentNode.querySelector( '.js-playvideo' );

	if ( !playVideo ) { return; }

	playVideo.addEventListener( 'click', function (event) {
		event.preventDefault();

		console.log('clicked')

		// this.parentNode.parentNode.classList.add( 'no-after' );

		Array.prototype.forEach.call( this.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
			element.parentNode.removeChild( element );
		} );

		iframe.style.opacity = 1;
		iframe.style.zIndex = 10;
		iframe.src += '&autoplay=1';
	} );
};

Video.iframeProcess = function () {
	var includeYoutubeScript = false,
		includeVimeoScript = false;

	for ( var i = 0; i < Video.iframes.length; i++ ) {

		var source = Video.iframes[i].getAttribute( 'data-source' );

		if(stokpress.isMobile()) {
			Video.autoPlayChecker(Video.iframes[i], 'mobile', source);
		} else {
			Video.autoPlayChecker(Video.iframes[i], 'desktop', source);
		}

		if ( !Video.iframes[i].getAttribute( 'data-autoplay' ) || stokpress.isMobile() ) {
			if ( source === 'vimeo' ) {
				includeVimeoScript = true;
				// if ( systerpHelper.isMobile() ) {
				// 	Video.iframes[i].style.opacity = 1;
				// 	Video.iframes[i].style.zIndex = 10;
				// 	Video.iframes[i].parentNode.style.zIndex = 10;
				// 	Video.iframes[i].classList.remove( 'is-video-hidden' );
				// } else {
				// 	Video.initializeVimeo( Video.iframes[i] );
				// }
				
			} else if ( source === 'youtube' ) {
				if ( stokpress.isMobile() ) {
					// Video.iframes[i].style.zIndex = 10;
					// Video.iframes[i].parentNode.style.zIndex = 10;
					// Video.iframes[i].classList.remove( 'is-video-hidden' );
					includeYoutubeScript = true;
				} else {
					// Video.initializeYoutube( Video.iframes[i] );
				}
			}

		} else {
			// Array.prototype.forEach.call( Video.iframes[i].parentNode.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
			// 	element.parentNode.removeChild( element );
			// } );
			// Video.iframes[i].style.opacity = 1;
			// Video.iframes[i].classList.remove( 'is-video-hidden' );
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

Video.autoPlayChecker = function (e, isCurrStatus, source) {
	var isKindVideo = source;

	//if mobile
	if(isCurrStatus === 'mobile') {
		var currStatus = e.getAttribute( 'data-autoplaymobile' );
		//if not autoplay
		if(!currStatus) {
			//check if vimeo or yt
			if(isKindVideo === 'vimeo') {
				
				Video.initializeVimeo( e );
			} else if (isKindVideo === 'youtube') {
				e.style.zIndex = 10;
				e.parentNode.style.zIndex = 10;
				e.classList.remove( 'is-video-hidden' );
				// e.style.opacity = 1;
				console.log('tae')
				Video.initializeYoutube( e );
			}
		} else {
			//if autoplay
			if(isKindVideo === 'vimeo') {
				Video.playVimeo( e );

				Array.prototype.forEach.call( e.parentNode.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
					element.parentNode.removeChild( element );
				} );
				e.style.opacity = 1;
				e.classList.remove( 'is-video-hidden' );
			} else {
				// e.style.zIndex = 1;
				// e.parentNode.style.zIndex = 10;
				// e.classList.remove( 'is-video-hidden' );
				// e.style.opacity = 1;
				Video.initializeYoutube( e );
			}
		}
	} else {
		//if desktop
		var currStatusDesk = e.getAttribute( 'data-autoplay' );
		console.log(currStatusDesk)
		if(!currStatusDesk) {
			if(isKindVideo === 'vimeo') {
				Video.initializeVimeo( e );
			} else if (isKindVideo === 'youtube') {
				e.classList.remove( 'is-video-hidden' );
				Video.initializeYoutube( e );
			}
		} else {
			if(source === 'vimeo') {
				e.style.opacity = 1;
				e.style.zIndex = 10;
				e.parentNode.style.zIndex = 10;
				e.classList.remove( 'is-video-hidden' );
			}

			Array.prototype.forEach.call(  e.parentNode.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
				element.parentNode.removeChild( element );
			} );
			e.style.opacity = 1;
			e.classList.remove( 'is-video-hidden' );
		}
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
			if(stokpress.isMobile()) {
				console.log(Video.tags[i].getAttribute( 'data-autoplaymobile' ));
				if ( Video.tags[i].getAttribute( 'data-autoplaymobile' ) ) {
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
						targetVideo.classList.remove( 'is-video-hidden' );
					} );
				}
			} else {
				if ( Video.tags[i].autoplay ) {
					// Put video to the front
					Video.tags[i].style.zIndex = 10;
				} else {
					// Play video upon clicking the play button
					var playVideoDesk = Video.tags[i].parentNode.parentNode.querySelector( '.js-playvideo' );
	
					if ( !playVideo ) { continue; }
	
					playVideoDesk.addEventListener( 'click', function (event) {
						event.preventDefault();
						var targetVideo = this.parentNode.parentNode.querySelector( 'video' );
	
						Array.prototype.forEach.call( this.parentNode.querySelectorAll( '.js-hide-on-play' ), function ( element ) {
							element.parentNode.removeChild( element );
						} );
	
						targetVideo.play();
						targetVideo.classList.remove( 'is-video-hidden' );
					} );
				}
			}
		}
	}
};

document.addEventListener( 'DOMContentLoaded', function () {
	Video.init();
	// console.log(stokpress.isMobile())
} );