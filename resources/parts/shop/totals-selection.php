<?php

    use App\Controllers\App;

    // Translations
    $translations = App::getSiteTranslations()->selections;
    $totalLabel = !empty($translations['total_price']) ? $translations['total_price'] : 'Total';
    $discountLabel = !empty($translations['discount']) ? $translations['discount'] : 'Discount';
    $shippingLabel = !empty($translations['shipping']) ? $translations['shipping'] : 'Shipping';
    $handlingCostLabel = !empty($translations['handling_cost']) ? $translations['handling_cost'] : 'Handling Cost';
    $vatLabel = !empty($translations['vat']) ? $translations['vat'] : 'VAT';    
    $vatIncludedLabel = !empty($translations['vat_included']) ? $translations['vat_included'] : 'VAT included';
    $subTotalLabel = !empty($translations['sub_total']) ? $translations['sub_total'] : 'Sub total';

    // Classes
    $rowClass = !empty($rowClass) ? $rowClass : '';
    $labelClass = !empty($labelClass) ? $labelClass : '';
    $valueClass = !empty($valueClass) ? $valueClass : '';
    ?>

    <div class="summary-group">

        <?php if (!empty($selection['totals']['itemsTotalPrice'])) : ?>
            <div class="summary-item <?php echo $rowClass ?>">
                <div class="title <?php echo $labelClass ?>"><?php echo $totalLabel ?></div>
                <div class="price <?php echo $valueClass ?>">
                    <?php if (!empty($isHeaderCart)) :?>
                        <strong><?php echo $selection['totals']['itemsTotalPrice']; ?></strong>
                    <?php else : ?>
                        <?php echo $selection['totals']['itemsTotalPrice']; ?>
                    <?php endif ?>
                </div>
            </div>
        <?php endif ;?>

        <?php if (empty($isHeaderCart) && !empty($selection['totals']['totalDiscountPrice'])) : ?>
            <div class="summary-item <?php echo $rowClass ?>">
                <div class="title <?php echo $labelClass ?>"><?php echo $discountLabel ?></div>
                <div class="price <?php echo $valueClass ?>"><?php echo $selection['totals']['totalDiscountPrice']; ?></div>
            </div>
        <?php endif ;?>    

        <?php if (empty($isHeaderCart) && !empty($selection['totals']['shippingPriceAsNumber'])) : ?>
            <div class="summary-item <?php echo $rowClass ?>">
                <div class="title <?php echo $labelClass ?>"><?php echo $shippingLabel ?></div>
                <div class="price <?php echo $valueClass ?>"><?php echo $selection['totals']['shippingPrice']; ?></div>
            </div>
        <?php endif ;?>

        <?php if (empty($isHeaderCart) && !empty($selection['totals']['handlingCostPriceAsNumber'])) : ?>
            <div class="summary-item <?php echo $rowClass ?>">
                <div class="title <?php echo $labelClass ?>"><?php echo $handlingCostLabel ?></div>
                <div class="price <?php echo $valueClass ?>"><?php echo $selection['totals']['handlingCostPrice']; ?></div>
            </div>
        <?php endif ;?>  
        
        <?php if (empty($isHeaderCart) && !empty($selection['totals']['taxDeductedAsNumber'])) : ?>
            <div class="summary-item <?php echo $rowClass ?>">
                <div class="title <?php echo $labelClass ?>"><?php echo $vatLabel ?></div>
                <div class="price <?php echo $valueClass ?>"><?php echo $selection['totals']['taxDeducted']; ?></div>
            </div>
        <?php endif ;?>        

        <?php if (empty($isHeaderCart) && !empty($selection['totals']['grandTotalPriceTaxAsNumber'])) : ?>
            <div class="summary-item <?php echo $rowClass ?>">
                <div class="title <?php echo $labelClass ?>"><?php echo $vatIncludedLabel. ' ('. $selection['totals']['taxPercent'] .'%)'; ?></div>
                <div class="price <?php echo $valueClass ?>"><?php echo $selection['totals']['grandTotalPriceTax']; ?></div>
            </div>
        <?php endif ;?>        

        <?php if (empty($isHeaderCart) && !empty($selection['totals']['grandTotalPrice'])) : ?>
            <div class="summary-item <?php echo $rowClass ?>">
                <div class="title <?php echo $labelClass ?>"><?php echo $subTotalLabel ?></div>
                <div class="price <?php echo $valueClass ?>"><strong><?php echo $selection['totals']['grandTotalPrice']; ?></strong></div>
            </div>
        <?php endif ;?>
    </div>