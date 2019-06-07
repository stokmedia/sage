<section class="section checkout-container d-md-flex no-mb">
  <div class="checkout-col align-self-stretch has-bg">
    <div class="product-shipping">
      <h3 class="h3">1. Dina varor</h2>
      <ul class="checkout-items">
        <li class="item">
          @include('partials.product-details-inline', ['is_link'=>true, 'has_close'=>true])
        </li>
        <li class="item">
          @include('partials.product-details-inline', ['is_link'=>true, 'has_close'=>true])
        </li>
      </ul>
      <div class="summary-group">
        <div class="summary-item">
          <div class="title">Totalt</div>
          <div class="price">799 kr</div>
        </div>
        <div class="summary-item">
          <div class="title">Moms</div>
          <div class="price">46 kr</div>
        </div>
        <div class="summary-item">
          <div class="title">Frakt</div>
          <div class="price">0 kr</div>
        </div>
        <div class="summary-item">
          <div class="title">Sub Totalt</div>
          <div class="price"><strong>799  kr</strong></div>
        </div>
      </div>
      <div class="discount-code">
        <button class="btn btn-sm btn-outline-primary" type="button" data-toggle="collapse" data-target="#discountCollapse" aria-expanded="false" aria-controls="discountCollapse">+ Lägg till rabattkod</button>
        <div class="collapse" id="discountCollapse">
          <input type="text" class="form-control form-control-md" placeholder="discount code">
        </div>
      </div>
      <div class="get-newsletter">
        <div class="custom-control custom-control-lg custom-checkbox">
          <input id="newsletter-checkbox" class="custom-control-input" checked="checked" type="checkbox">
          <label class="custom-control-label" for="newsletter-checkbox">
            <span>Få vårt nyhetsbrev - Godkänn villkoren och GDPR kraven…</span>
          </label>
        </div> 
      </div>

      <h3 class="h3">2. Betslsätt och fraktalternativ i din region</h2>
      <div class="appointment-radios">
        <div class="item">
          <div class="custom-control custom-control-lg  custom-radio">
            <input id="customRadio6" class="custom-control-input" name="customRadio" type="radio" checked="">
            <label class="custom-control-label" for="customRadio6">
              <span>KLARNA</span>
            </label>
          </div>
        </div>
        <div class="item">
            <div class="custom-control custom-control-lg  custom-radio">
              <input id="customRadio7" class="custom-control-input" name="customRadio" type="radio" checked="">
              <label class="custom-control-label" for="customRadio7">
                <span>DHL</span>
              </label>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="checkout-col align-self-stretch">
    <div class="delivery-payment">
      <h3 class="h3">3. Leverans & betalning</h2>

    </div>
  </div>
</section>

@include('partials.trust')
