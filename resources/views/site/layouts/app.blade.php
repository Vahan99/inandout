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
    {{--<script src="{{asset('assets')}}/js/js/libs/popper.min.js"></script>--}}
    <script src="{{asset('assets')}}/js/js/libs/bootstrap.min.js"></script>


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

</body>
</html>