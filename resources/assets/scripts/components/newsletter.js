var Newsletter = {};

Newsletter.updateErrorHtml = function() {
	var formError = this.parentNode.querySelector('.js-form-error');

    if (!formError) {
        formError = this.parentNode.parentNode.querySelector('.js-form-error');
    }

    if (formError && formError.innerText.length > 0) {
		formError.innerText = null;
		this.classList.remove( Newsletter.elClasses.error );
    }
};

Newsletter.removeErrors = function (wrapperEl) {
	var inputs = wrapperEl.querySelectorAll( 'input' );

	if (inputs.length === 0) { 
        return; 
    }

	for (var i=0; i < inputs.length; i++) {
        inputs[i].addEventListener( 'focus', Newsletter.updateErrorHtml );
        inputs[i].addEventListener( 'click', Newsletter.updateErrorHtml );
	}    
};

Newsletter.validateEmail = function( email ) {
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return re.test( email );
};

Newsletter.formValidation = function( wrapperEl ) {
	var errorMessages = JSON.parse( wrapperEl.getAttribute( 'data-messages' ) );
	var email = wrapperEl.querySelector( 'input[name="esc_email"]' );
	var terms = wrapperEl.querySelector( 'input[name="accept_terms"]' );
	var errors = {};

	// Form validation
	if( email.value.length === 0 ) {
		errors.email = ( errorMessages && errorMessages.required_email ) ? errorMessages.required_email : 'E-mail field is required';
	} else if ( !Newsletter.validateEmail( email.value ) ) {
		errors.email = ( errorMessages && errorMessages.invalid_email ) ? errorMessages.invalid_email : 'Email address is invalid';
	}

	if( terms.checked === false ) {
		errors.terms = ( errorMessages && errorMessages.required_terms ) ? errorMessages.required_terms : 'Accept terms is required';
	}

	// Return false if no errors
	if (Object.keys(errors).length === 0) {
		return false;
    }

	// Display error
    for( var key in errors ) {
        var errorEl = wrapperEl.querySelector( '.js-form-error[data-field="'+ key +'"]' );
        if (errorEl) {
            errorEl.innerText = errors[ key ];
		}
		
		var elToAddClass = key === 'email' ? email : terms;
		elToAddClass.classList.add( Newsletter.elClasses.error );
    }

	return true;
};

Newsletter.formSubmit = function ( form ) {
    if ( !form ) { return; }
	
    var formData = new FormData( form );
	formData.append( 'ajax', 1 );
	
	var button = form.querySelector('button[type="submit"]');
	button.classList.add( Newsletter.elClasses.isLoading );	

    var hasErrors = Newsletter.formValidation( form );
    if (hasErrors) {
		return setTimeout( function () {
			button.classList.remove( Newsletter.elClasses.isLoading );
		}, 500 );		
    }
    
    var sendData = [];
	formData.forEach(function(value, key){
        sendData.push( encodeURIComponent(key) + '=' + encodeURIComponent(value) );	    
	});

	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
        if( xhr.readyState == XMLHttpRequest.DONE ) {
            if (xhr.status == 200) {
				var response = JSON.parse(xhr.response);
				
				if (response.success) {
					setTimeout( function () {
						button.classList.remove( Newsletter.elClasses.isLoading );	
						Newsletter.formSuccess(form);
					}, 1500 );
				}				
            }
        }
    };
    
    xhr.open( 'POST', '/', true );
    xhr.setRequestHeader( 'Accept', 'application/json, text/javascript, */*; q=0.01' );
    xhr.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded;charset=UTF-8' );
    xhr.send( sendData.join('&') );
};

Newsletter.formSuccess = function(form) {
	var targetContainer = document.querySelector(form.dataset.target);
	var successType = form.dataset.success_type;

	if (targetContainer && successType === 'success-message') {
		Newsletter.displaySuccessMessage( targetContainer, '.js-newsletter-success', '.js-newsletter-content' );
	} else if( successType === 'alert' ) {
		// Alert.setup( 'email', 'success', true );
		// Display alert message
	}

	Newsletter.resetForm(targetContainer, form, successType);	
};

Newsletter.resetForm = function( targetContainer, form, successType ) {
	form.querySelector( 'input[name="esc_email"]' ).value = '';
	form.querySelector( 'input[name="accept_terms"]' ).checked = false;	

	if (successType === 'success-message') {
		setTimeout( function () {				
			Newsletter.displaySuccessMessage( targetContainer, '.js-newsletter-content', '.js-newsletter-success' );
		}, 10000 );
	}
};

Newsletter.displaySuccessMessage = function( targetContainer, toDisplayClass, toHideClass  ) {
	if (!targetContainer) {
		return;
	}

	var contentToDisplay = targetContainer.querySelectorAll( toDisplayClass );
	var contentToHide = targetContainer.querySelectorAll( toHideClass );

	if( contentToHide.length > 0 ) {
		Array.prototype.forEach.call( contentToHide, function ( element ) {
			element.classList.add( Newsletter.elClasses.hidden );
		} );
	}	

	if( contentToDisplay.length > 0 ) {
		Array.prototype.forEach.call( contentToDisplay, function ( element ) {
			element.classList.remove( Newsletter.elClasses.hidden );
		} );
	}
}

Newsletter.init = function ( mainWrapper, modalId ) {

    var container = document.querySelectorAll( mainWrapper );
	if (container.length === 0) { 
        return; 
	}
	
	console.log( modalId );

	for (var i = 0; i < container.length; i++) {

        // Form submit
        var form = container[i];
        form.addEventListener( 'submit', function (e) {
            e.preventDefault();
            Newsletter.formSubmit( this );
        });

        // Remove Errors on input change
		Newsletter.removeErrors( form );
	}

	// Modal Newsletter
	// var modal = document.getElementById( modalId );

	// if( !modal ) { return; }

	// var cookieName = modal.getAttribute( 'data-cookie' );

	// if( !siteCookie.getCookie( cookieName ) ) {
	// 	// Show modal
	// 	setTimeout( function () {
	// 		modal.classList.add( 'is-active' );
	// 		siteCookie.setCookie( cookieName, true, 365 );
	// 	}, 5000 );	

	// 	// Close modal
	// 	// setTimeout( function () {
	// 	// 	modal.classList.remove( 'is-active' );
	// 	// }, 25000 );		
	// }

	// // Close modal
	// Helper.addListener( modal.querySelector( '.modal-close' ), 'click', function(e) {
	// 	e.preventDefault();
	// 	modal.classList.remove( 'is-active' );
	// });

};

document.addEventListener( 'DOMContentLoaded', function () {	
	Newsletter.elClasses = {
		hidden: 'd-none',
		isLoading: 'is-loading',
		isDisabled: 'is-disabled',
		error: 'is-invalid',
	};

	Newsletter.init( '.js-newsletter', 'js-newsletter-modal' );
} );