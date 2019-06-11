<section class="section instagram">
  <div class="instagram-gallery d-none d-md-block" style="background-image: url('@asset('images/instagram/bg.jpg')');">
    <div class="col-wrap instagram-info-margin">
      <div class="col-group">
        <div class="col-side"></div>
        <div class="col-side">
          <div class="instagram-info">
              <div class="btn-header d-flex justify-content-center">
                <a href="#" class="btn btn-sm btn-primary text-uppercase">FOLLOW US</a>
                <h3 class="h3">@skhoopskirts</h3>
              </div>
              <div class="info">In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce</div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-wrap">
      <div class="col-group">
        <div class="col-side">
          <div class="tile-group justify-content-end align-items-end">
            <div class="tile is-three">
              <img src="@asset('images/instagram/01.png')" class="" alt="">
            </div>
            <div class="tile-block">
              <div class="tile">
                <img src="@asset('images/instagram/02.png')" class="" alt="">
              </div>
              <div class="tile">
                <img src="@asset('images/instagram/03.png')" class="" alt="">
              </div>
            </div>
          </div>
          <div class="tile-group justify-content-end">
            <div class="tile">
              <img src="@asset('images/instagram/04.png')" class="" alt="">
            </div>
            <div class="tile">
              <img src="@asset('images/instagram/05.png')" class="" alt="">
            </div>
            <div class="tile">
              <img src="@asset('images/instagram/06.png')" class="" alt="">
            </div>
          </div>
        </div>
        <div class="col-side">
          <div class="tile-group">
            <div class="tile-block-hidden"></div>
          </div>
          <div class="tile-group">
            <div class="tile">
              <img src="@asset('images/instagram/07.png')" class="" alt="">
            </div>
            <div class="tile">
              <img src="@asset('images/instagram/08.png')" class="" alt="">
            </div>
            <div class="tile">
              <img src="@asset('images/instagram/09.png')" class="" alt="">
            </div>
          </div>
          <div class="tile-group">
            <div class="tile-block">
              <div class="tile">
                <img src="@asset('images/instagram/10.png')" class="" alt="">
              </div>
              <div class="tile">
                <img src="@asset('images/instagram/11.png')" class="" alt="">
              </div>
            </div>
            <div class="tile is-three">
              <img src="@asset('images/instagram/12.png')" class="" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="instagram-gallery-mobile d-block d-md-none" style="background-image: url(@asset('images/temp/instagram-bg.jpg')">
    <div class="instagram-info text-center">
      <div class="btn-header">
        <h3 class="h3 mb-0">@skhoopskirts</h3>
        <a href="#" class="btn btn-sm btn-primary text-uppercase">FOLLOW US</a>
      </div>
      <div class="info">In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat, non ultrices sem tincidunt euismod. Fusce </div>
    </div>
    <div class="instagram-col">
      {{-- 100% --}}
      <div class="row">
        <div class="col">
          <figure class="tile">
            <img src="@asset('images/instagram/01.png')" alt="">
          </figure>
        </div>
      </div>
      {{-- 50% --}}
      @for ($i = 0; $i < 2; $i++)
        <div class="row">
          <div class="col">
            <figure class="tile">
              <img src="@asset('images/instagram/01.png')" alt="">
            </figure>
          </div>
          <div class="col">
            <figure class="tile">
              <img src="@asset('images/instagram/01.png')" alt="">
            </figure>
          </div>
        </div>
      @endfor
      {{-- 25% --}}
      @for ($i = 0; $i < 2; $i++)
        <div class="row">
          <div class="col">
            <figure class="tile">
              <img src="@asset('images/instagram/01.png')" alt="">
            </figure>
          </div>
          <div class="col">
            <figure class="tile">
              <img src="@asset('images/instagram/01.png')" alt="">
            </figure>
          </div>
          <div class="col">
            <figure class="tile">
              <img src="@asset('images/instagram/01.png')" alt="">
            </figure>
          </div>
          <div class="col">
            <figure class="tile">
              <img src="@asset('images/instagram/01.png')" alt="">
            </figure>
          </div>
        </div>
      @endfor
    </div>
  </div>
</section>