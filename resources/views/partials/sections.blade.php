@if (!empty($sections))
    @foreach($sections as $section)
        @include( 'sections.section-'.$section->acf_fc_layout )
    @endforeach
@endif

