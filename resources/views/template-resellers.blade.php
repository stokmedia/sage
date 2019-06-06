{{--
  Template Name: Resellers Template
--}}

@extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

@include('sections.fifty-fifthy-section')

@include('partials.content-page')
@endwhile
@endsection
