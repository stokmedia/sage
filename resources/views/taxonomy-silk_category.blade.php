@extends('layouts.app')

@section('content')

  @while (have_posts()) @php(the_post())
    {{ TaxonomySilk_category::title() }}
  @endwhile

@endsection