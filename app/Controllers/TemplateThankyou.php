<?php

namespace App\Controllers;

use Sober\Controller\Controller;

include_once( \Esc::directory() . '/modules/success.php' );

class TemplateThankyou extends Controller
{

    public function content()
    {
        return App::get_content( get_post()->ID, 1 );
    }
    
    public function pageInfo()
    {
        $success = new \EscSuccess();
        $receiptInfo = $success->getReceiptInfo();   
        
        if( isset($receiptInfo['code']) && $receiptInfo['code'] === 'COUNTRY_MISMATCH' ) {
            $content = get_field( 'country_mismatch' );

        } elseif( isset($receiptInfo['errors']) ) {
            $content = get_field( 'error_has_occurred' );
            
        } elseif( isset($receiptInfo['order']) ) {
            $content = get_field( 'successful_checkout' );
        }
        
        return (object) [
            'header' => $content,
            'has_header' => !empty($content),
            'product_label' => get_field( 'product_label' ),
            'summary_label' => get_field( 'summary_label' ),
            'summary_text' => get_field( 'summary_text' ),
            'info' => $receiptInfo
        ];
    }    
}