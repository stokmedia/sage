<section id="section-{{ $section->id }}" class='section hero-banner {{ $section->classes ?? '' }}'>
    <div class='hero-wrap'>

        <div class='hero-background'>
            {{-- Image Tag --}}
            {!! $section->image_mobile !!}
            {!! $section->image !!}

            {{-- Play button --}}
            @if($section->video_tag)
                <div class="hero-play-btn js-hide-on-play js-playvideo {{ $section->play_button_class }}">
                    <button id="js-playvideo" class="btn btn-lg btn-icon btn-icon-lg btn-primary">
                        <img class="lazy" data-src="@asset('images/icon/icon-play.svg')" alt="">
                    </button>
                </div>
            @endif
        </div>

        {!! $section->video_tag !!}

        <div class='hero-text'>
            @if($section->show_title)
                @if($section->is_h1)
                    <h1 class='h1 hero-title'>{!! $section->title !!}</h1>
                @else
                    <h2 class='h1 hero-title'>{!! $section->title !!}</h2>
                @endif
            @endif

            @if($section->text)
                <div class='hero-subtitle'>{!! $section->text !!}</div>
            @endif

            @if($section->link)
                <div class='hero-btn'>

                    <a class="js-section-link" href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                        <button class="btn btn-outline-primary d-md-none"
                                type="button">{!! $section->link->title !!}</button>
                    </a>

                    <a class="js-section-link" href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                        <button class="btn btn-lg btn-outline-primary d-none d-md-inline-block"
                                type="button">{!! $section->link->title !!}</button>
                    </a>
                </div>
            @endif
        </div>

    </div>
</section>