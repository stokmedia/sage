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
        return (object) [
            'title' => 'No item added',
            'preamble' => 'In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper',
        ];
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

    public static function selectionInit()
    {
        return new \EscSelection();
    }    

    public static function newsletterField()
    {
        $selection = self::selectionInit();

        $selection->checkFieldTemplate('
        <div class="custom-control custom-control-lg custom-checkbox">
            <input id="{id}" class="custom-control-input" type="{type}" name="{name}" value="{value}" {checked}>
            <label class="custom-control-label" for="{id}">
                <span>{content}</span>
            </label>
        </div>                
        ');

        return $selection->renderField( 'newsletter', 'Få vårt nyhetsbrev - Godkänn villkoren och GDPR kraven…' );
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