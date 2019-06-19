{{-- <article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">{{ $post->post_title }}</h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
  <div>
    @include('partials.product-price', ['priceInfo' => $product->price] )
  </div>
    @php the_content() @endphp

    <div>
      @include('partials.product-images', ['images' => $product->images, 'size' => 'standard', 'limit' => 1] )
    </div>

    <div>
      @include('partials.product-images', ['images' => $product->images, 'size' => 'mini', 'limit' => 4] )
    </div>

    {{ $product_information }}

    @if ($product->is_bundle )
      @include('partials.product-bundle', ['bundle' => $product->bundle ] )
    @endif

  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
</article> --}}


<section class="section selected-product">
    <div class="container">
      <div class="row">
  
  
        <!--
          NOTE: Add `.is-oos` to `.selected-product-preview`, this will add the "out of stock" state for the product.
        -->
  
  
        <div class="selected-product-preview col-xxl-6 col-lg-7 p-0 invisible">
          <div class="row justify-content-xxl-start justify-content-center mx-0">
            <div class="selected-product-slider-col p-md-0 m-0">
              <div class="selected-product-slider overflow-hidden p-md-0 shadow-sm">
                @for ($slider = 0; $slider < 3; $slider++)
                  <figure class="item align-items-center mb-0">
                    <img src="@asset('images/temp/selected-product-view.png')" alt="" srcset="">
                  </figure>
                @endfor
              </div>
              <div class="selected-product-blur d-lg-block d-none rounded-circle" style="background: url(@asset('images/temp/selected-product-blur.jpg')) no-repeat center/cover transparent"></div>
            </div>
            <div class="selected-product-thumbnail d-none d-lg-flex flex-column">
              @for ($thumbnail = 0; $thumbnail < 3; $thumbnail++)
                <div class="item bg-white">
                  <figure class="">
                    <img src="@asset('images/temp/selected-product-thumb.png')" alt="" srcset="">
                  </figure>
                </div>
              @endfor
            </div>
          </div>
  
          <div class="container-fluid">
            <div class="breadcrumb bg-white d-lg-inline-block d-none mb-0 ">
              <a class="breadcrumb-item" href="#">Home</a>
              <a class="breadcrumb-item" href="#">Level 2</a>
              <span class="breadcrumb-item active">Level 3</span>
            </div>
          </div>
        </div>
  
        @include( 'partials.product-info' );
      </div>
    </div>
  </section>
  