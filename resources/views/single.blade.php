@extends('layouts.app')
@debug
@section('content')
{{$test_text}}
<br/>
<h3>Testing Repeater</h3>
@foreach($repeater_1 as $rep)
	{{$rep->rows}}<br/>
@endforeach
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
