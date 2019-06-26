@if (!empty($images[$size]))
	@foreach($images[$size] as $image)
	    @if ($loop->index >= $limit)
	        @break
	    @endif
		<img class="{{ ($loop->index+1 === $img_pos_to_add_class) ? $class.' lazy' : 'lazy' }}" data-src="{{ $image['url'] }}" />
	@endforeach
@endif