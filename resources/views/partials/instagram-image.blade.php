@if (!empty($isMobile))
    <div class="col">
        <figure class="tile">
            {!! !empty($isLarge) ? $image->image_large : $image->image_small !!}
        </figure>
    </div>
@else
    @if ($image)
        <div class="tile {{ $tileClass ?? '' }}">
            {!! !empty($isLarge) ? $image->image_large : $image->image_small !!}
        </div>
    @endif
@endif