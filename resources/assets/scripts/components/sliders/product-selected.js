let $carousel = $('.selected-product-slider').flickity({
  prevNextButtons: false,
  pageDots: false,
  fullscreen: true,
}),
  $thumbnailGroup = $('.selected-product-thumbnail'),
  $fullScreen = $('.fullscreen');

// select cell on button click
$thumbnailGroup.on( 'click', '.item', function() {
  let index = $(this).index();
  $carousel.flickity( 'select', index );
});

$carousel.on('click', '.item', function() {
  // let index = $(this).index();
  $fullScreen.fadeIn();
});
