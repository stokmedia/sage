$.fn.resellersTable = function () {
  this.each(function () {
    let $tableRows = $(this).find(`.resellers-table-row:gt(${($(this).data('limit') - 1)})`);
    let $btnMore = $(this).find('.js-more');

    // On window load
    if ($(window).innerWidth() < 768) {
      $tableRows.removeClass('d-md-table-row').addClass('d-none');
    } else {
      $tableRows.removeClass('d-none').addClass('d-md-table-row');
    }

    // On window resize
    $(window).resize(function () {
      if ($(window).innerWidth() < 768) {
        $tableRows.removeClass('d-md-table-row').addClass('d-none');
      } else {
        $tableRows.removeClass('d-none').addClass('d-md-table-row');
      }
    });

    // Button more
    $btnMore.click(function () {
      $tableRows.each(function () {
        setTimeout(() => {
          $(this).removeClass('d-none').addClass('d-md-table-row').fadeIn('slow');
        }, $(this).index() * 50);
      });
      $btnMore.fadeOut();
    });
  });
};

var $sectionResellers = $('.section.resellers');

$('.resellers .fifty-fifty:eq(0) .btn').on('click', function (e) {
  e.preventDefault();

  $('html, body').animate({
    scrollTop: ($sectionResellers.offset().top - $('.js-header').height()) - parseInt($('html').css('margin-top')) + 'px',
  });
});
