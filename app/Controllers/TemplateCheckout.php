<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateCheckout extends Controller
{

    public function content()
    {
        return App::get_content( get_post()->ID, 1 );
	} 
    
    public function selection()
    {
        return self::getSelection();
    }

    public static function getSelection()
    {
        return new \EscSelection();
    }

    public static function newsletterField()
    {
        $selection = self::getSelection();

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
        return self::getSelection()->renderStartSelectionForm();
    }

    public static function endSelectionForm()
    {
        return self::getSelection()->renderEndSelectionForm();
    }    

}