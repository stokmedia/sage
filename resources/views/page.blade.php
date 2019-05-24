@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
  @while(have_rows( 'sections' )) @php the_row(); @endphp
    @include('sections.section-'.get_row_layout())
  @endwhile
  @debug
@endsection
