
{{-- TODO: Add class "has-button" to section if the section has a button. --}}
<section class="section popular-products has-small-pt">
  <div class="container">
    <div class="section-header">
        <div class="title h2 text-center text-lg-left">Populära produkter</div>
        <div class="content text-center text-lg-left">
          <p>
              In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit facilisis tristique. Nam vel iaculis mauris. Sed ullamcorper tellus erat. non ultrices sem tincidunt euismod. Fusce rhoncus porttitor velit, eu bibendum nibh aliquet vel. Fusce lorem leo, vehicula at nibh quis, facilisis accumsan turpis. Rivamus adipiscing fermentum quam volutpat
          </p>
        </div>
        <div class="section-nav d-none d-lg-block">
          <button class="btn btn-lg btn-icon btn-icon-lg bg-white js-flickity-prev" type="button">
            <img src="http://localhost:8080/wp-content/themes/stokpress/dist/images/icon/arrow-left.svg" alt="" srcset="">
          </button>
          <button class="btn btn-lg btn-icon btn-icon-lg bg-white js-flickity-next" type="button">
            <img src="http://localhost:8080/wp-content/themes/stokpress/dist/images/icon/arrow-right.svg" alt="" srcset="">
          </button>
        </div>
    </div>
  </div>

  <div class="popular-products-grid-slider js-grid-slider">
    @for ($i = 0; $i < 10; $i++)
      <div class="grid-slider-item">
        <a href="#" class="grid-item">
          <div class="product is-small p-0">
            <div class="product-wrapper bg-white d-block">
              <figure class="product-image">
                <img src="@asset('images/temp/erika-skirt.jpeg')" />
                <img src="@asset('images/temp/erika-skirt1.jpeg')" class="visible-on-hover"/>
              </figure>
            </div>
            <div class="product-details bg-white d-block text-center">
              <div class="product-name h4">Prouct title</div>
              <div class="product-price"><span>750 kr</span></div>
            </div>
          </div>
        </a>
      </div>
    @endfor
  </div>

  {{-- TODO: Insert this whole div on the condition --}}
  {{-- <div class="container">
    <div class="section-footer text-center">
      <button class="btn btn-lg btn-primary" type="button">VISA ALLA</button>
    </div>
  </div> --}}

</section>
