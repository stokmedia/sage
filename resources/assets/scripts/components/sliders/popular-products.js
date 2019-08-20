let GridSlider = {};

GridSlider.slider = function () {
  let $gridSlider = $('.js-grid-slider');

  $gridSlider.on('ready.flickity', function () {
    $gridSlider.css('visibility', 'visible');
  });

  var options = {
    contain: true,
    cellAlign: 'left',
    groupCells: false,
    prevNextButtons: false,
    pageDots: false,
    dragThreshold: 15,
  };

  if (matchMedia('screen and (min-width: 768px)').matches) {
    options = {
      wrapAround: true,
      cellAlign: 'left',
      groupCells: true,
      prevNextButtons: false,
      pageDots: false,
      dragThreshold: 15,
    }
  }

  $gridSlider.flickity(options);

  let $prevButton = $('.js-flickity-prev');
  let $nextButton = $('.js-flickity-next');

  $prevButton.click(function () {
    $gridSlider.flickity('previous');
  });

  $nextButton.click(function () {
    $gridSlider.flickity('next');
  });
};

GridSlider.slider();

$(window).resize(function () {
  GridSlider.slider();
});
