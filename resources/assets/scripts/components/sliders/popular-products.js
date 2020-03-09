let GridSlider = {};

GridSlider.slider = function () {
  let $gridSliders = $('.js-grid-slider');

  if (!$gridSliders) return;

  $gridSliders.each(function() {
    let $gridSlider = $(this);

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

    let $prevButton = $gridSlider.parent().find('.js-flickity-prev');
    if ($gridSlider.data('target')) {
      $prevButton = $($gridSlider.data('target')).find('.js-flickity-prev');
    }

    let $nextButton = $gridSlider.parent().find('.js-flickity-next');
    if ($gridSlider.data('target')) {
      $nextButton = $($gridSlider.data('target')).find('.js-flickity-next');
    }  
  
    $prevButton.on('click', function () {
      $gridSlider.flickity('previous');
    });
  
    $nextButton.on('click', function () {
      $gridSlider.flickity('next');
    });
  });
};

GridSlider.slider();

$(window).resize(function () {
  GridSlider.slider();
});
