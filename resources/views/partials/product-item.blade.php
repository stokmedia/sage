@debug

    {{ TaxonomySilk_category::title() }}

    @dump(get_the_ID())

    @foreach($product_images as $image)
     {!! $image !!}<br/>
    @endforeach