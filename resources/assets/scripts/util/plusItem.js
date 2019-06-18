$.fn.plusItem = function () {
  let $btn = (this).find('.js-plus-item-btn'),
    $items = $(this).find('.item');

  if ($(window).innerWidth() > 991) {
    if ($items.length > 5) {
      $(this).find('.item:lt(5)').removeClass('d-none');
      $btn.removeClass('d-none');
    } else {
      $btn.addClass('d-none');
      $items.removeClass('d-none');
    }
  } else {
    if ($items.length > 4) {
      $(this).find('.item:lt(4)').removeClass('d-none');
      $btn.removeClass('d-none');
    } else {
      $btn.addClass('d-none');
      $items.removeClass('d-none');
    }
  }

  $btn.find('label').text('+' + $(this).find('.item.d-none').length);

  $btn.click(function() {
    $items.each(function() {
      setTimeout(() => {
        $(this).removeClass('d-none').fadeIn('slow');
      }, $(this).index() * 50);
    });
    $(this).addClass('d-none');
  });
};
