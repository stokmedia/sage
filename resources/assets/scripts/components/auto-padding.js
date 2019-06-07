var AutoPadding = {};
var $header = $('.js-header');
var $body = $('body');

changePadding($body, $header);

$(window).resize(function () {
  changePadding($body, $header);
});

function changePadding($body, $header) {
  $body.css({
    paddingTop: $header.innerHeight() + 'px',
  });
}

AutoPadding.update = changePadding;
