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
            </ul>
        </div>
        <div class="currency-lang">
            <div class="currency-content">
                <div class="dropdown">
                    <button class=" btn btn-bordered dropdown-toggle"
                            id="dropdownMenu1"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="true">
                        <img src="{{currency()->getCurrency()['symbol']}}" alt="">
                        {{currency()->getCurrency()['code']}}
                        {{--<span class="caret"></span>--}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach(currency()->getCurrencies() as $currency)
                            <li>
                                <a href="?currency={{ $currency['code'] }}"><img src="{{ $currency['symbol'] }} " alt=""> {{ $currency['code'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="lang-content">
                <div class="dropdown">
                    <button class=" btn btn-bordered dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                            style="">
                        {{ title_case(LaravelLocalization::getCurrentLocaleNative()) }}
                        {{--<span class="caret"></span>--}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach(LaravelLocalization::getSupportedLocales(true) as $localeCode => $properties)
                            <li>
                                <a rel="alternate" class="{{ $localeCode }}" hreflang="{{ $localeCode }}"
                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ title_case($properties['native']) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
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
                    </ul>
                </li>
                <li><a class="nav-link" href="{{ route('drivers.index') }}">@lang('message.nav-traffick'){{--transport--}}</a></li>
                <li>
                    <a class="nav-link" href="javascript:;">@lang('message.nav-worldnoah')</a>
                    <ul class="hide-menu">
                        <li><a href="{{ route('about.index') }}/">@lang('message.nav-about')</a></li>
                        <li><a href="{{ route('view.contact') }}">@lang('message.nav-contacts')</a></li>
                        <li><a href="{{ route('vacancy.index') }}">@lang('message.nav-job')</a></li>
                        <li><a href="{{ route('service.index') }}">@lang('message.nav-more')</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="mobile-menu-btn">
            <div class="lines line-1"></div>
            <div class="lines line-2"></div>
            <div class="lines line-3"></div>
        </div>

    </div>
</header>
