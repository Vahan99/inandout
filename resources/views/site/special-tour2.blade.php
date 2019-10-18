@extends('site.layouts.app')
@php

    $head_texts = $model->meta_data['head_texts'];
    $lang = app()->getLocale();
@endphp

@section('content')
    <main>
        <section class="tour-slider-container">
            <div class="tour-info-slider">
                @if(count($model->slider_images))
                    @foreach($model->slider_images as $image)
                        <div class="tour-info-slider-item" style="background-image: url('/uploads/{{ $image }}')"></div>
                    @endforeach
                @endif
            </div>
        </section>

        <section class="tour-info-container">
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
            <div class="tours-days-prices-container">
                <h1>@lang('message.aboutas-min-title2')</h1>
                <table class="table table-responsive-sm">
                    <thead>
                    <tr>
                        <th scope="col" class="black-border-btm">{{ $head_texts['num_of_person_' . $lang] }}</th>
                        <th scope="col" class="orange-border-btm">{{ $head_texts['price_' . $lang] }}</th>
                        @if(!empty($data['price_guide']))
                            <th scope="col" class="orange-border-btm">{{ $head_texts['guide_' . $lang] }}</th>
                        @endif
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
                                    <a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price']) }}">
                                        @if(!is_null($data['price']))
                                        {{ currency($data['price'], 'AMD', currency()->getUserCurrency()) }}
                                        @endif
                                    </a>
                                </td>
                                @if(!empty($data['price_guide']))
                                <td>
                                    <a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price_guide']) }}">
                                        {{ currency($data['price_guide'], 'AMD', currency()->getUserCurrency()) }}
                                    </a>
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
    </main>
@endsection