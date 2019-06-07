{{--
  Template Name: Resellers Template
--}}

@include('page')

{{-- @extends('layouts.app')

@section('content')
@while(have_posts()) @php the_post() @endphp
@include('partials.page-header')

<!-- 50/50 -->
<section class="section fifty-fifthy">
  <div class="row m-0">
    <div class="fifty-fifthy-item col-md-6 p-0 order-1 order-md-2">
      <figure class="mb-0">
        <img src="@asset('images/temp/newsletter.png')" alt="" srcset="">
      </figure>
    </div>
    <div class="fifty-fifthy-item bg-lightgreen d-flex justify-content-center align-items-center col-md-6 order-2 order-md-1">
      <div class="fifty-fifthy-content">
        <h2>Om Skhoop och våra fabulösa och rara proukter</h2>

        <p>
          In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit
        </p>

        <a href="#" class="btn btn-lg btn-primary d-block m-auto m-md-0" role="button">Länk till något bra</a>
      </div>
    </div>
  </div>
</section>

<!-- Resellers -->
@include('sections.section-resellers')

<!-- 50/50 -->
<section class="section fifty-fifthy">
  <div class="row m-0">
    <div class="fifty-fifthy-item col-md-6 p-0 order-1">
      <figure class="mb-0">
        <img src="@asset('images/temp/newsletter.png')" alt="" srcset="">
      </figure>
    </div>
    <div class="fifty-fifthy-item bg-lightgreen d-flex justify-content-center align-items-center col-md-6 order-2">
      <div class="fifty-fifthy-content">
        <h2>Om Skhoop och våra fabulösa och rara proukter</h2>

        <p>
          In hac habitasse platea dictumst. Vivamus adipiscing fermentum quam volutpat aliquam. Integer et elit eget elit
        </p>

        <a href="#" class="btn btn-lg btn-primary d-block m-auto m-md-0" role="button">Länk till något bra</a>
      </div>
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="section newsletter-section">
  <div class="container">
    <div class="newsletter row px-0">
      <div class="col-lg-6 col-md-6 col-sm-12  newsletter-cover"
        style="background-image: url(@asset('images/temp/newsletter.png')">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 p-4 d-flex justify-content-center align-items-center newsletter-content">
        <div class="newsletter-inner">
          <div class="newsletter-title">Håll dig uppdaterad</div>
          <div class="newsletter-body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam facilis consequuntur reiciendis repellendus
            minus quae non soluta quisquam aut tempore ex odit accusantium molestiae ab, officia deserunt ad numquam,
            laudantium nemo nostrum corporis. Quae reprehenderit, enim id porro similique atque illum non corporis, quod
            distinctio aperiam velit asperiores quasi sint pariatur error cumque omnis iusto perferendis rem laboriosam
            est, et impedit. Provident fuga qui vero inventore error cumque quo. Eligendi enim quae explicabo
            repudiandae illo maiores voluptate maxime animi, nisi, natus atque perspiciatis aliquid rerum quod corrupti
            aliquam officiis dolor debitis tenetur? Pariatur corrupti non debitis hic, sit quisquam magni.
          </div>
          <div class="row m-0 align-items-center justify-content-center justify-content-lg-around newsletter-form">
            <div class="input-group is-invalid">
              <input type="text" class="form-control is-invalid" name="name" id="name" placeholder="" aria-label="">
              <span class="input-group-btn">
                <button class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary shadow-sm border-0" type="button">
                  <img src="http://192.168.99.100:8080/wp-content/themes/stokpress/dist/images/icon/arrow-right.svg" alt="" srcset="">
                </button>
              </span>
            </div>
            <div class="invalid-feedback text-left">
              Validation message
            </div>
          </div>

          <div class="mt-2 custom-control custom-checkbox">
            <input id="customCheck1" class="custom-control-input" checked="checked" type="checkbox">
            <label class="custom-control-label" for="customCheck1">
              <span>I Agree to the GDPR things</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('partials.content-page')
@endwhile
@endsection --}}
