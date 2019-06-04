{{-- TODO: Image (Alt, srcset) --}}
@if (
    ($section->section_title && $section->show_section_title)
    || $section->text
    || $section->link
    || $section->image
)
    <section class="section fifty-fifthy-section">
        <div class="row fifty-fifthy">
            
            <div class="fifty-fifthy-item col-md-6 p-0 order-1 {{ $section->layout === 'image_first' ? 'order-md-1' : 'order-md-2' }}">
                <figure class="mb-0">
                    @if (!empty($section->image))
                        <img src="{{ wp_get_attachment_image_url( $section->image->ID, 'full' ) }}" alt="" srcset="">
                    @endif
                </figure>
            </div>
            <div class="fifty-fifthy-item bg-lightgreen d-flex justify-content-center align-items-center col-md-6 order-2 order-md-1 p-4 pb-5 p-md-0">
                <div class="fifty-fifthy-content">
                    @if ($section->section_title && $section->show_section_title)
                        <h2>{{ $section->section_title }}</h2>
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
      