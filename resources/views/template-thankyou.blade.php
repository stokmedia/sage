{{--
  Template Name: Thank You Template
--}}
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

    @if (isset($page_info->info['order']))
        @include( 'sections.section-thankyou', [
            'receipt_info' => $page_info->info,
            'sectionClass' => empty($content) ? 'no-mb' : '',
            'translation' => $site_translate->selections
        ])
    @endif

    {{ $clear_session }}

    @include( 'partials.sections' )

@endsection
