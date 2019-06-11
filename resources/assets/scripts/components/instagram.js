var Instagram = {};

function calculatePosition() {
  var tileInfoHeight = $('.instagram-gallery .tile-block-hidden').outerHeight();
  var infoHeight = $('.instagram-gallery .instagram-info').outerHeight();
  var instagramInfo = $('.instagram-info-margin');

  if (tileInfoHeight > infoHeight) {
    instagramInfo.css({
      'margin-bottom': (tileInfoHeight * -1) + 'px',
      'padding-top': ( tileInfoHeight - infoHeight) + 'px',
    });
  } else {
    instagramInfo.css({
      'margin-bottom': (tileInfoHeight * -1) + 'px',
    });
  }
}

Instagram.infoPosition = function() {
  calculatePosition();

  $(window).resize(function () {
    calculatePosition();
  });
};

Instagram.infoPosition();