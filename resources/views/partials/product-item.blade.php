{{-- <h2><a href="{{ get_the_permalink() }}">{{ $post->post_title }}</a></h2>

<div>
	@include('partials.product-price', ['priceInfo' => $product->price] )
</div>

<div>
	<a href="{{ get_the_permalink() }}">@include('partials.product-images', ['images' => $product->images, 'size' => 'thumb', 'limit' => 2] )</a>
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
@if (!empty($product->display_price->is_sale))
	@php ($productClass = 'is-sale')
@endif

@if (!empty($isSlider))
	<div class="grid-slider-item">
		<a href="{{ get_the_permalink( $post ) }}" class="grid-item">
			<div class="product is-small p-0 {{ $productClass }}">
				<div class="product-wrapper bg-white d-block">
				<figure class="product-image">
					@include('partials.product-images', $itemParam )
				</figure>
				</div>
				<div class="product-details bg-white d-block text-center">
					<div class="product-name h4">{{ $post->post_title }}</div>
					@include('partials.product-price', ['priceInfo' => $product->display_price] )
				</div>
			</div>
		</a>
	</div>

@else
	@php ($productClass .= !empty($imageSize) ? ' '. $imageSize : ' is-small')

	<div class="product {{ $productClass }}">
		<a href="{{ get_the_permalink( $post ) }}" class="product-wrapper bg-white d-block">
			<figure class="product-image">
				@include('partials.product-images', $itemParam)
			</figure>
		</a>
		<a href="{{ get_the_permalink( $post ) }}" class="product-details bg-white d-block text-center">
			<div class="product-name h4">{{ $post->post_title }}</div>
			@include('partials.product-price', [ 'priceInfo' => $product->display_price] )
		</a>
	</div>
@endif