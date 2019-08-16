@if ($newsletter_data->newsletter_enable)
    <div class="modal newsletter-modal fade p-0" id="js-newsletter-modal" tabindex="-1" role="dialog" 
        aria-labelledby="modelTitleId" aria-hidden="true" 
        data-cookie="settings_newsletterDisplayed"
        data-display_time="{{ $newsletter_data->newsletter_modal_content->modal_display_time }}"
        data-delay="{{ $newsletter_data->newsletter_modal_content->modal_delay }}">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-transparent">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="newsletter row px-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 newsletter-cover lazy" data-bg="url({{ $newsletter_data->newsletter_modal_content->image ?? '' }})">
                                <button type="button" class="close mr-3 mt-2" data-dismiss="modal" aria-label="Close">
                                    <img class="lazy" data-src="@asset('images/icon/close.svg')" alt="" srcset="">
                                </button>
                            </div>

                            {{-- Form Content --}}
                            @include( 'partials.newsletter-content', [
                                'section' => $newsletter_data->newsletter_modal_content,
                                'formID' => 'js-section-newsletter-modal',
                                'sectionID' => 'modal',
                                'targetContainer' => '#js-newsletter-modal',
                                'contentClass' => 'col-lg-12 col-md-12 col-sm-12 p-4  d-flex justify-content-center align-items-center newsletter-content',
                            ] )
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif