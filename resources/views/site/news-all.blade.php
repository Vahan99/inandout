@extends('site.layouts.app')
@section('content')
    {{--<div id="parallax2" class="parallax">--}}
        {{--<div class="bg2 parallax-bg bg-fixed" style="background-position: 50% -61px; background-image: url('/uploads/{{ $image }}')"></div>--}}
        {{--<div class="overlay"></div>--}}
        {{--<div class="parallax-content">--}}
            {{--<div class="container">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="container">
        <div class="row">
            <div id="fb-root"></div>
            <div class="[ col-md-10 col-md-offset-1 ]" style="z-index: 0;">
                <br>
                <h3 class="animated fadeInUp visible text-center styled-header" data-animation="fadeInUp" data-animation-delay="200">@lang('message.nav-news')</h3>
                <br>
                <ul class="event-list">
                    <div id="fb-root"></div>
                    @if(count($model))
                    @foreach($model as $news)
                    <li>
                        <div class="overlay"></div>
                        <time datetime="2014-07-20">
                            <span class="day">{{ $news->created_at->format('d') }}</span>
                            <span class="month">{{ $news->created_at->format('M') }}</span>
                        </time>
                        <div class="info">
                            <div class="img-div" style="background-image: url(/uploads/{{ $news->grid_image }})">
                                {{--<img alt="{{ $news->name }}" src="" />--}}
                            </div>
                            <div class="text-desc">
                                <h2 class="title">{{ $news->name }}</h2>
                                <div class="desc">{!! strip_tags($news->desc) !!}</div>
                                <div class="detail">
                                    <a href="{{ route('view.news_page', ['slug' => $news->slug]) }}" class="btn-default
                                    btn1">@lang('message.read-more')</a>
                                </div>
                            </div>
                        </div>
                        <div class="social">
                            <ul>
                                <li class="facebook" style="width: 33%">
                                    <a href="https://www.facebook.com/sharer.php?u={{ route('view.news_page', ['slug'=> $news->slug]) }}" class="share customer">
                                        <span class="fa fa-facebook"></span>
                                    </a>
                                </li>
                                <li class="twitter" style="width: 34%">
                                    <a class="share customer" href="https://twitter.com/share?url={{ route('view.news_page', ['slug' => $news->slug]) }}&amp;text=Inandout">
                                        <span class="fa fa-twitter"></span>
                                    </a>
                                </li>
                                <li class="google-plus" style="width: 33%">
                                    <a class="customer share" href="https://plus.google.com/share?url={{ route('view.news_page', ['slug' => $news->slug]) }}">
                                        <span class="fa fa-google-plus"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endforeach
                    @else
                        <br>
                        <h4 class="text-center">@lang('message.result-not-found')</h4>
                    @endif
                </ul>
                {{ $model->links('vendor.pagination.default') }}
            </div>

        </div>
    </div>
    <style>
        @import  url("http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic");
        @import  url("//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");

        .detail {
            margin: 0 15px;
        }
        .overlay {
            width: 100%;
            height: 50%;
            position: absolute;
            z-index: -1;
        }
        .overlay:after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(to bottom right,#D7733D,#264417);
            opacity: .6;
        }
        .event-list {
            list-style: none;
            font-family: 'Lato', sans-serif;
            margin: 0px;
            padding: 0px;
        }
        .event-list > li {
            background-color: rgb(255, 255, 255);
            padding: 0px;
            margin: 0px 0px 20px;
            z-index: 999999;
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 2px 1px -1px rgba(0,0,0,0);
            overflow: hidden;
            border-top: 1px solid #cccccc69;
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            position: relative;
        }
        .event-list > li:hover {
            box-shadow: 1px 5px 20px 2px rgba(0,0,0,.2), 0 1px 1px 0 rgba(0,0,0,.14), 0 2px 1px -1px rgba(0,0,0,0);
        }
        .event-list > li > time {
            display: inline-block;
            width: 100%;
            color: rgb(255, 255, 255);
            padding: 5px;
            text-align: center;
            text-transform: uppercase;
        }
        .event-list > li:nth-child(even) > time {
            /*background-color: rgb(165, 82, 167);*/
        }
        .event-list > li > time > span {
            display: none;
        }
        .event-list > li > time > .day {
            display: block;
            font-size: 56pt;
            font-weight: 100;
            line-height: 1;
        }
        .event-list > li time > .month {
            display: block;
            font-size: 24pt;
            font-weight: 900;
            line-height: 1;
        }
        .event-list > li > img {
            width: 100%;
        }
        .event-list > li > .info .text-desc {
            padding-top: 10px;
            text-align: center;
        }
        .event-list > li > .info .text-desc > .title {
            font-size: 17pt;
            font-weight: 700;
            margin: 0px;
        }
        .event-list > li > .info .text-desc > .desc {
            font-size: 16px;
            font-weight: 300;
            margin: 0px;
        }
        .event-list > li > .info .text-desc > ul,
        .event-list > li > .social > ul {
            display: table;
            list-style: none;
            margin: 10px 0px 0px;
            padding: 0px;
            width: 100%;
            text-align: center;
        }
        .event-list > li > .social > ul {
            margin: 0px;
        }
        .event-list > li > .info .text-desc > ul > li,
        .event-list > li > .social > ul > li {
            display: table-cell;
            cursor: pointer;
            color: rgb(30, 30, 30);
            font-size: 11pt;
            font-weight: 300;
            padding: 3px 0px;
        }
        .event-list > li > .info .text-desc > ul > li > a {
            display: block;
            width: 100%;
            color: rgb(30, 30, 30);
            text-decoration: none;
        }
        .event-list > li > .social > ul > li {
            padding: 0px;
        }
        .event-list > li > .social > ul > li > a {
            padding: 5px 0px;
        }
        .event-list > li > .info .text-desc > ul > li:hover,
        .event-list > li > .social > ul > li:hover {
            color: rgb(30, 30, 30);
            background-color: rgb(200, 200, 200);
        }
        .event-list .facebook a,
        .event-list .twitter a,
        .event-list .google-plus a {
            display: block;
            width: 100%;
            color: rgb(75, 110, 168) !important;
        }
        .event-list .twitter a {
            color: rgb(79, 213, 248) !important;
        }
        .event-list .google-plus a {
            color: rgb(221, 75, 57) !important;
        }
        .event-list .facebook:hover a {
            color: rgb(255, 255, 255) !important;
            background-color: rgb(75, 110, 168) !important;
        }
        .event-list .twitter:hover a {
            color: rgb(255, 255, 255) !important;
            background-color: rgb(79, 213, 248) !important;
        }
        .event-list .google-plus:hover a {
            color: rgb(255, 255, 255) !important;
            background-color: rgb(221, 75, 57) !important;
        }
        .event-list .social li {
            margin: 0;
            width: 32%;
        }
        .event-list > li > .info .text-desc > .desc {
            padding: 0px 10px;
            height: 45px;
        }
        .event-list > li > .info .text-desc > .title,
        .event-list > li > .info .text-desc > .desc, .event-list > li > .info > .desc p {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        @media (max-width: 768px) {
            .img-div {
                width: 100%;
                background-size: cover;
                height: 200px;
            }
            .overlay {
                height:25%;
            }
        }
        @media (min-width: 768px) {
            .img-div {
                width: 150px;
                background-size: cover;
            }
            .img-div, .text-desc {
                display: table-cell;
                vertical-align: top;
            }
            .info img {
                width: 150px;
                height: 100%;
                float: left;
            }
            .event-list .social {
                height: 100%;
            }
            .event-list .social li {
                margin: 0 10px;
            }
            .event-list .social .facebook, .social .google-plus {
                width: 33%;
            }
            .event-list .social .twitter {
                width: 34%;
            }
            .event-list > li {
                position: relative;
                display: block;
                width: 100%;
                /*height: 149px;*/
                padding: 0px;
            }
            .event-list > li > time,
            .event-list > li > img  {
                display: inline-block;
            }
            .event-list > li > time,
            .event-list > li > img {
                width: 120px;
                float: left;
            }
            .event-list > li > time,
            .event-list > li > img {
                width: 150px;
                /*height: 150px;*/
                padding: 0px;
                margin: 0px;
            }
            .event-list > li > .info .text-desc {
                position: relative;
                /*height: 148px;*/
                text-align: left;
                padding-right: 80px;
                padding-bottom: 10px;
                background-color: rgb(245, 245, 245);
                overflow: hidden;
            }

            .event-list h2 {
                /*line-height: 0;*/
            }
            .event-list > li > .info .text-desc > ul {
                position: absolute;
                left: 0px;
                bottom: 0px;
            }
            .event-list > li > .social {
                position: absolute;
                top: 0px;
                right: 0px;
                display: block;
                width: 80px;
            }
            .event-list > li > .social > ul {
                border-left: 1px solid rgb(230, 230, 230);
                height: inherit;
            }
            .event-list > li > .social > ul > li {
                display: block;
                padding: 0px;
                /*height: 33.33%;*/
            }
            .event-list > li > .social > ul > li > a {
                display: block;
                width: 60px;
                padding: 10px 0px 11px;
            }
            .overlay {
                width: 100%;
                height: 100%;
                position: absolute;
                z-index: -1;
            }
            .overlay:after {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-image: linear-gradient(to bottom right,#D7733D,#264417);
                opacity: .6;
            }
        }
    </style>
@endsection