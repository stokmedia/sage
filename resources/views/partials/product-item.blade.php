{{-- <h2><a href="{{ get_the_permalink() }}">{{ $post->post_title }}</a></h2>

<div>
	@include('partials.product-price', ['priceInfo' => $product->price] )
</div>

<div>
	<a href="{{ get_the_permalink() }}">@include('partials.product-images', ['images' => $product->images, 'size' => 'thumb', 'limit' => 2] )</a>
</div> --}}

<div class="product {{ !empty($count) && $count <= 3 ? ' is-big' : 'is-small' }}">
	<a href="{{ get_the_permalink( $post ) }}" class="product-wrapper bg-white d-block">
	<figure class="product-image">
		@include('partials.product-images', [
			'images' => $product->images, 
			'size' => 'standard', 
			'limit' => 2, 
			'class' => 'visible-on-hover', 
			'img_pos_to_add_class' => 2
		] )
	</figure>
	</a>
	<a href="#" class="product-details bg-white d-block text-center">
		<div class="product-name h4">{{ $post->post_title }}</div>
		@include('partials.product-price', ['priceInfo' => $product->price] )
	</a>
</div>