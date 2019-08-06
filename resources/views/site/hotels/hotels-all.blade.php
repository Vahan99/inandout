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
                                        </div>
                                    </div>
                                </div>
                                {{--ROOM TYPE--}}
                                <div class="col-sm-3 col-md-3">
                                    <label>@lang('message.room-type')</label>
                                    <div class="select1_wrapper">
                                        <div class="select1_inner">
                                            <select class="select2 select select2-hidden-accessible" name="room" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                <option value="">@lang('message.select-all')</option>
                                                @if(count($rooms))
                                                    @foreach($rooms as $key => $room)
                                                        <option value={{$key}}>{{ $room }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                {{--BED TYPE--}}
                                <div class="col-sm-3 col-md-3">
                                    <label>@lang('message.bed-type')</label>
                                    <div class="select1_wrapper">
                                        <div class="select1_inner">
                                            <select class="select2 select select2-hidden-accessible" name="bed" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                <option value="">@lang('message.select-all')</option>
                                                @if(count($beds))
                                                    @foreach($beds as $key => $bed)
                                                        <option value={{$key}}>{{ $bed  }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
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
                        <div class="d-block text-center animated-header">
                            <h1 class="decoration decoration-cont-style animated-hotels" data-animation="fadeInUp" data-animation-delay="200">@lang('message.aboutas-hotels')</h1>
                        </div>
                        @if(count($hotels))
                            <div class="row">
                                <div class="col-md-12">
                                    <div style="display: block; clear: both; height: 10px"></div>
                                    @foreach($hotels as $key => $hotel)
                                        @if(($key > 1) && ($key % 3) == 0)
                                            <div style="display: block; clear: both; height: 10px"></div>
                                        @endif
                                        <div class="col-sm-12 col-md-6 col-lg-4">
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