let GridSlider = {};

GridSlider.slider = function () {
  let $gridSlider = $( '.js-grid-slider' );

  $gridSlider.flickity({
    cellAlign: 'left',
    prevNextButtons: false,
    pageDots: false,
    dragThreshold: 15,
  });

  let $prevButton = $('.js-flickity-prev');
  let $nextButton = $('.js-flickity-next');

  $prevButton.click(function() {
    $gridSlider.flickity('previous');
  });

  $nextButton.click(function() {
    $gridSlider.flickity('next');
  });
};

GridSlider.slider();

