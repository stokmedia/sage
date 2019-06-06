{{-- @if (!empty($sections))
    @foreach($sections as $section)
        @include( 'sections.section-'.$section->acf_fc_layout )
    @endforeach
@endif --}}

{{-- <pre>{{ var_dump( $content ) }}</pre> --}}

@if (!empty($content))
    @foreach($content as $section)
        {{-- <pre>{{ var_dump( $section ) }}</pre> --}}
        {{-- {{ 'sections.section-'.$section->acf_fc_layout  }} --}}
        @includeIf( 'sections.section-'.$section->acf_fc_layout )
    @endforeach
@endif

