@php
    $settings = \App\Setting::first();
@endphp
<footer>
    <div class="footer-container">
        <div class="footer-row-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="d-flex footer-navigation">
                            <li><a href="{{ route('view.index') }};">@lang('message.nav-home')</a></li>
                            <li><a href="#">@lang('message.nav-city')</a></li>
                            <li><a href="#">@lang('message.nav-city-home-2')</a></li>
                            <li><a href="#">@lang('message.nav-excursion')</a></li>
                            <li><a href="{{ route('drivers.index') }}">@lang('message.nav-traffick')</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <ul class="footer-email-number d-flex justify-content-end">
                            <li class="email-logo"><a href="mailto:{{$settings->mail}};">{{ $settings->mail }}</a></li>
                            <li class="number-logo"><span>{{ $settings->phone }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-row-2"></div>
        <div class="footer-row-3"></div>
    </div>
</footer>