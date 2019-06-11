{{--
  Template Name: Selected Product Template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

<section class="section selected-product">
  <div class="container">
    <div class="row mx-0">
      <div class="selected-product-preview col-lg-7 p-0">
        <div class="row justify-content-xxl-start justify-content-center mx-0">
          <div class="selected-product-slider-col p-0 m-0">
            <div class="selected-product-slider overflow-hidden">
              @for ($slider = 0; $slider < 3; $slider++)
                <figure class="item align-items-center mb-0">
                  <img src="@asset('images/temp/selected-product-view.png')" alt="" srcset="">
                </figure>
              @endfor
            </div>
          </div>
          <div class="selected-product-thumbnail d-none d-lg-flex flex-column">
            @for ($thumbnail = 0; $thumbnail < 3; $thumbnail++)
              <div class="item bg-white">
                <figure class="">
                  <img src="@asset('images/temp/selected-product-thumb.png')" alt="" srcset="">
                </figure>
              </div>
            @endfor
          </div>
        </div>
      </div>
      <div class="selected-product-options col-lg-5 bg-lightgreen">
      </div>
    </div>
  </div>
</section>

@include('partials.content-page')
@endwhile
@endsection
