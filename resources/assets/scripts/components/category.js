document.addEventListener( 'DOMContentLoaded', function () {	
	// alert('test');
	
} );

$('.silk-loadmore').click(function(){
	var ajaxUrl = $('#silkFilterForm').data('ajaxurl');
	console.log(ajaxUrl);
	$.ajax({
		url: ajaxUrl,
		type: 'GET',
		// beforeSend : function (  ) {
			// button.text('Loading...'); // change the button text, you can also add a preloader image
		// },
		success: function( data ) {
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