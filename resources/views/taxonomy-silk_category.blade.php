@extends('layouts.app')

@section('content')

  {{-- Hero banner --}}
  @if ($hero_banner->image || $hero_banner->image_mobile)
    @include('sections.section-category-banner')
  @endif

  @while (have_posts()) @php(the_post())

    @include('partials.product-item',
    	['product' => TaxonomySilk_category::get_product()]
    )
  
  @endwhile
@endsection

{{-- @debug --}}