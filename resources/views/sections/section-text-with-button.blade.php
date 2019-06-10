@if ($section->has_content )
    <section class="section text-button">
        <div class="container">
            @if ($section->title)
                <div class="title h2 text-center text-lg-left">{{ $section->title }}</div>
            @endif

            @if ($section->preamble)
                <div class="preamble text-center text-lg-left">
                    {!! $section->preamble !!}
                </div>
            @endif

            @if ($section->content)
                <div class="content clearfix">
                    {!! $section->content !!}
                </div>
            @endif

            @if ($section->link)
                <div class="buttons text-center text-lg-left">
                    <a href="{{ $section->link->url }}" target="{{ $section->link->target }}">
                        <button class="btn btn-lg btn-outline-primary" type="button">{{ $section->link->title }}</button>
                    </a>
                </div>
            @endif
        </div>
    </section>
@endif