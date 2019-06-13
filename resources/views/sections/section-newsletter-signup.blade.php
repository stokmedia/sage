@if ($section->title || $section->image || $section->form)
    <section id="section-{{ $section->id }}" class="section newsletter-section">
        <div class="container">
            <div class="newsletter row px-0">
                <div class="col-lg-6 col-md-6 col-sm-12  newsletter-cover"
                    style="background-image: url({{ $section->image }})">
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 p-4 d-flex justify-content-center align-items-center newsletter-content">
                    {{-- Form content --}}
                    <div class="newsletter-inner js-newsletter-content">
                        @if ($section->title)
                            <div class="newsletter-title">{{ $section->title }}</div>
                        @endif

                        @if ($section->text)
                            <div class="newsletter-body">
                                {!! $section->text !!}
                            </div>
                        @endif

                        <form id="js-section-newsletter-{{ $section->id }}"
                            class="js-newsletter"
                            data-target="#section-{{ $section->id }}"
                            data-success_type="{{ $newsletter_data->form_settings->success_type ?? '' }}"
                            data-messages="{{ json_encode($newsletter_data->form_settings->error_messages ?? '') }}">

                            <input type="hidden" name="esc_action" value="esc_submit_newsletter">
                            {!! wp_nonce_field( 'silk_submit_newsletter' ) !!}

                            <div class="row m-0 align-items-center justify-content-center justify-content-lg-around newsletter-form">
                                <div class="input-group is-invalid">
                                    <input type="text" class="form-control " name="esc_email" id="name" placeholder="{{ $newsletter_data->form_settings->email_placeholder ?? '' }}" aria-label="">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-lg btn-icon btn-icon-lg btn-outline-primary shadow-sm border-0">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            <img src="@asset('images/icon/arrow-right.svg')" alt="" srcset="">
                                        </button>
                                    </span>
                                </div>
                                <div class="invalid-feedback text-left js-form-error" data-field="email"></div>
                            </div>

                            <div class="mt-2 custom-control custom-checkbox">
                                <input id="custom-check{{ $section->id }}" class="custom-control-input" type="checkbox" name="accept_terms" value="1">
                                <label class="custom-control-label" for="custom-check{{ $section->id }}">
                                    <span>{!! $newsletter_data->form_settings->terms ?? '' !!}</span>
                                </label>
                                <div class="invalid-feedback text-left js-form-error" data-field="terms"></div>
                            </div>
                        </form>
                    </div>

                    {{-- Success --}}
                    {{-- NOTE: This will only display if form data-success_type is set to "success-message" --}}
                    <div class="newsletter-inner d-none js-newsletter-success">
                        @if ($newsletter_data->form_settings->success_title)
                            <div class="newsletter-title">{{ $newsletter_data->form_settings->success_title }}</div>
                        @endif

                        @if ($newsletter_data->form_settings->success_content)
                            <div class="newsletter-body">
                                {!! $newsletter_data->form_settings->success_content !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
