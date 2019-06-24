<?php

    use App\Controllers\App;

    // Translations
    $translations = App::getSiteTranslations()->selections;
    $totalLabel = !empty($translations['total_price']) ? $translations['total_price'] : '';
    $vatLabel = !empty($translations['vat']) ? $translations['vat'] : '';
    $shippingLabel = !empty($translations['shipping']) ? $translations['shipping'] : '';
    $subTotalLabel = !empty($translations['sub_total']) ? $translations['sub_total'] : '';

    // Classes
    $rowClass = !empty($rowClass) ? $rowClass : '';
    $labelClass = !empty($labelClass) ? $labelClass : '';
    $valueClass = !empty($valueClass) ? $valueClass : '';
    ?>

    <div class="summary-group">
        <div class="summary-item <?php echo $rowClass ?>">
            <div class="title <?php echo $labelClass ?>"><?php echo $totalLabel ?></div>
            <div class="price <?php echo $valueClass ?>"><?php echo $selection['totals']['itemsTotalPrice']; ?></div>
        </div>

        <?php if ($selection['totals']['taxDeductedAsNumber']) : ?>
            <div class="summary-item <?php echo $rowClass ?>">
                <div class="title <?php echo $labelClass ?>"><?php echo $vatLabel ?></div>
                <div class="price <?php echo $valueClass ?>"><?php echo $selection['totals']['taxDeducted']; ?></div>
            </div>
        <?php endif ;?>

        <div class="summary-item <?php echo $rowClass ?>">
            <div class="title <?php echo $labelClass ?>"><?php echo $shippingLabel ?></div>
            <div class="price <?php echo $valueClass ?>"><?php echo $selection['totals']['shippingPrice']; ?></div>
        </div>

        <div class="summary-item <?php echo $rowClass ?>">
            <div class="title <?php echo $labelClass ?>"><?php echo $subTotalLabel ?></div>
            <div class="price <?php echo $valueClass ?>"><strong><?php echo $selection['totals']['grandTotalPrice']; ?></strong></div>
        </div>
    </div>