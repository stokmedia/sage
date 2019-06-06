<section class="section three-promo">
  @if ( $section->section_title )
  <div class="container text-center title">
    <h2 class="h2">{{ $section->section_title }}</h2>
  </div>
  @endif

  @if ( $section->items )
  
  <div class="container">
    <div class="row justify-content-md-center">
      @foreach( $section->items as $item ) 
      <div class="col-md-4">
        <a href="{{ $item->link->url }}" class="card-block is-inline">
          <div class="image">
            <figure>
              {!! wp_get_attachment_image( $item->image->ID, 'large') !!}
            </figure>
          </div>
          <div class="info">
            <h3 class="h4">{{ $item->title }}</h3>
            <p>{{ $item->text }}</p>
          </div>
          <div class="btn btn-primary text-uppercase">{{ $item->link->title }}</div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  @endif
</section>

