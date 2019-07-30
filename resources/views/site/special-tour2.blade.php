@extends('site.layouts.app')
@php
    $head_texts = $model->meta_data['head_texts'];
    $lang = app()->getLocale();
@endphp

@section('content')
    <main>
        <div class="empty-div"></div>
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
                <h1>{{$model->name}}{{--Armenia - Tbilisi 3 days, 2 nights from Yerevan--}}</h1>
                <p>{!! $model->desc !!}{{--Tour agency organizes an interesting 3-day tour program in Armenia and georgia--}}</p>
                @if(count($days))
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="days-short-description">
                                    @foreach($days as $key => $day)
                                    <li class="{{ !$key ? 'active' : '' }}">
                                        <a href="javascript:;" class="days-link" data-for="day-content-{{$key}}">{{ $day->name }}</a>
                                        <p>{{ $day->title }}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                @foreach($days as $key => $day)
                                    <div class="day-content day-content-{{$key}}" @if($key) style="display: none;" @endif>
                                        <h1>{{ $day->name }}</h1>
                                        <h2>{{ $day->title }}</h2>
                                        <p>{!! $day->desc !!}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        @if($model->meta_data)
        <section class="tours-days-prices">
            <div class="tours-days-prices-container">
                <h1>@lang('message.aboutas-min-title2')</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col" class="black-border-btm">{{ $head_texts['num_of_person_' . $lang] }}</th>
                        <th scope="col" class="orange-border-btm">{{ $head_texts['price_' . $lang] }}</th>
                        <th scope="col" class="orange-border-btm">{{ $head_texts['guide_' . $lang] }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($model->meta_data['data'] as $key => $data)
                        <tr>
                            <td>
                                {{ $data['name'] }}
                            </td>
                            <td>
                                <a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price']) }}">
                                    {{ currency($data['price'], 'AMD', currency()->getUserCurrency()) }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price_guide']) }}">
                                    {{ currency($data['price_guide'], 'AMD', currency()->getUserCurrency()) }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tour-price-container">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="prises-info">
                                <h1>The price includes</h1>
                                {!! $model->after_text !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="prises-info">
                                <h1>The price does not include</h1>
                                {!! $model->exclude !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <section class="share-post">
            {{--@include('site.partials.social-share')--}}
            <div class="share-post-navigation">
                <span>Tags:</span>
                <ul>
                    <li><a href="javascript:;">Sightseeing</a></li>
                    <li><a href="javascript:;">Restaurant</a></li>
                    <li><a href="javascript:;">Hotels</a></li>
                    <li><a href="javascript:;">Transport</a></li>
                </ul>
            </div>
            <div class="share-post-icons">
                <span>Share Post:</span>
                <ul>
                    <li><a href="javascript" class="facebook-logo"></a></li>
                    <li><a href="javascript" class="vkontakte-logo"></a></li>
                    <li><a href="javascript" class="instagram-logo"></a></li>
                </ul>
            </div>

        </section>
    </main>
@endsection