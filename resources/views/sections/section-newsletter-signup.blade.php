@if ($section->title || $section->image || $section->form)
    <section class="section newsletter-section">
        <div class="container">
            <div class="newsletter row px-0">
                <div class="col-lg-6 col-md-6 col-sm-12  newsletter-cover"
                    style="background-image: url({{ $section->image }})">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 p-4 d-flex justify-content-center align-items-center newsletter-content">
                    <div class="newsletter-inner">
                        @if ($section->title)
                            <div class="newsletter-title">{{ $section->title }}</div>
                        @endif

                        @if ($section->text)
                            <div class="newsletter-body">
                                {!! $section->text !!}
                            </div>
                        @endif

                        <div class="row m-0 align-items-center justify-content-center justify-content-lg-around newsletter-form">
                            <div class="input-group is-invalid">
                            <input type="text" class="form-control " name="name" id="name" placeholder="" aria-label="">
                            <span class="input-group-btn">
                                <button class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary shadow-sm border-0" type="button">
                                <img src="http://192.168.99.100:8080/wp-content/themes/stokpress/dist/images/icon/arrow-right.svg" alt="" srcset="">
                                </button>
                            </span>
                            </div>
                            {{-- <div class="invalid-feedback text-left">
                            Validation message
                            </div> --}}
                        </div>
                
                        <div class="mt-2 custom-control custom-checkbox">
                            <input id="customCheck1" class="custom-control-input" type="checkbox">
                            <label class="custom-control-label" for="customCheck1">
                            <span>I Agree to the GDPR things</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif