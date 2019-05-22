@extends('layouts.app')

@section('content')

  @while (have_posts()) @php(the_post())
    
    @include('partials.product-item')

  @endwhile

@endsection