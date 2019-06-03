{{--
  Template Name: Section Template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

<div class="container-fluid">
  <section class="section newsletter">
    <div class="container">
      <div class="d-flex">
        <div class="newsletter-cover" style="background: url(@asset('images/temp/newsletter.png')) no-repeat center/cover">cover</div>
        <div class="newsletter-content">
          <div class="newsletter-title">Håll dig uppdaterad</div>
          <div class="newsletter-body">In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit </div>

          <div class="form-group">
            <input type="text" class="form-control form-control-lg is-invalid">
            <div class="invalid-feedback">
              Your email is not valid
            </div>
          </div>

          <div class="custom-control custom-checkbox">
            <input id="customCheck1" class="custom-control-input" checked="checked" type="checkbox">
            <label class="custom-control-label" for="customCheck1">I Agree to the GDPR things</label>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('partials.content-page')
@endwhile
@endsection
