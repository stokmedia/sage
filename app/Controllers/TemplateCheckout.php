<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateCheckout extends Controller
{

    public function content()
    {
        return App::get_content( get_post()->ID, 1 );
    }

    public function checkoutHeader()
    {   
        $translations = App::getSiteTranslations()->selections;

        return (object) [
            'title' => get_post()->post_title,
            'shop_link' => $translations['shop_link'] ?? [] 
        ];
    }
    
    public function noSelectedItemContent()
    {   
        $content = get_field( 'no_items_content' );

        return (object) [
            'title' => !empty($content['title']) ? $content['title'] : '',
            'text' => !empty($content['text']) ? $content['text'] : '',
        ];
    }

    public function pageContent()
    {   
        return self::getPageContent();
    }    
    
    public function selection()
    {
        return self::selectionInit();
    }

    public function noItems()
    {
        $selectedData = \EscGeneral::getSelection();
        $selectedItems = (int) $selectedData['total_items'];

        return ( !\EscSelection::hasSelection() || $selectedItems === 0 );
    }

    public static function getPageContent()
    {
        return (object) [
            'additional_options' => get_field( 'options_content' ),
            'order' => get_field( 'order_content' ),
            'payment' => get_field( 'payment_content' ),
            'delivery' => get_field( 'delivery_content' )
        ];
    }

    public static function selectionInit()
    {
        return new \EscSelection();
    }    

    public static function newsletterField()
    {
        $selection = self::selectionInit();
        $translation = self::getPageContent();
        $text = !empty($translation->additional_options['signup_for_newsletter']) ? $translation->additional_options['signup_for_newsletter'] : '';

        $selection->checkFieldTemplate('
        <div class="custom-control custom-control-lg custom-checkbox">
            <input id="{id}" class="custom-control-input" type="{type}" name="{name}" value="{value}" {checked}>
            <label class="custom-control-label" for="{id}">
                <span>{content}</span>
            </label>
        </div>                
        ');

        return $selection->renderField( 'newsletter', $text );
    }

    public static function startSelectionForm()
    {
        return self::selectionInit()->renderStartSelectionForm();
    }

    public static function endSelectionForm()
    {
        return self::selectionInit()->renderEndSelectionForm();
    }    

}