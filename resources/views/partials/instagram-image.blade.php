@if (!empty($isMobile))
    <a href="{{ $image->link }}" class="col" target="_blank" rel="nofollow noreferrer">
        <figure class="tile">
            {!! !empty($isLarge) ? $image->image_large : $image->image_small !!}
        </figure>
    </a>
@else
    @if ($image)
        <a href="{{ $image->link }}" class="tile {{ $tileClass ?? '' }}" target="_blank" rel="nofollow noreferrer">
            {!! !empty($isLarge) ? $image->image_large : $image->image_small !!}
        </a>
    @endif
@endif