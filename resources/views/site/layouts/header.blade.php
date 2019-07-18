@php
    $settings = \App\Setting::first();
@endphp
        <!DOCTYPE html>
<html lang="am">
<head>
    <title>InAndOut</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="fb:app_id" content="{{ env('FB_APP_ID') }}"/>
    <link href="{{asset('assets')}}/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="{{asset('assets')}}/css/font-awesome.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/animate.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/select2.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/smoothness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
    <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../uploads/favicon.png" type="image/png">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    {{--Range slider css--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.css">
    <link rel="stylesheet" href="{{ asset('css/rangeslider.css')  }}">

    {{--<link rel="stylesheet" href="{{ asset('assets/css/box.css') }}">--}}

    <script src="{{asset('assets')}}/js/jquery.js"></script>
    <script src="{{asset('assets')}}/js/jquery-ui.js"></script>
    <script src="{{asset('assets')}}/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.easing.1.3.js"></script>
    <script src="{{asset('assets')}}/js/superfish.js"></script>

    <script src="{{asset('assets')}}/js/select2.js"></script>

    <script src="{{asset('assets')}}/js/jquery.parallax-1.1.3.resize.js"></script>

    <script src="{{asset('assets')}}/js/SmoothScroll.js"></script>

    <script src="{{asset('assets')}}/js/jquery.appear.js"></script>

    <script src="{{asset('assets')}}/js/jquery.caroufredsel.js"></script>
    <script src="{{asset('assets')}}/js/jquery.touchSwipe.min.js"></script>

    <script src="{{asset('assets')}}/js/jquery.ui.totop.js"></script>

    <script src="{{asset('assets')}}/js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false.js"></script>
    <script src="{{asset('assets')}}/js/googlemap.js"></script>



    {{--Bootstrap slider--}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="https://apis.google.com/js/platform.js" async defer>
        {
            lang: 'ru'
        }
    </script>
    <![endif]-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    {{-- Facebook --}}
    @stack('social-meta')
    @stack('event-remove')
    @stack('post-css')
</head>
<body class="front">
<div id="main">
    <div class="top1_wrapper">
        <div class="container">
            <div class="top1 clearfix">
                <div class="email1"><a href="mailto:{{$settings->mail}}">{{ $settings->mail }}</a></div>
                <div class="phone1">{{ $settings->phone }}</div>
                <div class="social_wrapper">
                    <ul class="social clearfix">
                        @if(!is_null($settings->tripadvisor))
                            <li class="trip_o">
                                <a href="{{ $settings->tripadvisor }}" class="tripadvisor" style="background-image: url({{ ('../uploads/tripadvisor.png') }})" target="_blank">
                                </a>
                            </li>
                        @endif
                        @if(!is_null($settings->facebook))
                            <li class="face_o">
                                <a href="{{ $settings->facebook }}" class="facebook" style="background-image: url({{ ('../uploads/face.png') }})" target="_blank">
                                </a>
                            </li>
                        @endif
                        @if(!is_null($settings->vk))
                            <li class="vk_o">
                                <a href="{{ $settings->vk }}" class="vk" style="background-image: url({{ ('../uploads/vk.png') }})" target="_blank">
                                </a>
                            </li>
                        @endif
                        @if(!is_null($settings->instagram))
                            <li class="insta_o">
                                <a href="{{ $settings->instagram }}" class="instagram" style="background-image: url({{ ('../uploads/instagram.png') }})" target="_blank">

                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div >

                </div>
                <div class="currency" style="width:100px !important;">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle"
                                id="dropdownMenu1"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="true">
                            {{--@php--}}
                                {{--if(app()->getLocale() === 'en') {--}}
                                    {{--echo currency()->getCurrencies()['USD']['code'];--}}
                                 {{--}--}}
                                 {{--elseif(app()->getLocale() === 'ru') {--}}
                                  {{--echo currency()->getCurrencies()['RUB']['code'];--}}
                                 {{--}--}}
                                 {{--else {--}}
                                    {{--echo currency()->getCurrencies()['AMD']['code'];--}}
                                 {{--}--}}
                            {{--@endphp--}}
                            {{currency()->getCurrency()['code']}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            @foreach(currency()->getCurrencies() as $currency)
                                <li>
                                    <a href="?currency={{ $currency['code'] }}">{{--{{ $currency['symbol'] }}--}} {{ $currency['code'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="lang1">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                style="">
                            {{ title_case(LaravelLocalization::getCurrentLocaleNative()) }}<span class="caret"></span>
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
        </div>
    </div>

    <div class="top2_wrapper">
        <div class="container">
            <div class="top2 clearfix">
                <header>
                    <div class="logo_wrapper">
                        <a href="{{ route('view.index') }}" class="logo">
                            <img src="{{asset('assets')}}/images/logo.png" alt="" class="img-responsive">
                        </a>
                    </div>
                </header>
                <div class="navbar navbar_ navbar-default">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse navbar-collapse_ collapse">
                        <ul class="nav navbar-nav sf-menu clearfix">
                            <li class="{{ Route::currentRouteName() == 'view.index' ? 'active' : ''}}"><a
                                        href="{{ route('view.index') }}">@lang('message.nav-home')</a></li>

                            <li class="sub-menu sub-menu-1 {{ active_link(['sightseeing-places', 'arm.index', 'site.restaurants-all', 'news.index', 'holiday.index']) }}">
                                <a href="#">@lang('message.nav-city') <em></em></a>
                                <ul>
                                    <li class="sub-menu sub-menu-2 {{ active_link('sightseeing-places') }}">
                                        <a href="{{ route('sightseeing-places') }}">@lang('message.nav-sightseeing')</a>
                                    </li>
                                    <li class="sub-menu sub-menu-2 {{ active_link('arm.index') }}"><a
                                                href="{{ route('arm.index') }}">@lang('message.nav-city-home')</a></li>
                                    <li class="sub-menu sub-menu-2 {{ active_link('site.restaurants-all') }}">
                                        <a href="{{ route('site.restaurants-all') }}">@lang('message.nav-hotel')
                                        </a>
                                    </li>
                                    <li class="sub-menu sub-menu-2 {{ active_link('news.index') }}">
                                        <a href="{{ route('news.index') }}">
                                            @lang('message.nav-news')
                                        </a>
                                    </li>
                                    <li class="sub-menu sub-menu-2 {{ active_link('holiday.index') }}">
                                        <a href="{{route('holiday.index')}}">
                                            @lang('message.nav-holidays')
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu sub-menu-1 {{ active_link(['site.hotels-all', 'site.apartments-all']) }}">
                                <a href="#">@lang('message.nav-city-home-2') <em></em></a>
                                <ul>
                                    <li class="sub-menu sub-menu-2 {{ active_link('site.hotels-all') }}">
                                        <a href="{{ route('site.hotels-all') }}">
                                            @lang('message.nav-hotel-2')
                                        </a>
                                    </li>
                                    <li class="sub-menu sub-menu-2 {{ active_link('site.apartments-all') }}">
                                        <a href="{{ route('site.apartments-all') }}">
                                            @lang('message.nav-homes')
                                        </a>
                                    </li>
                                    <li class="sub-menu sub-menu-2 {{ active_link('site.hostels-all') }}">
                                        <a href="{{ route('site.hostels-all') }}">
                                            @lang('message.nav-hostel')
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="sub-menu sub-menu-1 {{ active_link('tours') }}">
                                <a href="#">@lang('message.nav-excursion') <em></em></a>
                                <ul>
                                    @foreach(\App\TourType::listTourTypes() as $type)
                                        @if(count($type->childrenTourTypes))
                                            <li class="sub-menu sub-menu-2 {{ (isset($activeParentTourType) && !is_null($activeParentTourType) && $activeParentTourType->slug == $type->slug) ? 'active' : '' }}">
                                                <a href="#">{{ $type->name }}</a>
                                                <ul>
                                                    @foreach ($type->childrenTourTypes as $childType)
                                                        <li class="sub-menu sub-menu-2 {{ active_link('tours', $childType->slug) }}">
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
                            <li class="sub-menu sub-menu-1 {{ active_link(['drivers.index', 'driver.single']) }}">
                                <a href="{{ route('drivers.index') }}">@lang('message.nav-traffick')</a>
                            </li>
                            <li class="sub-menu sub-menu-1 {{ active_link(['about.index', 'view.contact', 'vacancy.index', 'service.index']) }}">
                                <a href="#">@lang('message.nav-worldnoah') <em></em></a>
                                <ul>
                                    <li class="{{ active_link('about.index') }}"><a
                                                href="{{ route('about.index') }}/">@lang('message.nav-about')</a></li>
                                    <li class="{{ active_link('view.contact') }}"><a
                                                href="{{ route('view.contact') }}">@lang('message.nav-contacts')</a>
                                    </li>
                                    <li class="{{ active_link('vacancy.index') }}"><a
                                                href="{{ route('vacancy.index') }}">@lang('message.nav-job')</a></li>
                                    <li class="{{ active_link('service.index') }}"><a
                                                href="{{ route('service.index') }}">@lang('message.nav-more')</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Session::has('success-mail-send') || Session::has('success-message-send'))
        <style>
            .background::after {
                content: "";
                position: absolute;
                height: 100%;
                width: 100%;
                top: 0;
                left: 0;
                background-color: rgba(0, 0, 0, 0.2);
            }

            .modalbox.success,
            .modalbox.error {
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                margin-top: 15%;
                background: #fff;
                padding: 25px 25px 15px;
                border: 1px solid #aaa;
                text-align: center;
            }

            .modalbox.success.animate .icon,
            .modalbox.error.animate .icon {
                -webkit-animation: fall-in 0.75s;
                -moz-animation: fall-in 0.75s;
                -o-animation: fall-in 0.75s;
                animation: fall-in 0.75s;
            }

            .modalbox.success h1,
            .modalbox.error h1 {
                font-family: 'Montserrat', sans-serif;
            }

            .modalbox.success p,
            .modalbox.error p {
                font-family: 'Open Sans', sans-serif;
            }

            .modalbox.success button,
            .modalbox.error button,
            .modalbox.success button:active,
            .modalbox.error button:active,
            .modalbox.success button:focus,
            .modalbox.error button:focus {
                -webkit-transition: all 0.1s ease-in-out;
                transition: all 0.1s ease-in-out;
                -webkit-border-radius: 0;
                -moz-border-radius: 0;
                border-radius: 0;
                margin-top: 15px;
                width: 80%;
                background: transparent;
                color: #0a6;
                border-color: #0a6;
                outline: none;
            }

            .modalbox.success button:hover,
            .modalbox.error button:hover,
            .modalbox.success button:active:hover,
            .modalbox.error button:active:hover,
            .modalbox.success button:focus:hover,
            .modalbox.error button:focus:hover {
                color: #fff;
                background: #0a6;
                border-color: transparent;
            }

            .modalbox.success .icon,
            .modalbox.error .icon {
                position: relative;
                margin: 0 auto;
                margin-top: -75px;
                background: #0a6;
                height: 100px;
                width: 100px;
                border-radius: 50%;
            }

            .modalbox.success .icon span,
            .modalbox.error .icon span {
                postion: absolute;
                font-size: 4em;
                color: #fff;
                text-align: center;
                padding-top: 20px;
            }

            .modalbox.error button,
            .modalbox.error button:active,
            .modalbox.error button:focus {
                color: #ff424f;
                border-color: #ff424f;
            }

            .modalbox.error button:hover,
            .modalbox.error button:active:hover,
            .modalbox.error button:focus:hover {
                color: #fff;
                background: #ff424f;
            }

            .modalbox.error .icon {
                background: #ff424f;
            }

            .modalbox.error .icon span {
                padding-top: 25px;
            }

            .center {
                float: none;
                margin-left: auto;
                margin-right: auto;
                /* stupid browser compat. smh */
            }

            .center .change {
                clearn: both;
                display: block;
                font-size: 10px;
                color: #ccc;
                margin-top: 10px;
            }

            @-webkit-keyframes fall-in {
                0% {
                    -ms-transform: scale(3, 3);
                    -webkit-transform: scale(3, 3);
                    transform: scale(3, 3);
                    opacity: 0;
                }
                50% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                    opacity: 1;
                }
                60% {
                    -ms-transform: scale(1.1, 1.1);
                    -webkit-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }
                100% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                }
            }

            @-moz-keyframes fall-in {
                0% {
                    -ms-transform: scale(3, 3);
                    -webkit-transform: scale(3, 3);
                    transform: scale(3, 3);
                    opacity: 0;
                }
                50% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                    opacity: 1;
                }
                60% {
                    -ms-transform: scale(1.1, 1.1);
                    -webkit-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }
                100% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                }
            }

            @-o-keyframes fall-in {
                0% {
                    -ms-transform: scale(3, 3);
                    -webkit-transform: scale(3, 3);
                    transform: scale(3, 3);
                    opacity: 0;
                }
                50% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                    opacity: 1;
                }
                60% {
                    -ms-transform: scale(1.1, 1.1);
                    -webkit-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }
                100% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                }
            }

            @-webkit-keyframes plunge {
                0% {
                    margin-top: -100%;
                }
                100% {
                    margin-top: 25%;
                }
            }

            @-moz-keyframes plunge {
                0% {
                    margin-top: -100%;
                }
                100% {
                    margin-top: 25%;
                }
            }

            @-o-keyframes plunge {
                0% {
                    margin-top: -100%;
                }
                100% {
                    margin-top: 25%;
                }
            }

            @-moz-keyframes fall-in {
                0% {
                    -ms-transform: scale(3, 3);
                    -webkit-transform: scale(3, 3);
                    transform: scale(3, 3);
                    opacity: 0;
                }
                50% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                    opacity: 1;
                }
                60% {
                    -ms-transform: scale(1.1, 1.1);
                    -webkit-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }
                100% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                }
            }

            @-webkit-keyframes fall-in {
                0% {
                    -ms-transform: scale(3, 3);
                    -webkit-transform: scale(3, 3);
                    transform: scale(3, 3);
                    opacity: 0;
                }
                50% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                    opacity: 1;
                }
                60% {
                    -ms-transform: scale(1.1, 1.1);
                    -webkit-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }
                100% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                }
            }

            @-o-keyframes fall-in {
                0% {
                    -ms-transform: scale(3, 3);
                    -webkit-transform: scale(3, 3);
                    transform: scale(3, 3);
                    opacity: 0;
                }
                50% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                    opacity: 1;
                }
                60% {
                    -ms-transform: scale(1.1, 1.1);
                    -webkit-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }
                100% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                }
            }

            @keyframes fall-in {
                0% {
                    -ms-transform: scale(3, 3);
                    -webkit-transform: scale(3, 3);
                    transform: scale(3, 3);
                    opacity: 0;
                }
                50% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                    opacity: 1;
                }
                60% {
                    -ms-transform: scale(1.1, 1.1);
                    -webkit-transform: scale(1.1, 1.1);
                    transform: scale(1.1, 1.1);
                }
                100% {
                    -ms-transform: scale(1, 1);
                    -webkit-transform: scale(1, 1);
                    transform: scale(1, 1);
                }
            }

            @-moz-keyframes plunge {
                0% {
                    margin-top: -100%;
                }
                100% {
                    margin-top: 15%;
                }
            }

            @-webkit-keyframes plunge {
                0% {
                    margin-top: -100%;
                }
                100% {
                    margin-top: 15%;
                }
            }

            @-o-keyframes plunge {
                0% {
                    margin-top: -100%;
                }
                100% {
                    margin-top: 15%;
                }
            }

            @keyframes plunge {
                0% {
                    margin-top: -100%;
                }
                100% {
                    margin-top: 15%;
                }
            }

        </style>
        <div id="myModal" class="modal fade in" role="dialog" style="display: block;background-color: #000000a8;">
            <div class="container">
                <div class="row">
                    <div class="modalbox success col-sm-8 col-md-6 col-lg-5 center animate">
                        <div class="icon">
                            <span class="glyphicon glyphicon-ok"></span>
                        </div>
                        <!--/.icon-->
                        <h1 style="border-bottom: 4px solid #00aa66;">
                            @if(Session::has('success-mail-send'))
                                @lang('message.success')!
                            @else
                                @lang('message.send')!
                            @endif
                        </h1>
                        <button type="button" class="redo btn" data-dismiss="modal" onclick="$('#myModal').hide()">Ok
                        </button>
                        @if(Session::has('success-mail-send'))
                            <span class="change">-- @lang('message.check-email') --</span>
                        @endif
                    </div>
                    <!--/.success-->
                </div>
                <!--/.row-->
            </div>
        </div>
@endif
    <style>
        .currency .dropdown-toggle:before {
            {{--content: "{{ currency()->getCurrency()['symbol'] }}";--}}
content: "";
            background: url("{{currency()->getCurrency()['symbol']}}") 0 0 no-repeat;
            display: inline-block;
            width: 18px;
            height: 12px;
            /*vertical-align: top;*/
            /*margin-top: 3px;*/
            /*margin-right: 0px;*/
            font-size: 17px;
            font-weight: 500;
        }

        .lang1 .dropdown-toggle:before {
            content: '';
            display: inline-block;
            width: 18px;
            height: 12px;
            {{--background: url(/assets/images/flag_{{ \App::getLocale() }}.png) 0 0 no-repeat;--}}
background: url(/uploads/globus_icon.png) 0 0 no-repeat;
            vertical-align: top;
            margin-top: 3px;
            margin-right: 5px;
        }

        /*.nav li.active > a {*/
        /*color: #1cbbb4;*/
        /*}*/

        .font-green {
            color: #1cbbb4;
        }

        .popular .popular_inner .txt2 {
            color: #959595;
            padding-bottom: 15px;
        }

        .ellipsis, .ellipsis p {
            height: 64px;
            display: -webkit-box;
            margin: 0 auto;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
        }

        .ellipsis, .ellipsis p {
            margin-bottom: 0;
        }

        .input1_inner:after {
            background: transparent;
        }

        .navbar_ .nav > li > a, .sub-menu li a, h1, /*h2,*/
        p, /*h3,*/
        h4, h5, label, .top1_wrapper {
            font-family: segoe ui !important;
        }

        tr:first-child td {
            border-top: 1px solid #cecfd5;
        }

        .navbar_ .nav > li > a:hover, .navbar_ .nav > li > a:focus, .navbar_ .nav > li.sfHover > a, .navbar_ .nav > li.sfHover > a:hover {
            color: #f58636;
            text-decoration: none;
            background: none;
            box-shadow: none;
            moz-box-shadow: none;
            -webkit-box-shadow: none;
            border: none; /*border-color: #f58636;*/
        }

        .navbar_ .nav > li.active > a, .navbar_ .nav > li.active > a:hover, .navbar_ .nav > li.active > a:focus {
            color: #f58636;
            text-decoration: none;
            background: none;
            box-shadow: none;
            moz-box-shadow: none;
            -webkit-box-shadow: none;
            border: none; /*border-color: #f58636;*/
        }

        .sub-menu li a:hover {
            text-decoration: none;
            color: #f28436;
        }

        ::-webkit-input-placeholder { /* Chrome */
            opacity: 0.7 !important;
        }

        :-ms-input-placeholder { /* IE 10+ */
            opacity: 0.7 !important;
        }

        ::-moz-placeholder { /* Firefox 19+ */
            opacity: 0.7 !important;
        }

        :-moz-placeholder { /* Firefox 4 - 18 */
            opacity: 0.7 !important;
        }

        .currency {
            float: right;
            border-right: 2px solid #CACACA;
            width: 150px;
            margin-right: 20px;
        }

        .currency .dropdown-toggle {
            border: none;
            padding: 0;
            background: none !important;
            outline: none;
            display: block;
            width: 100%;
            /*text-align: left;*/
            font-size: 15px;
            line-height: 20px;
            /*color: #acacac;*/
        }

        .currency .dropdown-menu {
            min-width: 100%;
            margin: 0;
            padding: 0;
            left: -1px;
            right: -1px;
            margin-top: 13px;
            border-radius: 0;
            border: 1px solid #ebebeb;
            box-shadow: none;
        }
    </style>



