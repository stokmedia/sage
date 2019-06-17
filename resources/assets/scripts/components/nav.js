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
  })

  navBarCollapse.on('hidden.bs.collapse', function () {
    $('body').removeClass('nav-overlay');
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
  };

  function changePosition(menu, headerPosition) {
    menu.css('margin-top', headerPosition + 'px');
  }
};

Nav.overlay();
Nav.menuPosition();
