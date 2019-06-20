document.addEventListener( 'DOMContentLoaded', function () {	
	// alert('test');
	
} );

$('.silk-loadmore').click(function(){
	// http://localhost/wp-skhoop/wp-json/wp/v2/products?filters%5Bcategory%5D%5B%5D=bottoms&per_page=10&page=2
	var ajaxUrl = $('#silkFilterForm').data('baseurl');
	ajaxUrl += '/wp-json/wp/v2/products';
	var currentPage = 2;
	var query = '?per_page=10&page=' + currentPage;
	console.log(ajaxUrl + query);
	$.ajax({
		url: ajaxUrl + query,
		type: 'GET',
		// beforeSend : function (  ) {
			// button.text('Loading...'); // change the button text, you can also add a preloader image
		// },
		success: function( data ) {
			console.log('taz');
			console.log(data);
			if( data ) { 
				// button.text( 'More posts' ).prev().before(data); // insert new posts
				// currentPage++;

				// if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page ) 
					// button.remove(); // if last page, remove the button

				// you can also fire the "post-load" event here if you use a plugin that requires it
				// $( document.body ).trigger( 'post-load' );
			} else {
				// button.remove(); // if no data, remove the button as well
			}
		},
	});
});