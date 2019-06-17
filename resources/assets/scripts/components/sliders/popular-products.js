let GridSlider = {};

GridSlider.slider = function () {
  let $gridSlider = $( '.js-grid-slider' );

  $gridSlider.on( 'ready.flickity', function() {
    $gridSlider.css('visibility', 'visible');
  });

  var optionsLeft = {
    cellAlign: 'left',
    groupCells: true,
    prevNextButtons: false,
    pageDots: false,
    dragThreshold: 15,
  };

  // var optionsRight = {
  //   cellAlign: 'right',
  //   groupCells: true,
  //   prevNextButtons: false,
  //   pageDots: false,
  //   dragThreshold: 15,
  // };

  $gridSlider.flickity(optionsLeft);

  let $prevButton = $('.js-flickity-prev');
  let $nextButton = $('.js-flickity-next');

  $prevButton.click(function() {
    $gridSlider.flickity('previous');
  });

  $nextButton.click(function() {
    $gridSlider.flickity('next');
  });

  // $slider.on('change.flickity', function () {
  //   var flkty = $slider.data('flickity');
  //   var cellIndex = flkty.selectedIndex + 1;
  //   var cellLength = flkty.slides.length;

  //   console.log(cellIndex + '/' + cellLength);

  //   if (cellIndex == cellLength) {
  //     console.log('Last Cell');
  //     $slider = $gridSlider.flickity(optionsRight);
  //   } else {
  //     $slider = $gridSlider.flickity(optionsLeft);
  //   }

  //   $slider.flickity('resize');
  // });

  // $slider.on('change.flickity', function () {
  //   $('.popular-products-grid-slider .grid-slider-item:first-child').css('padding-left', '0');
  // });
};

GridSlider.slider();
