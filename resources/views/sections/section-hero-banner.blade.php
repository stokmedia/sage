@dump($section)
{{-- <section class='section-hero-banner'>
    <div class='hero-wrap'>

        <div class='hero-background'>
            {!! $section->image !!}

            @if ($section->video_url)
                <div class='hero-play-btn js-hide-on-play js-playvideo'>
                    <button id='js-playvideo' class='btn btn-lg btn-icon btn-icon-lg btn-primary'>
                        <img src="@asset('images/icon/icon-play.svg')" alt="">
                    </button>
                </div>
            @endif
        </div>

        {!! $section->video !!}

        @if ($section->title || $section->text || $section->link)
            <div class='hero-text'>
                @if ($section->title)
                    {!! App::renderTitle( $section->title, 'h1 hero-title', $section->is_h1 ) !!}
                @endif

                @if ($section->text)
                    <div class='hero-subtitle'>{!! $section->text !!}</div>
                @endif

                @if ($section->link)
                    <div class='hero-btn'>
                        <a href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                            <button class="btn btn-outline-primary d-md-none" type="button">{{ $section->link->title }}</button>
                        </a>
                        <a href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                            <button class="btn btn-lg btn-outline-primary d-none d-md-inline-block" type="button">{{ $section->link->title }}</button>
                        </a>
                    </div>
                @endif
            </div>
        @endif

    </div>
</section> --}}


{{-- Original Markup --}}

<section class='section hero-banner'>
    <div class='hero-wrap'>

        <div class='hero-background'>
            <!-- Image Tag -->
            {{--<img class='hero-image' src="@asset('images/temp/hero_banner.png')" alt="">--}}
            {!! $section->image !!}
            {!! $section->image_mobile !!}

            <!-- Play button -->
            <!-- <div class='hero-play-btn js-hide-on-play js-playvideo'>
                <button id='js-playvideo' class='btn btn-lg btn-icon btn-icon-lg btn-primary'>
                    <img src="@asset('images/icon/icon-play.svg')" alt="">
                </button>
            </div> -->
        </div>

        <!-- Video Tag -->
        <!-- <video class='hero-video js-video-tag' autoplay='autoplay' muted='muted' loop='loop' playsinline='playsinline'>
            <source src="http://techslides.com/demos/sample-videos/small.mp4" type="video/mp4">
        </video> -->
        <!-- Iframe Tag -->
        <!-- Vimeo -->
        <!-- <iframe data-autoplayMobile='1' data-autoplay='1' class='hero-iframe-video is-vimeo js-video-iframe is-video-hidden' style='z-index:1;opacity:0.000001;background-color:black'; data-source='vimeo' src="https://player.vimeo.com/external/323460867.hd.mp4?s=6386bff00f0b9898e3fb3b84182057fdbcd3117d&profile_id=175" frameborder="0" allow="autoplay; fullscreen"></iframe> -->
        <!-- Youtube -->
        <!-- <iframe id="video-iframe-ScMzIvxBSi4" data-autoplayMobile='1' data-autoplay='' class='hero-iframe-video is-yt js-video-iframe' style='z-index:10;opacity:0.000001;background-color:black'; data-source='youtube' src="https://www.youtube.com/embed/ScMzIvxBSi4?rel=0&showinfo=0&controls=0&enablejsapi=1" frameborder="0" allow="autoplay; fullscreen"></iframe> -->


        <div class='hero-text'>
            @if($section->show_title)
                @if($section->is_h1)
                    <h1 class='h1 hero-title'>{{ $section->title }}</h1>
                @else
                    <h2 class='h1 hero-title'>{{ $section->title }}</h2>
                @endif
            @endif

            @if($section->text)
                <div class='hero-subtitle'>{{ $section->text }}</div>
            @endif

            @if($section->link)
                <div class='hero-btn'>

                    <a href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                        <button class="btn btn-outline-primary d-md-none"
                                type="button">{{ $section->link->title }}</button>
                    </a>

                    <a href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                        <button class="btn btn-lg btn-outline-primary d-none d-md-inline-block"
                                type="button">{{ $section->link->title }}</button>
                    </a>
                </div>
            @endif
        </div>

    </div>
</section>