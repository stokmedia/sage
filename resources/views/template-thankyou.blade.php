{{--
  Template Name: Thank You Template
--}}

{{-- @php 
  include_once( Esc::directory() . '/modules/success.php' );
  // use Lib\Classes\Helper;

  // $helper = new Helper();
  $success = new EscSuccess();
  $receipt_info = $success->getReceiptInfo();

  // $messages = $helper->get_translated_text( 'messages' );
  // $translation = $helper->get_translated_text( 'text_strings' );
@endphp   --}}

{{-- @if( isset($receipt_info['code']) && $receipt_info['code'] === 'COUNTRY_MISMATCH' ) --}}
  {{-- @php($title = !empty( $messages['country_mismatch'] ) ? $messages['country_mismatch']['title'] : null)
  @php($content = !empty( $messages['country_mismatch'] ) ? $messages['country_mismatch']['content'] : null) --}}
{{-- @elseif( isset($receipt_info['errors']) ) --}}
  {{-- @php($title = !empty( $messages['an_error_has_occurred'] ) ? $messages['an_error_has_occurred']['title'] : null)
  @php($content = !empty( $messages['an_error_has_occurred'] ) ? $messages['an_error_has_occurred']['content'] : null) --}}
{{-- @elseif( isset($receipt_info['order']) ) --}}
  {{-- Successful checkout selection --}}
  {{-- @php($title = !empty( $messages['successful_checkout'] ) ? $messages['successful_checkout']['title'] : null)
  @php($content = !empty( $messages['successful_checkout'] ) ? $messages['successful_checkout']['content'] : null) --}}
{{-- @endif  --}}


@extends('layouts.app')

@section('content')
    
    @if (!empty($page_info->has_header))
        <section class="section text-button has-small-pt has-small-mb is-thank-you">
            <div class="container">

                @if (!empty($page_info->header['title']))
                <h1 class="title h2 text-center">{{ $page_info->header['title'] }}</h1>
                @endif

                @if (!empty($page_info->header['content']))
                <div class="preamble text-center">{!! $page_info->header['content'] !!}</div>
                @endif

            </div>
        </section>
    @endif
    
    @if (isset($receipt_info->info['order']))
        @include( 'sections.section-thankyou', [
            'receipt_info' => $page_info->info,
            'sectionClass' => empty($content) ? 'no-mb' : ''
        ])
    @endif

    @include( 'partials.sections' )

@endsection
