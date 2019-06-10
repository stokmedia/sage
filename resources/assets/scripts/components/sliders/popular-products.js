var GridSlider = {};

GridSlider.slider = function () {
  var $gridSlider = $( '.js-grid-slider' );

  $gridSlider.flickity({
    cellAlign: 'left',
    prevNextButtons: false,
    pageDots: false,
  });

  var $prevButton = $('.js-flickity-prev');
  var $nextButton = $('.js-flickity-next');

  $prevButton.click(function() {
    $gridSlider.flickity('previous');
  });

  $nextButton.click(function() {
    $gridSlider.flickity('next');
  });
};

GridSlider.slider();

