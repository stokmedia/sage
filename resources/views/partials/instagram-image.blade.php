@if ($isMobile)
    <div class="col">
        <figure class="tile">
            {!! $isLarge ? $image->image_large : $image->image_small !!}
        </figure>
    </div>
@else
    @if ($image)
        <div class="tile {{ $tileClass ?? '' }}">
            {!! $isLarge ? $image->image_large : $image->image_small !!}
        </div>
    @endif
@endif