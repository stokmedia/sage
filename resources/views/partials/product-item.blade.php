{{-- <h2><a href="{{ get_the_permalink( get_the_ID() ) }}">{{ $post->post_title }}</a></h2>

<div>
	@include('partials.product-price', ['priceInfo' => $product->price] )
</div>

<div>
	<a href="{{ get_the_permalink( get_the_ID() ) }}">@include('partials.product-images', ['images' => $product->images, 'size' => 'thumb', 'limit' => 2] )</a>
</div> --}}

@php (
	$itemParam = [
		'images' => $product->images, 
		'size' => 'standard', 
		'limit' => 2, 
		'class' => 'visible-on-hover', 
		'img_pos_to_add_class' => 2
	]
)

@php ($productClass = '')
@php ($status = '')

@if (!empty($product->display_price->is_sale))

	@php ($productClass = 'is-sale')
	@php ($status = App::getSiteTranslations()->selected_product['product_states']['sale'] ?? '')

@elseif (!empty($product->is_sold_out))

	@php ($productClass = 'is-oos')
	@php ($status = App::getSiteTranslations()->selected_product['product_states']['out_of_stock'] ?? '')

@endif

@php ($productTitle = trim($post->post_title. ' ' .($product->product_meta->variantName ?: '' )))

@if (!empty($isSlider))
	<div class="grid-slider-item">
		<a href="{{ get_the_permalink( get_the_ID() ) }}" class="grid-item">
			<div class="product is-small p-0 {{ $productClass }}">
				<div class="product-wrapper bg-white d-block">

					@if (!empty($status))
					<div class="product-status text-center"><span>{{ $status }}</span></div>
					@endif

					<figure class="product-image">
						@include('partials.product-images', $itemParam )
					</figure>
				</div>
				<div class="product-details bg-white d-block text-center">
					<div class="product-name h4">{{ $productTitle }}</div>
					@include('partials.product-price', ['priceInfo' => $product->display_price] )
				</div>
			</div>
		</a>
	</div>

@else
	@php ($productClass .= !empty($imageSize) ? ' '. $imageSize : ' is-small')

	<div class="product {{ $productClass }}">
		<a href="{{ get_the_permalink( get_the_ID() ) }}" class="product-wrapper bg-white d-block">

			@if (!empty($status))
			<div class="product-status text-center"><span>{{ $status }}</span></div>
			@endif

			<figure class="product-image">
				@include('partials.product-images', $itemParam)
			</figure>
		</a>
		<a href="{{ get_the_permalink( get_the_ID() ) }}" class="product-details bg-white d-block text-center">
			<div class="product-name h4">{{ $productTitle }}</div>
			@include('partials.product-price', [ 'priceInfo' => $product->display_price] )
		</a>
	</div>
@endif