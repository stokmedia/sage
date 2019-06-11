<div class="product-price">
	@if ($priceInfo['success'])
		@php
		$priceAsNumber = !empty( $priceInfo['info']['price'] ) ? $priceInfo['info']['price'] : '';
		$priceBeforeAsNumber = !empty( $priceInfo['info']['priceBeforeDiscount'] ) ? $priceInfo['info']['priceBeforeDiscount'] : '';	
		@endphp

		@if ($priceInfo['info']['showAsOnSale'] || ($priceBeforeAsNumber && $priceBeforeAsNumber > $priceAsNumber ))
			<span>{{ $priceBeforeAsNumber }}</span>
			{{ $priceAsNumber }}
		@else
			<span>{{ $priceAsNumber }}</span>
		@endif
	@else
		<span>N/A</span>
	@endif
</div>