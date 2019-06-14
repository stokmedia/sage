@if ($section->hasContent)
    <section class="section fifty-fifty-section">
        <div class="row fifty-fifty mx-0 {{ ($section->orderClass == 'order-md-2') ? 'is-text-first' : 'is-image-first'  }}">

            <div class="fifty-fifty-item image col-md-6 p-0 order-1 {{ $section->orderClass }}" style="background: url(@asset('images/temp/category-banner.jpg')) no-repeat center/cover white;">
                {{-- <figure class="mb-0">
                    @if (!empty($section->image))
                        {!! $section->image !!}
                    @endif
                </figure> --}}
            </div>

            <div class="fifty-fifty-item bg-lightgreen d-flex align-items-center col-md-6 order-2 order-md-1 p-4 pb-5 p-md-0 {{ ($section->orderClass == 'order-md-2') ? 'justify-content-end' : 'justify-content-start'  }}">
                <div class="fifty-fifty-content">
                    @if ($section->title)
                        <h2>{{ $section->title }}</h2>
                    @endif

                    @if ($section->text)
                        <p>{{ $section->text }}</p>
                    @endif

                    @if ($section->link)
                        <a href="{{ $section->link->url ?? null }}"
                            class="btn btn-lg btn-primary d-block m-auto m-md-0"
                            role="button"
                            target="{{ $section->link->target ?? null }}">{{ $section->link->title ?? null }}</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif
