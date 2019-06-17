// Create Element.remove() function if not exist // BECAUSE IE 11
if (!('remove' in Element.prototype)) {
    Element.prototype.remove = function() {
        if (this.parentNode) {
            this.parentNode.removeChild(this);
        }
    };
}

// var stokpress = {};

export const stokpress = {
  init() {
    return true
  },

  strToBool(str) {
    console.log(typeof str);
    if(typeof str == 'boolean') {
      return str;
    }
    switch(str.toLowerCase().trim()){
      case 'true': case 'yes': case '1': return true;
      case 'false': case 'no': case '0': case null: return false;
      default: return Boolean(str);
    }
  },

  findAncestor(el, cls) {
    while ((el = el.parentElement) && !el.classList.contains(cls));
    return el;
  },

  isMobile() {
      let result = false;
      ( function ( a ) {
        result = /Android|webOS|iPhone|iPad|BlackBerry|Windows Phone|Opera Mini|IEMobile|Mobile/i.test( a );
      } )( navigator.userAgent || navigator.vendor || window.opera );

      return result;
  },

  isInView(el, view) {
    var rect = el.getBoundingClientRect();
    var html = document.documentElement;

    if(view == 'completely') {
      // to check if completely visible
      return (
        rect.top >= 0 &&
        rect.bottom <= (window.innerHeight || html.clientHeight)
      );
    } else if(view == 'partially') {
      // to check if partially visible
      return (
        rect.bottom >= 0 &&
        rect.top < (window.innerHeight || html.clientHeight)
      );
    } else {
      // if partially visible or above current fold,
      return (
        rect.top < (window.innerHeight || html.clientHeight)
      );
    }
  },

  getScript(source, callback) {
      var script = document.createElement( 'script' );
      var prior = document.getElementsByTagName( 'script' )[0];
      script.async = 1;

      script.onload = script.onreadystatechange = function ( _, isAbort ) {
        if ( isAbort || !script.readyState || /loaded|complete/.test( script.readyState ) ) {
          script.onload = script.onreadystatechange = null;
          script = undefined;

          if ( !isAbort ) {
            if ( callback ) {
              callback();
            }
          }
        }
      };

      script.src = source;
      prior.parentNode.insertBefore( script, prior );
  },

  setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = 'expires=' + d.toUTCString();
    document.cookie = cname + '=' + cvalue + ';' + expires + ';path=/';
  },

  getCookie(cname) {
    var name = cname + '=';
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return '';
  },
}

export const stokpressViewPort = {
  init() {
    return true
  },

  documentWidth() {
    let e = window, a = 'inner';

    if( !( 'innerWidth' in window ) ) {
      a = 'client';
      e = document.documentElement || document.body;
    }

    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
  },
}

export const stokpressEvent = {
  init() {
    return true
  },

  debounce(func, wait, immediate) {
    var timeout;
    return function() {
      var context = this, args = arguments;
      var later = function() {
        timeout = null;
        if (!immediate) func.apply(context, args);
      };
      var callNow = immediate && !timeout;
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
      if (callNow) func.apply(context, args);
    };
  },

  throttle(fn, threshhold, scope) {
    threshhold || (threshhold = 250);
    let last, deferTimer;
    return function () {
      let context = scope || this;

      let now = +new Date,
          args = arguments;
      if (last && now < last + threshhold) {
        // hold on to it
        clearTimeout(deferTimer);
        deferTimer = setTimeout(function () {
          last = now;
          fn.apply(context, args);
        }, threshhold);
      } else {
        last = now;
        fn.apply(context, args);
      }
    };
  },

  addListener( element, eventNames, listener ) {
    var events = eventNames.split(' ');
      for ( var i = 0; i < events.length; i++ ) {
        element.addEventListener( events[i], listener );
      }
  },
}

export const stokpressScroll = {
  init() {
    return true
  },

  disableBodyScroll() {
    /**
     * Private variables
     */
    var _selector = false,
    _element = false,
    _clientY;

    /**
    * Polyfills for Element.matches and Element.closest
    */
    if (!Element.prototype.matches)
      Element.prototype.matches = Element.prototype.msMatchesSelector ||
      Element.prototype.webkitMatchesSelector;

    if (!Element.prototype.closest)
      Element.prototype.closest = function(s) {
          var el = this;
          if (!document.documentElement.contains(el)) return null;
          do {
              if (el.matches(s)) return el;
              el = el.parentElement || el.parentNode;
          } while (el !== null && el.nodeType === 1);
          return null;
      };

    /**
    * Prevent default unless within _selector
    *
    * @param  event object event
    * @return void
    */
    var preventBodyScroll = function (event) {
      if (false === _element || !event.target.closest(_selector)) {
          event.preventDefault();
      }
    };

    /**
    * Cache the clientY co-ordinates for
    * comparison
    *
    * @param  event object event
    * @return void
    */
    var captureClientY = function (event) {
      // only respond to a single touch
      if (event.targetTouches.length === 1) {
          _clientY = event.targetTouches[0].clientY;
      }
    };

    /**
    * Detect whether the element is at the top
    * or the bottom of their scroll and prevent
    * the user from scrolling beyond
    *
    * @param  event object event
    * @return void
    */
    var preventOverscroll = function (event) {
      // only respond to a single touch
    if (event.targetTouches.length !== 1) {
      return;
    }

    var clientY = event.targetTouches[0].clientY - _clientY;

    // The element at the top of its scroll,
    // and the user scrolls down
    if (_element.scrollTop === 0 && clientY > 0) {
        event.preventDefault();
    }

    // The element at the bottom of its scroll,
    // and the user scrolls up
    // https://developer.mozilla.org/en-US/docs/Web/API/Element/scrollHeight#Problems_and_solutions
    if ((_element.scrollHeight - _element.scrollTop <= _element.clientHeight) && clientY < 0) {
        event.preventDefault();
    }

    };

    /**
    * Disable body scroll. Scrolling with the selector is
    * allowed if a selector is porvided.
    *
    * @param  boolean allow
    * @param  string selector Selector to element to change scroll permission
    * @return void
    */
    return function (allow, selector) {
    if (typeof selector !== 'undefined') {
        _selector = selector;
        _element = document.querySelector(selector);
    }

      if (true === allow) {
        if (false !== _element) {
            _element.addEventListener('touchstart', captureClientY, false);
            _element.addEventListener('touchmove', preventOverscroll, false);
        }
          document.body.addEventListener('touchmove', preventBodyScroll, false);
      } else {
        if (false !== _element) {
            _element.removeEventListener('touchstart', captureClientY, false);
            _element.removeEventListener('touchmove', preventOverscroll, false);
        }
          document.body.removeEventListener('touchmove', preventBodyScroll, false);
      }
    };
  },
}

// stokpress.cartItems;

// stokpress.cartHeight = function() {
//   var e = window, a = 'inner';

//   if( !( 'innerHeight' in window ) ) {
//     a = 'client';
//     e = document.documentElement || document.body;
//   }

//   (function () {
//       if ( typeof NodeList.prototype.forEach === 'function' ) return false;
//       NodeList.prototype.forEach = Array.prototype.forEach;
//   })();

//   stokpress.cartItems.forEach(function(element) {
//     element.style.setProperty('--cartheight', e[ a+'Height' ]+'px');
//   });
// }