@extends('site.layouts.app')
@php
    $settings = \App\Setting::first();
@endphp

@section('content')

    <div class="hotels_main_pic"></div>
    <div id="content">
        <div class="{{--container-fluid--}} drivers_back">
        <div class="container drivers_container">
            <div class="tabs_wrapper tabs1_wrapper">
                <div class="tabs tabs2 ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <div class="tabs_content tabs1_content">
                        <form action="{{ route('site.hotels-all') }}" method="get" class="form1">
                            <div class="row">
                                {{--<div class="col-sm-3 col-md-3">--}}
                                    {{--<label>@lang('message.select-region-title'):</label>--}}
                                    {{--<div class="select1_wrapper">--}}
                                        {{--<div class="select1_inner">--}}
                                            {{--<select class="select2 select select2-hidden-accessible" name="slug" style="width: 100%" tabindex="-1" aria-hidden="true">--}}
                                                {{--<option value="">@lang('message.select-all')</option>--}}
                                                {{--@foreach($list as $region)--}}
                                                    {{--@if(count($region->hotels))--}}
                                                        {{--<option value="{{ $region->slug }}" {{ $slug && $slug == $region->slug ? 'selected' : '' }}>{{ $region->name }}</option>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="city or airport">@lang('message.city-airport')</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--REGION TYPE--}}
                                <div class="col-sm-3 col-md-3">
                                    <label>@lang('message.select-region-title')</label>
                                    <div class="select1_wrapper">
                                        <div class="select1_inner">
                                            <select class="select2 select select2-hidden-accessible" name="slug" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                <option value="">@lang('message.select-all')</option>
                                                @foreach($regions as $region)
                                                    @if(count($region->hotels) )
                                                        <option value="{{ $region->slug }}" {{ $slug && $slug == $region->slug ? 'selected' : '' }}>{{ $region->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            {{--<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="city or airport">@lang('message.city-airport')</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                                        </div>
                                    </div>
                                </div>
                                {{--ROOM TYPE--}}
                                <div class="col-sm-3 col-md-3">
                                    <label>Room Type</label>
                                    <div class="select1_wrapper">
                                        <div class="select1_inner">
                                            <select class="select2 select select2-hidden-accessible" name="room" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                <option value="">@lang('message.select-all')</option>
                                                @if(count($rooms))
                                                    @foreach($rooms as $key => $room)
                                                        <option value={{$key}}>{{ $room }}</option>
                                                    @endforeach
                                                @endif
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="city or airport">@lang('message.city-airport')</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>

                                {{--BED TYPE--}}
                                <div class="col-sm-3 col-md-3">
                                    <label>Bed Type</label>
                                    <div class="select1_wrapper">
                                        <div class="select1_inner">
                                            <select class="select2 select select2-hidden-accessible" name="bed" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                <option value="">@lang('message.select-all')</option>
                                                @if(count($beds))
                                                    @foreach($beds as $key => $bed)
                                                        <option value={{$key}}>{{ $bed  }}</option>
                                                    @endforeach
                                                @endif
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="city or airport">@lang('message.city-airport')</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>

                                {{--<div class="col-md-3">--}}
                                    {{--<label for="">@lang('message.enter-place-name'):</label>--}}
                                    {{--<div class="input1_wrapper">--}}
                                        {{--<div class="input1_inner">--}}
                                            {{--<input type="text" name="keywords" class="input" placeholder="@lang('message.enter-place-name')">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="col-sm-4 col-md-2">
                                    <div class="button1_wrapper">
                                        <button type="submit" class="btn-default btn-form1-submit">@lang('message.search')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="d-sm-none d-md-block">
                            <h2 class="animated-logo animated fadeInUp visible hotels_page_logo " data-animation="fadeInUp" data-animation-delay="200">@lang('message.aboutas-hotels')</h2>
                        </div>
                        @if(count($hotels))
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="display: block; clear: both; height: 10px"></div>
                                    @foreach($hotels as $key => $hotel)
                                        @if(($key > 1) && ($key % 3) == 0)
                                            <div style="display: block; clear: both; height: 10px"></div>
                                        @endif
                                        <div class="col-sm-4">
                                            <div class="popular">
                                                <div class="popular_inner">
                                                    <figure>
                                                        <img src="/uploads/{{ $hotel->grid_image }}" alt="{{ $hotel->name }}" class="img-responsive">
                                                    </figure>
                                                    <div class="caption">
                                                        <div class="txt1"><span>{{ $hotel->name }}</span></div>
                                                        <div class="txt2"><span class="ellipsis">{!! strip_tags($hotel->description) !!}</span></div>
                                                        <div class="txt3 clearfix">
                                                            <div class="right_side"><a href="{{ route('site.hotel-single', ['slug' => $hotel->slug]) }}" class="btn-default btn1">@lang('message.read-more')</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <br>
                            <h4 class="text-center">@lang('message.result-not-found')</h4>
                        @endif
                </div>
            </div>
        </div>
        {{ $hotels->links('vendor.pagination.default') }}
    </div>
    </div>
    </div>
@endsection