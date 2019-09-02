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

        {{-- Check if current section has title --}}
        @php $hasTitle = (!empty($section->section_title) && !empty($section->show_section_title)) || !empty($section->title) @endphp 

        {{-- Enable is_h1 to the current section if the page has still no h1 --}}
        @if ($hasTitle && $hasH1 === false && $initialSectionID === 1)

            @php 
            $section->is_h1 = true;
            $hasH1 = true;
            @endphp

        @else

            @php $section->is_h1 = false @endphp

        @endif

        @includeIf( 'sections.section-'.$section->acf_fc_layout )

    @endforeach

    {{-- Add hidden H1 if current page has no H1 tag --}}
    @if ($hasH1 === false && $initialSectionID === 1)
        <h1 class="mb-0" style="position: absolute; font-size: 0; height: 0%; width: 0%;">{!! $page_title !!}</h1>
    @endif

@endif

