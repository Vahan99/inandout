@extends('site.layouts.app')
@php

    $head_texts = $model->meta_data['head_texts'];
    $lang = app()->getLocale();
@endphp

@section('content')
    <main>
        <section class="tour-slider-container" style="{{$model->meta_data ? 'margin-bottom: 6rem' : ''}}">
            <div class="tour-info-slider">
                @if(count($model->slider_images))
                    @foreach($model->slider_images as $image)
                        <div class="tour-info-slider-item" style="background-image: url('/uploads/{{ $image }}')"></div>
                    @endforeach
                @endif
            </div>
        </section>
        @if($model->meta_data)
            <section class="order-section col-md-2 col-md-offset-5 text-center">
                <button class="hero__scroll btn btn-orange price-policy-order-btn">
                    <a>@lang('message.reserve-data-submit')</a>
                </button>
            </section>
        @endif
        <section class="tour-info-container bg-posit">
            <div class="tour-info-content">
                <h1>{{$model->name}}</h1>
                <p>{!! $model->desc !!}</p>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="prises-info">
                                <h1>@lang('message.the price includes')</h1>
                                {!! $model->after_text !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="prises-info">
                                <h1>@lang('message.the price does not include')</h1>
                                {!! $model->exclude !!}
                            </div>
                        </div>
                    </div>
                </div>

                @if(count($days))
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <ul class="days-short-description">
                                    @foreach($days as $key => $day)
                                        <li class="{{ !$key ? 'active' : '' }}">
                                            <a href="javascript:;" class="days-link" data-for="day-content-{{$key}}">{{ $day->name }}</a>
                                            <p>{{ $day->title }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                @foreach($days as $key => $day)
                                    <div class="day-content day-content-{{$key}}" @if($key) style="display: none;" @endif>
                                        <h1>{{ $day->name }}</h1>
                                        <h3>{{ $day->title }}</h3>
                                        <p>{!! $day->desc !!}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </section>
        <section class="tours-days-prices">
        @if($model->meta_data)
            <div class="tours-days-prices-container" id="price_policy">
                <h1>@lang('message.aboutas-min-title2')</h1>
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th scope="col" class="black-border-btm">{{ $head_texts['num_of_person_' . $lang] }}</th>
                        <th scope="col" class="orange-border-btm">{{ $head_texts['price_' . $lang] }}</th>
                        <th scope="col" class="orange-border-btm">{{ $head_texts['guide_' . $lang] }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($model->meta_data['data'] as $key => $data)
                        @if(!is_null($data['name']))
                            <tr>
                                <td>
                                    {{ $data['name'] }}
                                </td>
                                <td>
                                    @if(!empty($data['price']))
                                        <span class="currency-price">{{ currency($data['price'], 'AMD', currency()->getUserCurrency()) }}</span>
                                        <button class="btn btn-orange price-policy-order-btn btn-price-submit">
                                            <a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price']) }}">
                                                @lang('message.reserve-data-submit')
                                            </a>
                                        </button>
                                    @endif
                                </td>
                                @if(!empty($data['price_guide']))
                                    <td>
                                        <span class="currency-price">{{ currency($data['price_guide'], 'AMD', currency()->getUserCurrency()) }}</span>
                                        <button class="btn btn-orange price-policy-order-btn btn-price-submit">
                                            <a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price_guide']) }}">
                                                @lang('message.reserve-data-submit')
                                            </a>
                                        </button>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        </section>

        <section class="share-post">
            {{--@include('site.partials.social-share')--}}
            {{--<div class="share-post-navigation">--}}
                {{--<span>Tags:</span>--}}
                {{--<ul>--}}
                    {{--<li><a href="javascript:;">@lang('message.nav-sightseeing')</a></li>--}}
                    {{--<li><a href="javascript:;">@lang('message.nav-hotel')</a></li>--}}
                    {{--<li><a href="javascript:;">@lang('message.nav-hotel-2')</a></li>--}}
                    {{--<li><a href="javascript:;">@lang('message.nav-traffick')</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="share-post-icons">--}}
                {{--<span>Share Post:</span>--}}
                {{--<ul>--}}
                    {{--<li><a href="javascript" class="facebook-logo"></a></li>--}}
                    {{--<li><a href="javascript" class="vkontakte-logo"></a></li>--}}
                    {{--<li><a href="javascript" class="instagram-logo"></a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}

        </section>

        <script>
            $('.hero__scroll').on('click', function(e) {
                $('html, body').animate({
                    scrollTop: $('#price_policy').offset().top
                }, 1000);
            });
        </script>
    </main>
@endsection