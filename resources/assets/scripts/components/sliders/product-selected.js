let $slider, $flkty, $thumbnailGroup, $thumbnailGroupItems, $productPeview;

$slider = $('.selected-product-slider');
$thumbnailGroup = $('.selected-product-thumbnail');
$thumbnailGroupItems = $thumbnailGroup.find('.item');
$productPeview = $('.selected-product-preview');

$slider.on('ready.flickity', function () {
  $productPeview.removeClass('invisible');
});

$slider.flickity({
  pageDots: false,
  contain: true,
  cellAlign: 'left',
  percentPosition: false,
  dragThreshold: 10,
  prevNextButtons: $(window).innerWidth() < 992,
  fullscreen: $(window).innerWidth() > 991,
});

$flkty = $slider.data('flickity');

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

// Accordion first child
$('.js-selected-product-accordion .list-group-item .collapse:eq(0)').addClass('show');
