<h2>{{ $post->post_title }}</h2>

<div>
	@include('partials.product-price', ['priceInfo' => $product->price] )
</div>

<div>

	@include('partials.product-images', ['images' => $product->images, 'size' => 'thumb'] )

</div>