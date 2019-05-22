@extends('layouts.app')

@section('content')
  @while (have_posts()) @php(the_post())

    @include('partials.product-item',
    	['product' => TaxonomySilk_category::get_product()]
    )
  
  @endwhile
@endsection

@debug