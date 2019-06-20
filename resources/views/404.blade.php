@extends('layouts.app')

@section('content')
  {{-- @include('partials.page-header')
  {{$sometext}}
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif --}}

  {{-- <section class="section text-button has-pt">
    <div class="container">
      <div class="title h2 text-center text-lg-left">404 - Sidan kan inte hittas</div>
      <div class="preamble text-center text-lg-left">
        In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus
      </div>
      <div class="content clearfix">
        <p class="has-padding">
          In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis.
        </p>
      </div>
      <div class="buttons text-center text-lg-left">
        <a href="/" class="btn btn-lg btn-outline-primary">Gå till shoppen</a>
      </div>
    </div>
  </section>

  @include('sections.section-instagram-grid')
  @include('sections.section-newsletter')
--}}
  @include('partials.sections')
@endsection 
