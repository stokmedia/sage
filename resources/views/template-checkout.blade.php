{{--
  Template Name: Checkout Template
--}}

@extends('layouts.app')

@section('content')
  @php(include(locate_template('parts/shop/checkout-selection.php')))

  @include('partials.trust')
@endsection
