{{--
  Template Name: Section Template
--}}

@extends('layouts.app')

@section('content')
  @include('sections.section-text-header')
  @include('sections.section-thankyou')
  @include('sections.section-newsletter')
  @include('sections.section-three-promo')
@endsection
