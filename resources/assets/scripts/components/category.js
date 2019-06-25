silkProductLoad(1, true);
$('.silk-loadmore').click(function(){	
	var currentPage = $(this).data('currentpage');
	var nextPage = currentPage + 1;
	silkProductLoad(nextPage);
	$(this).data('currentpage', nextPage);
});

$('.silk-hash-clear').click(function() {
	history.pushState('', document.title, window.location.pathname + window.location.search);
	$('#silkFilterForm').trigger('reset');
	$('.silk-hash-orderby').parent('label').removeClass('active');
	silkProductLoad(1);
});

$('.silk-hash-filter').click(function() {
	var colorList = '';
	var sizeList = '';
	var categoryList = '';
	var orderBy = '';
	var comma = '';
	$('.silk-hash-filter').each(function() {
		var inputName = $(this).attr('name');
		var inputValue = $(this).val();		
		if($(this).prop('checked') == true) {
			switch(inputName) {
				case 'color':
					comma = '';
					if(colorList != '') {
						comma = ',';
					}
					colorList += comma+inputValue;
					break;
				case 'size':
					comma = '';
					if(sizeList != '') {
						comma = ',';
					}
					sizeList += comma+inputValue;
					break;
				case 'category':
					comma = '';
					if(categoryList != '') {
						comma = ',';
					}
					categoryList += comma+inputValue;
					break;
			}			
		}
	});

	// this will be use for Order By
	$('.silk-hash-orderby').parent('label').removeClass('active');
	var checkedOrderBy = $(this).children('input[type="radio"]').val();	
	if(checkedOrderBy != undefined) {	
		orderBy = checkedOrderBy;
	}

	var filterUrl = '';	
	if(categoryList != '') {
		filterUrl += 'category='+categoryList;
	} else {
		filterUrl += 'category='+$('.silk-loadmore').data('currentcategory');
	}
	if(colorList != '') {
		if(filterUrl != '') {
			filterUrl += '&';
		}
		filterUrl += 'color='+colorList;
	}
	if(sizeList != '') {
		if(filterUrl != '') {
			filterUrl += '&';
		}
		filterUrl += 'size='+sizeList;
	}
	if(orderBy != '') {
		if(filterUrl != '') {
			filterUrl += '&';
		}
		filterUrl += 'orderBy='+orderBy;
	}
	
	filterUrl = '#' + filterUrl;
	window.history.pushState('','Title',filterUrl);
	silkProductLoad(1, true);
});

function silkProductLoad(nextPage, isFilter='') {
	// this will set selected filter
	silkSetFilterUsingHash();
	
	var ajaxUrl = $('#silkFilterForm').data('ajaxurl');
	var currentCategory = $('.silk-loadmore').data('currentcategory');
	var hashQueryString = window.location.hash;
	hashQueryString = hashQueryString.replace('#', '&');
	if(hashQueryString != '' && isFilter == true) {
		ajaxUrl = ajaxUrl + hashQueryString;
	} else {
		ajaxUrl = ajaxUrl + '&category=' + currentCategory;
	}

	console.log(ajaxUrl + '&page=' + nextPage);
	$.ajax({
		url: ajaxUrl + '&page=' + nextPage,
		type: 'GET',
		beforeSend : function (  ) {
			$('.silk-loadmore').hide();
			$('.silk-spinner').removeClass('d-none');
		},
		error: function( data, textStatus ) {
			console.log(data);
			console.log(textStatus);
		},
		success: function( data, textStatus, jqXHR ) {
			if( data ) {
				$('.silk-loadmore').show();
				$('.silk-spinner').addClass('d-none');

				// Need to clear list if Filter is trigger
				if (nextPage == 1) {
					$('.silk-product-item-holder').html('');
				}

				var count = 1;
				var productItem = '';
				$( data ).each(function (key, val) {
					productItem = val.product_item;
					if(count <= 3 && nextPage == 1) {
						productItem = productItem.replace('is-small', 'is-big');
					}
					$('.silk-product-item-holder').append(productItem);
					count++;
				});

				var totalPage  = parseInt( jqXHR.getResponseHeader('X-WP-TotalPages'), 10 );
				if ( $('.silk-loadmore').data('currentpage') == totalPage || data.length==0 )
					$('.silk-loadmore').hide(); // if last page, remove the button
			} else {
				$('.silk-loadmore').hide(); // if no data, remove the button as well
			}
		},
	});
}

function silkSetFilterUsingHash() {
	var hash = window.location.hash;
	hash = hash.replace('#', '');
	var hashArr = hash.split('&');
	if(hashArr.length > 0) {
		$(hashArr).each(function(key, queryItem)
		{
			var queryItemArr = queryItem.split('=');
			// console.log(queryItemArr);
			if(queryItemArr.length > 0) {
				$(queryItemArr).each(function(queryItemKey, queryItemValue)
				{		
					var queryItemValueArr = queryItemValue.split(',');
					if(queryItemValueArr.length > 0) {
						$(queryItemValueArr).each(function(queryItemSelectedKey, queryItemSelectedValue)
						{
							if(queryItemSelectedValue != '') {
								var inputName = queryItemArr[0];
								// console.log(inputName+' '+queryItemSelectedValue);
								if(inputName == 'orderBy') {
									$('#orderby_'+queryItemSelectedValue).prop('checked','true').parent('label').addClass('active');
								} else {
									$('input[name="'+inputName+'"]:checkbox[value='+queryItemSelectedValue+']').prop('checked','true');
								}
							}
						});
					}
				});
			}
		});
	}
}