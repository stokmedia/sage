{{--
  Template Name: Section Template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

<div class="container-fluid">

  <!-- Newsletter -->
  @include('sections.section-newsletter')

  <section class="section">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalNewsletter">
      Launch newsletter modal
    </button>
  </section>
</div>

@include('partials.content-page')
@endwhile
@endsection
