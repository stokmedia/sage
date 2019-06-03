{{--
  Template Name: Section Template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

<div class="container-fluid">
  <section class="section newsletter-section">
    <div class="container" style="max-width: 1210px">
      <div class="newsletter row px-0">
        <div class="col-lg-6 col-md-6 col-sm-12  newsletter-cover" style="background-image: url(@asset('images/temp/newsletter.png')">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12  d-flex justify-content-center align-items-center newsletter-content">
          <div class="newsletter-inner">
            <div class="newsletter-title">Håll dig uppdaterad</div>
            <div class="newsletter-body">In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit </div>

            <div class="row m-0 align-items-center justify-content-center justify-content-lg-between newsletter-form">
              <div class="form-group mb-0">
                <input type="text" class="form-control form-control-lg">
                <div class="invalid-feedback">
                  Your email is not valid
                </div>
              </div>
              <button class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary shadow-sm border-0" type="button">
                <img src="@asset('images/icon/arrow-right.svg')" alt="" srcset="">
              </button>
            </div>

            <div class="mt-2 custom-control custom-checkbox">
              <input id="customCheck1" class="custom-control-input" checked="checked" type="checkbox">
              <label class="custom-control-label" for="customCheck1">
                <span>I Agree to the GDPR things</span>
              </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('partials.content-page')
@endwhile
@endsection
