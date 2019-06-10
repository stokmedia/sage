@if ($hero_banner->image || $hero_banner->image_mobile)
    <section class="section category-banner no-mb js-image-switch" 
        style="background-image:url( {{ $hero_banner->image }} );"
        data-desktop-background="{{ $hero_banner->image }}"
        data-mobile-background="{{ $hero_banner->image_mobile }}">
        <div class="box-wrapper d-flex align-items-end">
            <div class="container">
                <div class="category-banner-info text-center text-sm-left">

                    @if ($hero_banner->title) 
                        <div class="title h3">{{ $hero_banner->title }}</div>
                    @endif

                    @if ($hero_banner->text) 
                        <div class="content">
                            <p>{!! $hero_banner->text !!}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endif