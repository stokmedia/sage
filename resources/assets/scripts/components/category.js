$('.silk-loadmore').click(function(){
	var ajaxUrl = $('#silkFilterForm').data('ajaxurl');
	var nextPage = $(this).data('currentpage') + 1;
	$('.silk-loadmore').data('currentpage', nextPage);
	// console.log(ajaxUrl + '&page=' + nextPage);
	$.ajax({
		url: ajaxUrl + '&page=' + nextPage,
		type: 'GET',
		beforeSend : function (  ) {
			$('.silk-loadmore').hide();
			$('.silk-spinner').show();
		},
		error: function( data, textStatus ) {
			console.log(data);
			console.log(textStatus);
		},
		success: function( data, textStatus, jqXHR ) {
			if( data ) {
				$('.silk-loadmore').show();
				$('.silk-spinner').hide();

				$( data ).each(function (key, val) {
					$('.silk-product-item-holder').append(val.product_item);
				});

				var totalPage  = parseInt( jqXHR.getResponseHeader('X-WP-TotalPages'), 10 );
				if ( $('.silk-loadmore').data('currentpage') == totalPage )
					$('.silk-loadmore').remove(); // if last page, remove the button
			} else {
				$('.silk-loadmore').remove(); // if no data, remove the button as well
			}
		},
	});
});