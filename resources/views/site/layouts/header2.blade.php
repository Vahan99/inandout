<header>
    <div class="header-container">
        <a href="/" class="logo-container"></a>
        <div class="logo-social-links selects d-flex">
            <ul>
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


                    {{--<li class="nav-item dropdown">--}}
                        {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>--}}
                        {{--<div class="dropdown-menu">--}}
                            {{--<a class="dropdown-item" href="#">Action</a>--}}
                            {{--<a class="dropdown-item" href="#">Another action</a>--}}
                            {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                            {{--<div class="dropdown-divider"></div>--}}
                            {{--<a class="dropdown-item" href="#">Separated link</a>--}}
                        {{--</div>--}}
                    {{--</li>--}}
            </ul>
            {{--<form class="d-flex" action="">--}}
                {{--<div class="form-group">--}}
                    {{--<select class="form-control">--}}
                        {{--@foreach(currency()->getCurrencies() as $currency)--}}
                            {{--<option><a href="?currency={{ $currency['code'] }}">{{ $currency['code'] }}</a></option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<select class="form-control">--}}
                        {{--@foreach(LaravelLocalization::getSupportedLocales(true) as $localeCode => $properties)--}}
                            {{--<option>--}}
                                {{--<a rel="alternate" class="{{ $localeCode }}" hreflang="{{ $localeCode }}"--}}
                                   {{--href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
                                    {{--{{ title_case($properties['native']) }}--}}
                                {{--</a>--}}
                            {{--</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                {{--</div>--}}
            {{--</form>--}}
        </div>
        <div class="navigation-bar">
            <ul>
                <li>
                    <a class="nav-link" href="{{ route('view.index') }}">@lang('message.nav-home')</a>
                </li>
                <li>
                    <a class="nav-link" href="javascript:;">@lang('message.nav-city')</a>
                    <ul class="hide-menu">
                        <li><a href="{{ route('sightseeing-places') }}">@lang('message.nav-sightseeing')</a></li>
                        <li><a href="{{ route('arm.index') }}">@lang('message.nav-city-home')</a></li>
                        <li><a href="{{ route('site.restaurants-all') }}">@lang('message.nav-hotel')</a></li>
                        <li><a href="{{ route('news.index') }}">@lang('message.nav-news')</a></li>
                        <li><a href="{{route('holiday.index')}}">@lang('message.nav-holidays')</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link" href="javascript:;">@lang('message.nav-city-home-2')</a>
                    <ul class="hide-menu">
                        <li><a href="{{ route('site.hotels-all') }}">@lang('message.nav-hotel-2')</a></li>
                        <li><a href="{{ route('site.apartments-all') }}">@lang('message.nav-homes')</a></li>
                        <li><a href="{{ route('site.hostels-all') }}">@lang('message.nav-hostel')</a></li>
                    </ul>
                </li>
                <li>
                    <a class="nav-link" href="javascript:;">@lang('message.nav-excursion')</a>
                    <ul class="hide-menu">
                        @foreach(\App\TourType::listTourTypes() as $type)
                            @if(count($type->childrenTourTypes))
                                <li {{--{{ (isset($activeParentTourType) && !is_null($activeParentTourType) && $activeParentTourType->slug == $type->slug) ? 'active' : '' }}--}}>
                                    <a href="javascript:;">{{ $type->name }}</a>
                                    <ul>
                                        @foreach ($type->childrenTourTypes as $childType)
                                            <li {{--{{ active_link('tours', $childType->slug) }}"--}}>
                                                <a href="{{ route('tours', ['slug' => $childType->slug]) }}">{{ $childType->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="sub-menu sub-menu-2 {{ active_link('tours', $type->slug) }}">
                                    <a href="{{ route('tours', ['slug' => $type->slug]) }}">{{ $type->name }}</a>
                                </li>
                            @endif
                        @endforeach
                        {{--<li><a href="javascript:;">Outgoing</a></li>--}}
                        {{--<li><a href="javascript:;">Incoming</a></li>--}}
                        {{--<li><a href="javascript:;">Prof. Athena Halvorsion</a></li>--}}
                        {{--<li><a href="javascript:;">Ricky Osinski IV</a></li>--}}
                        {{--<li><a href="javascript:;">Breanna Keeling</a></li>--}}
                        {{--<li><a href="javascript:;">Berneice West Jr.</a></li>--}}
                        {{--<li><a href="javascript:;">teresa Dickinson</a></li>--}}
                        {{--<li><a href="javascript:;">Luigi Welch</a></li>--}}
                    </ul>
                </li>
                <li><a class="nav-link" href="{{ route('drivers.index') }}">@lang('message.nav-traffick'){{--transport--}}</a></li>
                <li>
                    <a class="nav-link" href="javascript:;">Company</a>
                    <ul class="hide-menu">
                        <li><a href="{{ route('about.index') }}/">@lang('message.nav-about')</a></li>
                        <li><a href="{{ route('view.contact') }}">@lang('message.nav-contacts')</a></li>
                        <li><a href="{{ route('vacancy.index') }}">@lang('message.nav-job')</a></li>
                        <li><a href="{{ route('service.index') }}">@lang('message.nav-more')</a></li>
                        {{--<li><a href="javascript:;">About us</a></li>--}}
                        {{--<li><a href="javascript:;">Contact</a></li>--}}
                        {{--<li><a href="javascript:;">Vacancy</a></li>--}}
                        {{--<li><a href="javascript:;">Comments</a></li>--}}
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</header>
