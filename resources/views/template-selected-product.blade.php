{{--
  Template Name: Selected Product Template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

<section class="section selected-product">
  <div class="container">
    <div class="row">
      <div class="selected-product-preview col-md-6 bg-lightgreen">
        <div class="selected-product-slider">
          <img src="@asset('images/temp/selected-product-view.png')" alt="" srcset="">
        </div>
      </div>
      <div class="selected-product-options col-md-6 bg-lightgreen">
        <img src="@asset('images/temp/selected-product-view.png')" alt="" srcset="">
      </div>
    </div>
  </div>
</section>

@include('partials.content-page')
@endwhile
@endsection
