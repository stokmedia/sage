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
      <div class="selected-product-preview col-md-7">
        <div class="row mx-0">
          <div class="col-md-10 p-0">
            <div class="selected-product-slider overflow-hidden">
              @for ($slider = 0; $slider < 3; $slider++)
                <div class="item">
                  <figure class="mb-0">
                    <img src="@asset('images/temp/selected-product-view.png')" alt="" srcset="">
                  </figure>
                </div>
              @endfor
            </div>
          </div>
          <div class="col-md-2 selected-product-thumbnail">
            @for ($thumbnail = 0; $thumbnail < 3; $thumbnail++)
              <div class="item shadow-sm bg-white">
                <figure class="">
                  <img src="@asset('images/temp/selected-product-thumb.png')" alt="" srcset="">
                </figure>
              </div>
            @endfor
          </div>
        </div>
      </div>
      <div class="selected-product-options col-md-5 bg-lightgreen">
      </div>
    </div>
  </div>
  <div class="fullscreen inactive">

  </div>
</section>

@include('partials.content-page')
@endwhile
@endsection
