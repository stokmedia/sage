{{-- <h2><a href="{{ get_the_permalink() }}">{{ $post->post_title }}</a></h2>

<div>
	@include('partials.product-price', ['priceInfo' => $product->price] )
</div>

<div>
	<a href="{{ get_the_permalink() }}">@include('partials.product-images', ['images' => $product->images, 'size' => 'thumb', 'limit' => 2] )</a>
</div> --}}

<div class="grid-slider-item">
	<a href="{{ get_the_permalink( $post ) }}" class="grid-item">
	<div class="product is-small p-0">
		<div class="product-wrapper bg-white d-block">
		<figure class="product-image">
			@include('partials.product-images', [
				'images' => $product->images, 
				'size' => 'standard', 
				'limit' => 2, 
				'class' => 'visible-on-hover', 
				'img_pos_to_add_class' => 2
			] )
		</figure>
		</div>
		<div class="product-details bg-white d-block text-center">
			<div class="product-name h4">{{ $post->post_title }}</div>
			{{-- <div class="product-price"><span>750 kr</span></div> --}}
			@include('partials.product-price', ['priceInfo' => $product->price] )
		</div>
	</div>
	</a>
</div>