<?php

    include_once(Esc::directory() . '/modules/selection.php');

    // Translations
    $page_content   = TemplateCheckout::getPageContent();
    $voucherTitle	= !empty($page_content->order['voucher']) ? $page_content->order['voucher'] : '';
	$addVoucherBtn 	= !empty($page_content->order['add_voucher']) ? $page_content->order['add_voucher'] : '';
    $removeVoucher 	= !empty($page_content->order['remove_voucher']) ? $page_content->order['remove_voucher'] : '';
    $voucherPlaceholder = !empty($page_content->order['voucher_placeholder']) ? $page_content->order['voucher_placeholder'] : '';
	
    if (class_exists('EscSelection')) :
        
		$selection = new EscSelection();
		$selection->submitFieldTemplate( '<button class="btn btn-sm btn-primary" type="button" name="{name}" value="{value}">{content}</button>' );
		$selection->inputFieldTemplate( '<input id="{id}" type="{type}" name="{name}" class="form-control form-control-md {class_0}" placeholder="'.$voucherPlaceholder.'">' );
        $hasError = isset($_SESSION['esc_store']['voucher']) && !$_SESSION['esc_store']['voucher']['success'];
        $vouchers = EscSelection::getVouchers();
        $inputClass = $hasError ? 'is-invalid' : '';
        

		if( EscSelection::isVoucherSet() ) { 
			echo '<ul class="list-unstyled mt-3">';
        }
        
		foreach ($vouchers as $voucher) :
            if( strpos($voucher['voucher'], 'drkn-unlock:') !== false ) { continue; }

            $selection->submitFieldTemplate( '<button class="close" type="button" name="{name}" value="{value}">&times;</button>' );
			?>
                <li class="d-flex justify-content-between py-1">
                    <span><div class="voucher-fields-code"><strong><?php echo $voucherTitle; ?></strong> <?php echo $voucher['voucher']; ?></div></span>
                    <?php $selection->renderField( 'remove_voucher_' . 'Stok30', $removeVoucher, false, array()); ?>
                </li>              
            <?php
            
        endforeach;

		if( EscSelection::isVoucherSet() ) { 
			echo '</ul>';
		}        

        if (count($vouchers) < 2) :
            ?>

            <div class="form-group">
                <?php $selection->renderField( 'voucher', '', false, array( $inputClass ) ); ?>
                <?php EscGeneral::renderVoucherErrors('<div class="invalid-feedback">{content}</div>'); ?>
            </div>

            <?php 
            $selection->submitFieldTemplate( '<button class="btn btn-sm btn-primary" type="button" name="{name}" value="{value}">{content}</button>' );
            $selection->renderField( 'submit_voucher', $addVoucherBtn, false, array() ); 
            ?>
            
            <?php
        
		endif;
	endif;