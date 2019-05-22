@foreach($images[$size] as $image)

	<img src="{{ $image['url'] }}" />

    @if ($loop->first)
    	{{-- TODO: Maybe add the second image as a hover version of the first? --}}
        @break
    @endif
@endforeach