var Filter = {};

Filter.toggle = function() {
  var openFilter = $('.js-filter-open');
  var closeFilter = $('.js-filter-close');
  var openFilterButtons = $('.filter-open');
  var closeFilterButtons = $('.filter-close');
  var collapseFilter = $('.js-filter-collapse');

  openFilter.click(function () {
    collapseFilter.show();
    openFilterButtons.hide();
    closeFilterButtons.show();
    $('body').addClass('filter-is-open');
  });

  closeFilter.click(function () {
    collapseFilter.hide();
    closeFilterButtons.hide();
    openFilterButtons.show();
    $('body').removeClass('filter-is-open');
  });
};

Filter.accordion = function() {
  var toggleAccordion = $('.js-accordion-toggle');
  var accordionBody = $('.js-accordion-body');

  toggleAccordion.click(function() {
    var thisAccordion = $(this);
    if (thisAccordion.hasClass('is-open')) {
      thisAccordion.siblings(accordionBody).removeClass('is-open');
      thisAccordion.removeClass('is-open');
    } else {
      thisAccordion.siblings(accordionBody).addClass('is-open');
      thisAccordion.addClass('is-open');
    }
  });
};

Filter.toggle();
Filter.accordion();