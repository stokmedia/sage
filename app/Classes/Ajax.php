<?php

namespace App;

class Ajax
{
    public function __construct()
    {
        //  Set global AJAX variable
        add_action( 'wp_head', [$this, 'set_ajax_url'] );

        add_action( 'wp_ajax_get_payment_method_form', [$this, 'get_payment_method_form'] );
        add_action( 'wp_ajax_nopriv_get_payment_method_form', [$this, 'get_payment_method_form'] );
    }

    public function set_ajax_url()
    {
        echo sprintf( "<script type='text/javascript'>/* <![CDATA[ */window.ajaxURL = '%s';/* ]]> */</script>", admin_url( 'admin-ajax.php' ) );
    }

    public function get_payment_method_form()
    {
        session_start();

        $paymentMethod = isset( $_GET['payment_method'] ) ? $_GET['payment_method'] : null;
        $_SESSION['payment_method'] = $paymentMethod;
        $html = null;

        if( strstr( $_SESSION['payment_method'], 'klarna' ) ) {

            ob_start();
            get_template_part( 'parts/shop/payments-selection' );
            $html = ob_get_contents();
            ob_end_clean();

        }

        header( 'Content-Type: text/json' );

        echo json_encode( array(
            'html' => $html,
        ) );	

        wp_die();
    }
}

new Ajax();