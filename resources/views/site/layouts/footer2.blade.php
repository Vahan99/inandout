@php
    $settings = \App\Setting::first();
@endphp
<footer class="footer">
    <div class="footer-container">
        <div class="footer-row-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xl-6">
                        <ul class="d-flex footer-navigation">
                            <li><a href="{{ route('sightseeing-places') }}">@lang('message.nav-sightseeing')</a></li>
                            <li><a href="{{ route('site.restaurants-all') }}">@lang('message.nav-hotel')</a></li>
                            <li><a href="{{ route('site.hotels-all') }}">@lang('message.nav-hotel-2')</a></li>
                            <li><a href="{{ route('drivers.index') }}">@lang('message.nav-traffick')</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <ul class="footer-email-number d-flex justify-content-end">
                            @if($settings)
                                <li class="email-logo"><a href="mailto:{{$settings->mail}};">{{ $settings->mail }}</a></li>
                                <li class="number-logo"><span>{{ $settings->phone }}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-row-2">
            <div class="logo-social-links selects d-flex">
                <p>Visit on Social Network</p>
                <ul>
                    @if($settings)
                        @if(!is_null($settings->tripadvisor))
                            <li>
                                <a href="{{ $settings->tripadvisor }}">
                                    <i class="tripadvisor"></i>
                                </a>
                            </li>
                        @endif
                        @if(!is_null($settings->facebook))
                            <li>
                                <a href="{{ $settings->facebook }}">
                                    <i class="facebook"></i>
                                </a>
                            </li>
                        @endif
                        @if(!is_null($settings->vk))
                            <li>
                                <a href="{{ $settings->vk }}">
                                    <i class="vkontakte"></i>
                                </a>
                            </li>
                        @endif
                        @if(!is_null($settings->instagram))
                            <li>
                                <a href="{{ $settings->instagram }}">
                                    <i class="instagram"></i>
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
        <div class="footer-row-3">
            <p style="color: #1E2C37;font-size: 12px">All Rights Reserved - 2019</p>
            <h1> Powered by <a href="https://mgplab.com/" target="_blank">Megapolis[Lab]</a></h1>
        </div>
    </div>
</footer>
