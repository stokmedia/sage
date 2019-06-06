@if (!empty($section->usp))
	<div class="trust-bar">
		<div class="container">
			
			@foreach ($section->usp as $item)
				<div class="trust-item">

					@if ($item->image)
						<div class="icon-block">
							<img width="40" height="40" src="{{ wp_get_attachment_image_url( $item->image ) }}" class="" alt=""/>
						</div>
					@endif

					<div class="info">
						@if ($item->title)
							<h4 class="h4">{{ $item->title }}</h4>
						@endif

						@if ($item->text)
							<div class="small">{{ $item->text }}</div>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endif

