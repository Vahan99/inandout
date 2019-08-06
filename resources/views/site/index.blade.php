@php
    $settings = \App\Setting::first();
@endphp
{{--@extends('site.layouts.header2')--}}
@extends('site.layouts.app')
@section('content')
    {{----}}

    <div id="popular_cruises1">
        <div class="main-page-container" id="mid_content_wrapper">

            <br>
            @if(count($tours) > 2)
                <div id="popular_wrapper" class="animated fadeIn visible" data-animation="fadeIn"
                     data-animation-delay="300">
                    <div class="animated-logo-tours">
                        <h2 class="animated-logo animated fadeInUp visible" data-animation="fadeInUp"
                            data-animation-delay="100">@lang('message.aboutas-tours')</h2>
                    </div>
                    <div id="popular_inner">
                        <div class="">
                            <div id="popular" class="car2">
                                <div class="">
                                    <div class="carousel-box">
                                        <div class="inner">
                                            <div class="carousel main">
                                                <div class="caroufredsel_wrapper">
                                                    <ul>
                                                        @foreach($tours as $tour)
                                                            <li>
                                                                <div class="popular">
                                                                    <div class="popular_inner">
                                                                        <figure>
                                                                            <img src="/uploads/{{ $tour->grid_image }}"
                                                                                 alt="{{ $tour->name }}"
                                                                                 class="img-responsive">
                                                                        </figure>
                                                                        <div class="caption">
                                                                            <div class="txt1">
                                                                                <span>{{ $tour->name }}</span></div>
                                                                            <div class="txt2"><span
                                                                                        class="ellipsis">{!! strip_tags($tour->desc) !!}</span>
                                                                            </div>
                                                                            <div class="txt3 clearfix">
                                                                                <div class="right_side"><a
                                                                                            href="{{ route('tour-single', ['slug' => $tour->slug]) }}"
                                                                                            class="btn-default btn1">@lang('message.read-more')</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popular_pagination" id="pagination2" style="display: block;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{--Hotel Slid--}}
            @if(count($hotels) > 2)
                <div id="popular_wrapper" class="animated fadeIn visible" data-animation="fadeIn"
                     data-animation-delay="300">
                    <div class="animated-logo-hotels">
                        <h2 class="animated-logo animated fadeInUp visible hotel_block" data-animation="fadeInUp"
                            data-animation-delay="100">@lang('message.aboutas-hotels')</h2>
                    </div>
                    <div id="popular_inner">
                        <div class="">
                            <div id="popular" class="car3">
                                <div class="">
                                    <div class="carousel-box">
                                        <div class="inner">
                                            <div class="carousel main">
                                                <div class="caroufredsel_wrapper">
                                                    <ul>
                                                        @foreach($hotels as $hotel)
                                                            <li>
                                                                <div class="popular">
                                                                    <div class="popular_inner">
                                                                        <figure>
                                                                            <img src="/uploads/{{ $hotel->grid_image }}"
                                                                                 alt="{{ $hotel->name }}"
                                                                                 class="img-responsive">
                                                                        </figure>
                                                                        <div class="caption">
                                                                            <div class="txt1">
                                                                                <span>{{ $hotel->name }}</span></div>
                                                                            <div class="txt2"><span
                                                                                        class="ellipsis">{!! strip_tags($hotel->desc) !!}</span>
                                                                            </div>
                                                                            <div class="txt3 clearfix">
                                                                                <div class="right_side"><a
                                                                                            href="{{ route('hotel-single', ['slug' => $hotel->slug]) }}"
                                                                                            class="btn-default btn1">@lang('message.read-more')</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popular_pagination" id="pagination3" style="display: block;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Hotel slid end--}}
            @endif
            {{--Car slid--}}
            @if(count($cars) > 2)
                <div id="popular_wrapper" class="animated fadeIn visible" data-animation="fadeIn"
                     data-animation-delay="300">
                    <div class="animated-logo-cars ">
                        <h2 class="animated-logo animated fadeInUp visible car-block" data-animation="fadeInUp"
                            data-animation-delay="100">@lang('message.aboutas-cars')</h2>
                    </div>
                    <div id="popular_inner">
                        <div class="">
                            <div id="popular" class="car1">
                                <div class="">
                                    <div class="carousel-box">
                                        <div class="inner">
                                            <div class="carousel main">
                                                <div class="caroufredsel_wrapper">
                                                    <ul>
                                                        @foreach($cars as $car)
                                                            <li>
                                                                <div class="popular">
                                                                    <div class="popular_inner">
                                                                        <figure>
                                                                            <img src="/uploads/{{ $car->grid_image }}"
                                                                                 alt="{{ $car->name }}"
                                                                                 class="img-responsive">
                                                                        </figure>
                                                                        <div class="caption">
                                                                            <div class="txt1">
                                                                                <span>{{ $car->name }}</span></div>
                                                                            <div class="txt2"><span
                                                                                        class="ellipsis">{!! strip_tags($car->desc) !!}</span>
                                                                            </div>
                                                                            <div class="txt3 clearfix">
                                                                                <div class="right_side"><a
                                                                                            href="{{ route('car-single', ['slug' => $car->slug]) }}"
                                                                                            class="btn-default btn1">@lang('message.read-more')</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popular_pagination" id="pagination1" style="display: block;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Car slid end--}}
            @endif
        </div>
    </div>
@endsection
@push('social-meta')
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $settings->keywords }}"/>
    <meta property="og:description" content="{{ $settings->keywords_desc }}"/>
    <meta property="og:image" content="{{ asset('assets')}}/images/logo.png"/>
    <meta name="description" content="{{ $settings->keywords_desc }}">
    <meta name="keywords" content="{{ $settings->keywords }}">
@endpush