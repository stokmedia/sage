@if ($section->title || $section->image || $section->text)
    <section id="section-{{ $section->id }}" class="section newsletter-section  {{ $section->classes ?? '' }}">
        <div class="container">
            <div class="newsletter row m-0">
                <div class="col-lg-6 col-md-6 col-sm-12 newsletter-cover lazy"
                    data-bg="url({{ $section->image }})">
                </div>

                {{-- Newsletter Content --}}
                @include( 'partials.newsletter-content', [
                    'section' => $section,
                    'formID' => 'js-section-newsletter-'. $section->id,
                    'sectionID' => $section->id,
                    'targetContainer' => '#section-'. $section->id,
                    'contentClass' => 'col-lg-6 col-md-6 col-sm-12 p-4 d-flex justify-content-center align-items-center newsletter-content',
                ] )
            </div>
        </div>
    </section>
@endif
