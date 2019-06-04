@php

// TODO: This is just copied from SysterP as a test
// Should be rewritten to clean Blade code

if( get_sub_field('usp') ) {
	$list = get_sub_field('usp');
} else {
	// Get Default USP from Sitewide
	$usp = get_field('default_usp', App::currentLang() );
	$list = $usp['usp'];
}
@endphp

@if ($list)
	<div class="trust-bar">
		<div class="container">
			
			@foreach ($list as $item)
				<div class="trust-item">

					@if ($item['image'])
						<img class="icon-block" src="{{ wp_get_attachment_image_url( $item['image'] ) }}">
					@endif

					<div class="info">
						@if ($item['title'])
							<h4 class="h4">{{ $item['title'] }}</h4>
						@endif

						@if ($item['text'])
							<div class="small">{{ $item['text'] }}</div>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endif

