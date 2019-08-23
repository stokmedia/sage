{{-- TODO: remove this file --}}

<section class="section promo-box overflow-hidden">
  <div class="align-items-center row mx-0">
    @for ($i = 1; $i < 4; $i++)
      <a href="#" target="_blank" class="promo-box-item col">
        <div class="promo-box-item-row row mx-0">
          <div class="col-lg-6 col-md-6 col align-self-center">
            <span class="h4">Shoppa</span>
            <div class="promo-box-name h2">Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar Kjolar</div>
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
      </a>
    @endfor
  </div>
</section>
