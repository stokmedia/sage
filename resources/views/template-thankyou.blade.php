{{--
  Template Name: Thank You Template
--}}
@php 
  include_once( Esc::directory() . '/modules/success.php' );
  // use Lib\Classes\Helper;

  // $helper = new Helper();
  $success = new EscSuccess();
  $receipt_info = $success->getReceiptInfo();

  // $messages = $helper->get_translated_text( 'messages' );
  // $translation = $helper->get_translated_text( 'text_strings' );
@endphp  

@if( isset($receipt_info['code']) && $receipt_info['code'] === 'COUNTRY_MISMATCH' )
  {{-- @php($title = !empty( $messages['country_mismatch'] ) ? $messages['country_mismatch']['title'] : null)
  @php($content = !empty( $messages['country_mismatch'] ) ? $messages['country_mismatch']['content'] : null) --}}
@elseif( isset($receipt_info['errors']) )
  {{-- @php($title = !empty( $messages['an_error_has_occurred'] ) ? $messages['an_error_has_occurred']['title'] : null)
  @php($content = !empty( $messages['an_error_has_occurred'] ) ? $messages['an_error_has_occurred']['content'] : null) --}}
@elseif( isset($receipt_info['order']) )
  {{-- Successful checkout selection --}}
  {{-- @php($title = !empty( $messages['successful_checkout'] ) ? $messages['successful_checkout']['title'] : null)
  @php($content = !empty( $messages['successful_checkout'] ) ? $messages['successful_checkout']['content'] : null) --}}
@endif 


@extends('layouts.app')

@section('content')

  <section class="section text-button has-small-pt has-small-mb is-thank-you">
    <div class="container">
        <h1 class="title h2 text-center">Tack för ditt köp</h1>
        <div class="preamble text-center">In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper</div>
    </div>
  </section>

  @include('sections.section-thankyou', ['receipt_info'=>$receipt_info]){{-- , 'helper'=>$helper --}}
  @include( 'partials.sections' )

@endsection
