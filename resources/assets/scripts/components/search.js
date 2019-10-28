let Search = {};

Search.init = function() {
  let searchOpen = $('.js-search-open');
  let searchClose = $('.js-search-close');
  let searchForm = $('.js-search-form');

  searchOpen.on( 'click', function() {
    searchForm.addClass('show');
    $('body').addClass('search-active');

    let targetEl = $( $(this).data('focus') );

    if (targetEl) {
      setTimeout(function() {
        targetEl.focus();
      }, 100);
    }
  });

  searchClose.click(function() {
    searchForm.removeClass('show');
    $('body').removeClass('search-active');
  });
}

Search.init();
