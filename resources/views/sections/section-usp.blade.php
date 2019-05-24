@php

// TODO: This is just copied from SysterP as a test
// Should be rewritten to clean Blade code

if( get_sub_field('usp') ) {
	$list = get_sub_field('usp');
} else {
	// Get Default USP from Sitewide
	$usp = get_field('default_usp', pll_current_language( 'slug' ) );
	$list = $usp['usp'];
}

if( $list ) :
@endphp
	<section class="section is-large">
		<div class="container">
			<div class="level">

			<?php foreach( $list as $item ) : ?>
				<div class="level-item has-text-centered">
					<div class="level-head">
						<img src="<?php echo wp_get_attachment_image_url( $item['image'], 'full' ); ?>">
						<p><?php echo $item['title']; ?></p>
					</div>
					<div class="level-content">
						<p><?php echo $item['text']; ?></p>
					</div>
				</div>
			<?php endforeach; ?>

			</div>
		</div>
	</section>
<?php endif; ?>

