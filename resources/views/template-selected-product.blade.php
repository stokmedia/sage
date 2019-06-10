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
        <div class="row mx-0">
          <div class="col-md-11 selected-product-carousel">
            <div class="item">
              <figure class="">
                <img src="@asset('images/temp/selected-product-view.png')" alt="" srcset="">
              </figure>
            </div>
          </div>
          <div class="col-md-1 selected-product-thumbnail">
            @for ($thumbnail = 0; $thumbnail < 3; $thumbnail++)
              <div class="item">
                <figure class="">
                  <img src="@asset('images/temp/selected-product-thumb.png')" alt="" srcset="">
                </figure>
              </div>
            @endfor
          </div>
        </div>
      </div>
      <div class="selected-product-options col-md-6 bg-lightgreen">
      </div>
    </div>
  </div>
</section>

@include('partials.content-page')
@endwhile
@endsection
