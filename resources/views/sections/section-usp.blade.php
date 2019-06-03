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

	<section class="section is-large">
		<div class="container">
			<div class="level">

			@foreach ($list as $item)
				<div class="level-item has-text-centered">
					<div class="level-head">
						<img src="{{ wp_get_attachment_image_url( $item['image'], 'full' ) }}">
						<p>{{ $item['title'] }}</p>
					</div>
					<div class="level-content">
						<p>{{ $item['text'] }}</p>
					</div>
				</div>
			@endforeach


			</div>
		</div>
	</section>

@endif

