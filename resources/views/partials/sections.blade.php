@if (!empty($content) && is_array($content))

    @php
    
    // Initializes hasH1 value
    $hasH1 = false;

    // Get all section IDs
    $initialSectionID = array_column( $content, 'id' );

    // Get the first section id
    $initialSectionID = reset($initialSectionID);

    @endphp

    @foreach($content as $section) 

        {{-- Enable is_h1 to the current section if the page has still no h1 --}}
        @if (!empty($section->title) && $hasH1 === false && $initialSectionID === 1)

            @php 
            $section->is_h1 = true;
            $hasH1 = true;
            @endphp

        @else

            @php $section->is_h1 = false @endphp

        @endif

        @includeIf( 'sections.section-'.$section->acf_fc_layout )

    @endforeach

@endif