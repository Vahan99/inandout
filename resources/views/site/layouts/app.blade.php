@php
    $settings = \App\Setting::first();
@endphp
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>In & Out</title>

    {{--Old Links--}}
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

    {{--New Links--}}
    <!--SELECT 2-->
    <link rel="stylesheet" href="{{asset('assets')}}/css/select2.min.css">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <!--RESET-->
    <link rel="stylesheet" href="{{asset('assets')}}/css/reset.css">
    <!--SLICK SLIDER-->
    <link rel="stylesheet" href="{{asset('assets')}}/js/slick/slick/slick.css">
    <link rel="stylesheet" href="{{asset('assets')}}/js/slick/slick/slick-theme.css">
    <!--FIRST PAGE CSS-->
    <link rel="stylesheet" href="{{asset('assets')}}/css/first-page.css">


    <!--JQUERY-->
    <script src="{{asset('assets')}}/js/js/libs/jquery-3.3.1.min.js"></script>
    <!--BOOTSTRAP-->
    <script src="{{asset('assets')}}/js/js/libs/popper.min.js"></script>
    <script src="{{asset('assets')}}/js/js/libs/bootstrap.min.js"></script>

    <script src="/js/range.js"></script>

    <!--SELECT 2-->
    <script src="{{asset('assets')}}/js/js/libs/select2.min.js"></script>
    <script src="{{asset('assets')}}/js/js/select2.js"></script>
    <!--SLICK SLIDER-->
    <script src="{{asset('assets')}}/js/slick/slick/slick.min.js"></script>
    <script src="{{asset('assets')}}/js/js/slick-slider.js"></script>
    <!--FIRST PAGE JS-->
    <script src="{{asset('assets')}}/js/js/first-page.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="https://apis.google.com/js/platform.js" async defer>
      {
        lang: 'ru'
      }
    </script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
</head>
<body>
<div class="all-content">
    @include('site.layouts.header2')
    <main>
        <div class="empty-div"></div>
        @yield('content')
    </main>
    @include('site.layouts.footer2')
</div>

<div class="mobile-menu">
    <ul class="menu-content">
        <li><a class="menu-header" href="{{ route('view.index') }}">@lang('message.nav-home')</a>
        </li>
        <li><a class="menu-header" href="javascript:;">@lang('message.nav-city')</a>
            <ul class="hided-content">
                <li><a href="{{ route('sightseeing-places') }}">@lang('message.nav-sightseeing')</a></li>
                <li><a href="{{ route('arm.index') }}">@lang('message.nav-city-home')</a></li>
                <li><a href="{{ route('site.restaurants-all') }}">@lang('message.nav-hotel')</a></li>
                <li><a href="{{ route('news.index') }}">@lang('message.nav-news')</a></li>
                <li><a href="{{route('holiday.index')}}">@lang('message.nav-holidays')</a></li>
            </ul>
        </li>
        <li><a class="menu-header" href="javascript:;">@lang('message.nav-city-home-2')</a>
            <ul class="hided-content">
                <li><a href="{{ route('site.hotels-all') }}">@lang('message.nav-hotel-2')</a></li>
                <li><a href="{{ route('site.apartments-all') }}">@lang('message.nav-homes')</a></li>
                <li><a href="{{ route('site.hostels-all') }}">@lang('message.nav-hostel')</a></li>
            </ul>
        </li>
        <li><a class="menu-header" href="javascript:;">@lang('message.nav-excursion')</a>
            <ul class="hided-content">
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
        <li><a class="menu-header" href="{{ route('drivers.index') }}">@lang('message.nav-traffick')</a>
        </li>
        <li><a class="menu-header" href="javascript:;">@lang('message.nav-worldnoah')</a>
            <ul class="hided-content">
                <li><a href="{{ route('about.index') }}">@lang('message.nav-about')</a></li>
                <li><a href="{{ route('view.contact') }}">@lang('message.nav-contacts')</a></li>
                <li><a href="{{ route('vacancy.index') }}">@lang('message.nav-job')</a></li>
                <li><a href="{{ route('service.index') }}">@lang('message.title-page-service')</a></li>
            </ul>
        </li>
    </ul>

</div>

</body>
</html>