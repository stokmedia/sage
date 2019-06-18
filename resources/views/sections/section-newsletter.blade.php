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
              <span class="input-group-btn align-items-center">
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

<!-- Newsletter modal -->
<div class="modal newsletter-modal fade p-0" id="modalNewsletter" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0 bg-transparent">
      <div class="modal-body p-0">
        <div class="container-fluid">
          <div class="newsletter row px-0">
            <div class="col-lg-12 col-md-12 col-sm-12  newsletter-cover" style="background-image: url(@asset('images/temp/newsletter.png')">
                <button type="button" class="close mr-3 mt-2" data-dismiss="modal" aria-label="Close">
                  <img src="@asset('images/icon/close.svg')" alt="" srcset="">
                </button>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 p-4  d-flex justify-content-center align-items-center newsletter-content">
              <div class="newsletter-inner">
                <div class="newsletter-title">Håll dig uppdaterad</div>
                <div class="newsletter-body">
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro enim aperiam totam, facere quos nam illum voluptatum minima fugit sunt eveniet error? Modi voluptas laborum minima officia error. Laborum, repudiandae reprehenderit dolores, officia aut accusamus voluptatum quidem error alias iusto exercitationem cum quia amet perspiciatis? Perspiciatis consequuntur excepturi ea vero?
                </div>
                <div class="row m-0 align-items-center justify-content-center justify-content-lg-around newsletter-form">
                  <form action="">
                    <div class="input-group is-invalid">
                      <input type="text" class="form-control is-invalid" name="name" id="name" placeholder="" aria-label="">
                      <span class="input-group-btn">
                        <button class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary shadow-sm border-0" type="button">
                          <img src="@asset('images/icon/arrow-right.svg')" alt="" srcset="">
                        </button>
                      </span>
                    </div>
                    <div class="invalid-feedback text-left">
                      Validation message
                    </div>
                  </form>
                </div>

                <div class="mt-2 custom-control custom-checkbox pl-4">
                  <input id="newsletter[1]" class="custom-control-input" checked="checked" type="checkbox">
                  <label class="custom-control-label" for="newsletter[1]">
                    <span>I Agree to the GDPR things</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

