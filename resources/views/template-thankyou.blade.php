{{--
  Template Name: Thank You Template
--}}

@extends('layouts.app')

@section('content')

  <section class="section text-button has-small-pt has-small-mb is-thank-you">
    <div class="container">
        <h1 class="title h2 text-center">Tack för ditt köp</h1>
        <div class="preamble text-center">In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper</div>
    </div>
  </section>

  @include('sections.section-thankyou')
  @include( 'partials.sections' )

@endsection
