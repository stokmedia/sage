import { stokpressScroll } from '../util/helper';

var Nav = {};

Nav.overlay = function() {
  var cartOverlay = $('.js-cart-overlay');
  var navBarCollapse = $('#navbarNav');

  // Cart Overlay
  cartOverlay.hover(function() {
    $('body').addClass('cart-overlay');
  }, function(){
    $('body').removeClass('cart-overlay');
  });

  navBarCollapse.on('show.bs.collapse', function () {
    $('body').addClass('nav-overlay');
    document.documentElement.classList.add('no-scroll');
    stokpressScroll.disableBodyScroll(true, '.navbar-collapse');
  })

  navBarCollapse.on('hidden.bs.collapse', function () {
    $('body').removeClass('nav-overlay');
    document.documentElement.classList.remove('no-scroll');
    stokpressScroll.disableBodyScroll(false, '.navbar-collapse');
  })
};

Nav.menuPosition = function() {
  var header = $('.js-header');
  var menu = $('.navbar-collapse, .nav-item.dropdown .dropdown-menu');
  var headerPosition = header.position().top + header.outerHeight(true);
  changePosition(menu, headerPosition);

  window.onresize = function () {
    headerPosition = header.position().top + header.outerHeight(true);
    changePosition(menu, headerPosition);
    console.log('onresize');
  };

  function changePosition(menu, headerPosition) {
    menu.css('margin-top', headerPosition + 'px');
    console.log(headerPosition);

    console.log('header position top: ' + header.position().top);
    console.log('outerheight: ' + header.outerHeight(true));
  }
};

Nav.overlay();
//Nav.menuPosition();
