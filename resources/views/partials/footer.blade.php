<section class="section d-lg-none d-inline-block mb-0 w-100">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumb bg-white mb-0 justify-content-center">
          <a class="breadcrumb-item" href="#">Home</a>
          <a class="breadcrumb-item" href="#">Level 2</a>
          <span class="breadcrumb-item active">Level 3</span>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="content-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-12">
                <div class="brand-container">
                    <a href="{{ $home_url }}" class="brand-footer">
                        {!! $logo['footerLogo'] !!}
                    </a>

                    @if($social_links)
                        <ul class="group-links d-none d-md-block">
                            @foreach($social_links as $link)
                                <li>
                                    <a href="{{ $link['url']  }}" target="_blank" rel="nofollow noreferrer">
                                        @if($link['media'] === 'instagram')
                                            <img data-src="@asset('images/icon/icon-insta.svg')" class="lazy" alt="">
                                        @else
                                            <img data-src="@asset('images/icon/icon-facebook.svg')" class="lazy" alt="">
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="offset-lg-4 col-lg-2 col-md-4 d-none d-md-block">
                @if(isset($desktop_footer_menu[0]))
                    <div class="link-list">
                        <h4 class="h4">
                            @if($desktop_footer_menu[0]->isLink)
                                <a href="{{ $desktop_footer_menu[0]->url }}">{{ $desktop_footer_menu[0]->title }}</a>
                            @else
                                {{ $desktop_footer_menu[0]->title }}
                            @endif
                        </h4>

                        @if(isset($desktop_footer_menu[0]->children) && count($desktop_footer_menu[0]->children))
                            <ul>
                                @foreach($desktop_footer_menu[0]->children as $child)
                                    <li><a href="{{ $child->url }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
            </div>
            <div class="col-lg-2 col-md-4">
                @if(isset($desktop_footer_menu[1]))
                    <div class="link-list d-none d-md-block">
                        <h4 class="h4">
                            @if($desktop_footer_menu[1]->isLink)
                                <a href="{{ $desktop_footer_menu[1]->url }}">{{ $desktop_footer_menu[1]->title }}</a>
                            @else
                                {{ $desktop_footer_menu[1]->title }}
                            @endif
                        </h4>

                        @if(isset($desktop_footer_menu[1]->children) && count($desktop_footer_menu[1]->children))
                            <ul>
                                @foreach($desktop_footer_menu[1]->children as $child)
                                    <li><a href="{{ $child->url }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif

                {{--Mobile footer menu--}}
                @if(isset($mobile_footer_menu[0]))
                    <div class="link-list d-md-none d-lg-none">
                        <h4 class="h4">
                            @if($mobile_footer_menu[0]->isLink)
                                <a href="{{ $mobile_footer_menu[0]->url }}">{{ $mobile_footer_menu[0]->title }}</a>
                            @else
                                {{ $mobile_footer_menu[0]->title }}
                            @endif
                        </h4>

                        @if(isset($mobile_footer_menu[0]->children) && count($mobile_footer_menu[0]->children))
                            <ul>
                                @foreach($mobile_footer_menu[0]->children as $child)
                                    <li><a href="{{ $child->url }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
                {{--End Mobile footer menu--}}

                @if($social_links)
                    <ul class="group-links text-center d-md-none d-lg-none">
                        @foreach($social_links as $link)
                            <li>
                                <a href="{{ $link['url']  }}" target="_blank" rel="nofollow noreferrer">
                                    @if($link['media'] === 'instagram')
                                        <img data-src="@asset('images/icon/icon-insta.svg')" class="lazy" alt="">
                                    @else
                                        <img data-src="@asset('images/icon/icon-facebook.svg')" class="lazy" alt="">
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="col-lg-2 col-md-4 d-none d-md-block">
                @if(isset($desktop_footer_menu[2]))
                    <div class="link-list">
                        <h4 class="h4">
                            @if($desktop_footer_menu[2]->isLink)
                                <a href="{{ $desktop_footer_menu[2]->url }}">{{ $desktop_footer_menu[2]->title }}</a>
                            @else
                                {{ $desktop_footer_menu[2]->title }}
                            @endif
                        </h4>

                        @if(isset($desktop_footer_menu[2]->children) && count($desktop_footer_menu[2]->children))
                            <ul>
                                @foreach($desktop_footer_menu[2]->children as $child)
                                    <li><a href="{{ $child->url }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</footer>

@include('partials.cookies')
@include('partials.newsletter-modal')

{{-- Footer Script from sitewide global --}}
{!! $scripts->footer_script ?? null !!}
