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

Nav.overlay();
