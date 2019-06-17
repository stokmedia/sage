{{-- TODO: Custom image size --}}

{{-- Original Markup --}}
{{-- <section class="section promo-box overflow-hidden">
    <div class="align-items-center row mx-0">
        @for ($i = 1; $i < 4; $i++)
        <div class="promo-box-item col">
            <div class="promo-box-item-row row mx-0">
            <div class="col-lg-6 col-md-6 col align-self-center">
                <span class="h4">Shoppa</span>
                <div class="promo-box-name h2">Kjolar</div>
                <div class="promo-box-description">Finns i alla varianer och smaker</div>
                <a  href="#" class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary border-0">
                <img src="@asset('images/icon/arrow-right.svg')" alt="">
                </a>
            </div>
            <div class="promo-box-figure col align-self-center p-0 mr-md-auto mr-4 ml-md-4">
                <figure class="promo-box-image m-auto">
                <img src="@asset('images/temp/promo-box-1.png')">
                </figure>
            </div>
            </div>
        </div>
        @endfor
    </div>
</section> --}}
      

@if ($section->items)
    <section class="section promo-box overflow-hidden  {{ $section->classes ?? '' }}">
        <div class="align-items-center row mx-0">

            @foreach ($section->items as $item)
                @if ($item->link->url)
                    <a href="{{ $item->link->url }}" class="promo-box-item col" target="{{ $item->link->target }}">
                @else
                    <div class="promo-box-item col">
                @endif

                    <div class="promo-box-item-row row mx-0">
                        <div class="col-lg-6 col-md-6 col align-self-center">
                            @if ($item->pre_header)
                            <span class="h4">{!! $item->pre_header !!}</span>
                            @endif

                            @if ($item->title)
                            <div class="promo-box-name h2">{!! $item->title !!}</div>
                            @endif

                            @if ($item->text)
                            <div class="promo-box-description">{!! $item->text !!}</div>
                            @endif
                            
                            @if ($item->link->url)
                                <div class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary border-0">
                                    <img src="@asset('images/icon/arrow-right.svg')" alt="">
                                </div>
                            @endif
                        </div>

                        @if ($item->image)
                            <div class="promo-box-figure col align-self-center p-0 mr-md-auto mr-4 ml-md-4">
                                <figure class="promo-box-image m-auto">
                                    {!! $item->image !!}
                                </figure>
                            </div>
                        @endif
                    </div>

                @if ($item->link->url)
                    </a>
                @else
                    </div>
                @endif

            @endforeach
        </div>
    </section>
@endif