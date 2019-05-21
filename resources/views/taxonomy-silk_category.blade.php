@extends('layouts.app')

@section('content')

  @while (have_posts()) @php(the_post())
    
    {{ TaxonomySilk_category::title() }}
    
    @foreach($product_images as $image)
     {!! $image !!}<br/>
    @endforeach

  @endwhile

@endsection