<section class="section three-promo">
  @if ( get_sub_field('section_title') && get_sub_field('show_section_title') === true )
  <div class="container text-center title">
    <h2 class="h2">{{ get_sub_field('section_title') }}</h2>
  </div>
  @endif
  @if ( have_rows('items') )
  <div class="container">
    <div class="row justify-content-md-center">
      @while(have_rows( 'items' )) @php the_row(); @endphp
      <div class="col-md-4">
        <a href="{{get_sub_field('link')['url']}}" class="card-block is-inline">
          <div class="image">
            <figure>
              {!! wp_get_attachment_image( get_sub_field('image')['ID'], 'large') !!}
            </figure>
          </div>
          <div class="info">
            <h3 class="h4">{{ get_sub_field('title') }}</h3>
            <p>{{ get_sub_field('text') }}</p>
          </div>
          <div class="btn btn-primary text-uppercase">{{get_sub_field('link')['title']}}</div>
        </a>
      </div>
      @endwhile
    </div>
  </div>
  @endif
</section>

