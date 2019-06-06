{{-- TODO: Custom image size --}}

@if ($section->hasContent)
    <section class="section fifty-fifthy-section">
        <div class="row fifty-fifthy">
            
            <div class="fifty-fifthy-item col-md-6 p-0 order-1 {{ $section->orderClass }}">
                <figure class="mb-0">
                    @if (!empty($section->image))
                        {!! $section->image !!}
                    @endif
                </figure>
            </div>

            <div class="fifty-fifthy-item bg-lightgreen d-flex justify-content-center align-items-center col-md-6 order-2 order-md-1 p-4 pb-5 p-md-0">
                <div class="fifty-fifthy-content">
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
      