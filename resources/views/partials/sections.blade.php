@while(have_rows( 'sections' )) @php the_row(); @endphp
  @include('sections.section-'.get_row_layout())
@endwhile