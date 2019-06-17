<article @php post_class() @endphp>
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
</article>
