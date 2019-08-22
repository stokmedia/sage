var $slider,
    $thumbnailGroup,
    $thumbnailGroupItems,
    $productPeview,
    $mobileOption,
    $desktopOption,
    $isInitialized,
    ProductSelectedSlider;

$slider = $('.selected-product-slider');
$thumbnailGroup = $('.selected-product-thumbnail');
$thumbnailGroupItems = $thumbnailGroup.find('.item');
$productPeview = $('.selected-product-preview');
$isInitialized = false;

$desktopOption = {
  pageDots: false,
  contain: true,
  cellAlign: 'left',
  percentPosition: false,
  dragThreshold: 10,
  prevNextButtons: false,
  fullscreen: true,
  on: {
    ready: function () {
      $productPeview.removeClass('invisible');
      $isInitialized = true;
    },
    select: function (index) {
      $thumbnailGroupItems.filter('.is-selected').removeClass('is-selected');
      $thumbnailGroupItems.eq(index).addClass('is-selected');
    },
    fullscreenChange: function () {
      $thumbnailGroup.hasClass('is-fullscreen') ? $thumbnailGroup.removeClass('is-fullscreen') : $thumbnailGroup.addClass('is-fullscreen');
    },
  },
}

$mobileOption = {
  pageDots: false,
  contain: true,
  cellAlign: 'left',
  percentPosition: false,
  dragThreshold: 10,
  prevNextButtons: true,
  fullscreen: false,
  on: {
    ready: function () {
      $productPeview.removeClass('invisible');
      $isInitialized = true;
    },
    select: function (index) {
      $thumbnailGroupItems.filter('.is-selected').removeClass('is-selected');
      $thumbnailGroupItems.eq(index).addClass('is-selected');
    },
  },
}

ProductSelectedSlider = {
  init(options) {

    $isInitialized && $slider.flickity('destroy');

    if (window.innerWidth <= 991.98) {
      $slider.flickity(options.$mobileOption);
    } else {
      $slider.flickity(options.$desktopOption);

      $slider.on('click', '.item.is-selected', function () {
        window.innerWidth >= 991.98 && $slider.flickity('viewFullscreen');
      });

      // select cell on button click
      $thumbnailGroup.on('click', '.item', function () {
        let index = $(this).index();
        $slider.flickity('select', index);
      });
    }
  },
};

ProductSelectedSlider.init({ $mobileOption, $desktopOption });

$(window).resize(function () {
  $slider.flickity('exitFullscreen');

  ProductSelectedSlider.init({ $mobileOption, $desktopOption });
});
