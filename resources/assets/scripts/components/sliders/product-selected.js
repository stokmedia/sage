let $slider = $('.selected-product-slider').flickity({
    prevNextButtons: $(window).innerWidth() < 992,
    pageDots: false,
    contain: true,
    cellAlign: 'left',
    fullscreen: $(window).innerWidth() > 991,
    percentPosition: false,
    dragThreshold: 10,
  }),
  $flkty = $slider.data('flickity'),
  $thumbnailGroup = $('.selected-product-thumbnail'),
  $thumbnailGroupItems = $thumbnailGroup.find('.item');

$slider.flickity('resize');

// update selected cellButtons
$slider.on('select.flickity', function () {
  $thumbnailGroupItems.filter('.is-selected').removeClass('is-selected');
  $thumbnailGroupItems.eq($flkty.selectedIndex).addClass('is-selected');
});

// select cell on button click
$thumbnailGroup.on('click', '.item', function () {
  let index = $(this).index();
  $slider.flickity('select', index);
});

$slider.on('click', '.item.is-selected', function () {
  $('.flickity-fullscreen-button-view').trigger('click');
});

$slider.on('fullscreenChange.flickity', function () {
  $thumbnailGroup.hasClass('is-fullscreen') ? $thumbnailGroup.removeClass('is-fullscreen') : $thumbnailGroup.addClass('is-fullscreen');
});
