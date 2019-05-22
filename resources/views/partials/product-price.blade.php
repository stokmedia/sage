{{-- TODO: This is copied from SysterP, Replace syntax below with Blade syntax --}}

@php
if( $priceInfo['success'] ) {
	$priceAsNumber = !empty( $priceInfo['info']['price'] ) ? $priceInfo['info']['price'] : '';
	$priceBeforeAsNumber = !empty( $priceInfo['info']['priceBeforeDiscount'] ) ? $priceInfo['info']['priceBeforeDiscount'] : '';

	if( $priceInfo['info']['showAsOnSale'] || ($priceBeforeAsNumber && $priceBeforeAsNumber > $priceAsNumber ) ) { // On Sale
		echo '<strong class="price is-sale">'. $priceAsNumber .'</strong>';
		echo '<span class="old-price">'. $priceBeforeAsNumber.'</span>'; // Original Price
	} else {
		echo '<span class="price">'. $priceAsNumber .'</span>';
	}

} else {
		echo '<span class="price not-available">N/A</span>';
}
@endphp