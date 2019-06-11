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
      <div class="selected-product-preview col-xxl-6 col-lg-7 p-0">
        <div class="row justify-content-xxl-start justify-content-center mx-0">
          <div class="selected-product-slider-col p-md-0 m-0">
            <div class="selected-product-slider overflow-hidden p-md-0">
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

        <div class="container-fluid">
          <div class="breadcrumb bg-white d-lg-inline-block d-none mb-0 ">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="#">Level 2</a>
            <span class="breadcrumb-item active">Level 3</span>
          </div>
        </div>
      </div>
      <div class="selected-product-options col-xxl-6 col-lg-5 pl-md-4">
        <div class="h2 name mb-0">Anja Tank</div>
        <div class="price">
          <span><del>799 kr</del></span> <!-- line through text -->
          <span class="text-red">799 kr</span> <!-- red text -->
        </div>
        <div class="info text-uppercase d-lg-block d-none">Kjolar  |  Underkategori  |  Sea Blue</div>

        <!--
          Selectors
          NOTE: Static looping
        -->
          <div class="selectors">
            <ul class="size-selector d-inline-block w-100">
              @foreach (['XS', 'S', 'M', 'L', 'XL'] as $size)
                <li>
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="sizeCheck[{{ $size }}]" class="custom-control-input" {{ $size == 'L' ? 'disabled="disabled"' : '' }}>
                      <label class="custom-control-label" for="sizeCheck[{{ $size }}]">
                          <span>{{ $size }}</span>
                      </label>
                    </div>
                </li>
              @endforeach
            </ul>

            <ul class="color-selector d-inline-block w-100">
              @for ($color = 0; $color < 6; $color++)
                <li>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="colorCheck[{{ $color }}]" class="custom-control-input">
                    <label class="custom-control-label" for="colorCheck[{{ $color }}]" style="background-color: #{{ substr(md5(mt_rand()), 0, 6) }}"></label>
                  </div>
                </li>
              @endfor
            </ul>
          </div>

          <button type="button" class="btn btn-lg btn-primary text-uppercase">Lägg i kundkorg</button>

          <ul class="list-group accordion mt-5" id="productAccordion">
            @for ($accordion = 0; $accordion < 4; $accordion++)
              <li class="list-group-item">
                <div class="header d-flex  justify-content-lg-between align-items-center collapsed" data-toggle="collapse" data-target="#collapse{{$accordion}}" aria-expanded="false" aria-controls="collapse{{$accordion}}">
                  <span class="text-uppercase">Collapsible Group Item #{{$accordion}}</span>
                  <button class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary bg-white border-0" type="button">
                    <img src="@asset('images/icon/arrow-down.svg')" alt="" srcset="">
                  </button>
                </div>
                <div id="collapse{{$accordion}}" class="collapse body" aria-labelledby="headingOne" data-parent="#productAccordion">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquid quibusdam reprehenderit eligendi quae voluptatibus quos voluptates nulla quis corrupti sint?
                </div>
              </li>
            @endfor
          </ul>
      </div>
    </div>
  </div>
</section>

@include('partials.content-page')
@endwhile
@endsection
