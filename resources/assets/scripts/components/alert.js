/**
 * Created by STOK on 13/06/2019.
 */
var Alert = {};

(function ( $ ) {
    var target = $( '#js-alert' ), image = target.find( '#js-alert-image' ), text = target.find( '#js-alert-text' ), button = target.find( '#js-alert-button' );

    Alert.show = function ( type, message, buttonText ) {
        if ( target.length === 0 ) {
            return;
        }

        var alertClass = target.data( 'classDefault' ) + ' ', buttonClass = button.data( 'classDefault' ), imageSource = '';

        switch ( type ) {
            case 'success':
                alertClass += target.data( 'classSuccess' );
                buttonClass = button.data( 'classSpecial' );
                imageSource = image.data( 'iconSuccess' );
                break;
            case 'warning':
                alertClass += target.data( 'classWarning' );
                imageSource = image.data( 'iconWarning' );
                break;
            case 'danger':
                alertClass += target.data( 'classDanger' );
                imageSource = image.data( 'iconDanger' );
                break;
            default:
                return;
        }

        target.attr( 'class', alertClass );
        image.attr( 'src', imageSource );
        text.html( message );
        button.text( buttonText );
        button.attr( 'class', buttonClass );
        target.slideDown( 'slow' );
    };

    $( function () {
        if ( target.length === 0 ) {
            return;
        }

        button.click( function () {
            target.slideUp( 'slow' );
        } );
    } )

})( jQuery );

window.Alert = Alert;

module.exports = Alert;