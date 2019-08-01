@extends('site.layouts.app')
@section('content')
<style>
.sl-desc {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 15px;
}

.sl-desc-overlay {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    background-image: url('/images/region-bg.jpg');
    width: 100%;
    height: 100%;
    opacity : 0.9;
}

.sl-desc * {
    color: #fff;
}

.sl-desc .content .txt1 {
    font-size: 34px;
    text-transform: uppercase;
    font-weight: 600;
}

.sl-desc .content .txt3 {
    font-size: 16px;
}
</style>

{{--@if(isset($region) && isset($region->slider_images))--}}
    {{--<div id="sl1">--}}
        {{--<a class="sl1_prev" href="#"></a>--}}
        {{--<a class="sl1_next" href="#"></a>--}}
        {{--<div class="sl1_pagination"></div>--}}
        {{--<div class="carousel-box">--}}
            {{--<div class="inner">--}}
                {{--<div class="carousel main">--}}
                    {{--<ul>--}}
                        {{--@foreach($region->slider_images as $image)--}}
                            {{--<li>--}}
                                {{--<div class="sl1">--}}
                                    {{--<div class="sl1_inner">--}}
                                        {{--<img src="/uploads/{{ $image }}" alt="{{ $region->name }}" class="img-responsive">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                    {{--<div class="sl-desc container">--}}
                        {{--<div class="sl-desc-overlay"></div>--}}
                        {{--<div class="col-md-10 col-md-offset-1">--}}
                            {{--<div class="content">--}}
                                {{--<div class="txt1 animated fadeIn visible" data-animation="fadeIn" data-animation-delay="100">{{ $region->name }}</div>--}}
                                {{--<div class="txt3 animated fadeIn visible" data-animation="fadeIn" data-animation-delay="200">--}}
                                    {{--{!! $region->description !!}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@else--}}
    {{--<div id="parallax2" class="parallax">--}}
        {{--<div class="bg2 parallax-bg bg-fixed" style="background-position: 50% -61px; background-image: url('./uploads/{{ $image }}')"></div>--}}
        {{--<div class="overlay"></div>--}}
        {{--<div class="parallax-content">--}}
            {{--<div class="container">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endif--}}

<div id="content">
    <div class="container">
        <div class="tabs_wrapper tabs1_wrapper">
            <div class="tabs tabs2 ui-tabs ui-widget ui-widget-content ui-corner-all">
                <div class="tabs_content tabs1_content">
                    <form action="{{ route('sightseeing-places') }}" method="get" class="form1">
                        <div class="row">
                            <div class="col-sm-3 col-md-3">
                                <label>@lang('message.select-region-title'):</label>
                                <div class="select1_wrapper">
                                    {{--<div class="select1_inner">--}}
                                        <select class="select2 select select2-hidden-accessible" name="slug" style="width: 100%" tabindex="-1" aria-hidden="true">
                                            <option value="">@lang('message.select-all')</option>
                                            @foreach($list as $region)
                                                @if(count($region->sightseeing_places))
                                                <option value="{{ $region->slug }}" {{ $slug && $slug == $region->slug ? 'selected' : '' }}>{{ $region->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        {{--<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="City or Airport">City or Airport</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <label for="">@lang('message.enter-place-name'):</label>
                                <div class="input2_wrapper">
                                    <div class="input1_inner">
                                        <input type="text" name="keywords" class="input" placeholder="@lang('message.enter-place-name')">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-md-2">
                                <div class="button1_wrapper">
                                    <button type="submit" class="btn-default btn-form1-submit">@lang('message.search')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if(count($places))
                        <div class="row">
                            <div style="display: block; clear: both; height: 10px"></div>
                            @foreach($places as $key => $place)
                                @if(($key > 1) && ($key % 3) == 0)
                                    <div style="display: block; clear: both; height: 10px"></div>
                                @endif
                                <div class="col-md-6 col-lg-4">
                                    <div class="popular">
                                        <div class="popular_inner">
                                            <figure>
                                                <img src="/uploads/{{ $place->grid_image }}" alt="{{ $place->name }}" class="img-responsive">
                                            </figure>
                                            <div class="caption">
                                                <div class="txt1"><span>{{ $place->name }}</span></div>
                                                <div class="txt2">
                                                    <span class="ellipsis">
                                                        {!! strip_tags($place->desc) !!}
                                                    </span>
                                                </div>
                                                <div class="txt3 clearfix">
                                                    <div class="right_side"><a href="{{ route('tour-single', ['slug' => $place->slug]) }}" class="btn-default btn1">@lang('message.read-more')</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <br>
                        <h4 class="text-center">@lang('message.result-not-found')</h4>
                    @endif
                </div>
            </div>
        </div>
    {{ $places->links('vendor.pagination.default') }}
    </div>
</div>
@endsection