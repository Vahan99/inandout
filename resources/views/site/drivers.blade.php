@extends('site.layouts.app')

@php
    $settings = \App\Setting::first();
@endphp
@section('content')

    <div class="drivers_main_pic"></div>

    <div class="container-fluid drivers_back">
    <div class="container drivers_container">
        <div class="row">
        <br>

        <div {{--class="col-md-12--}}">
            <form action="{{ route('drivers.index') }}" method="get" class="form1">
                <div class="row">
                    <div class="{{--col-sm-12--}} col-md-2">
                        <label>@lang('message.vehicle-type'):</label>
                        <div class="select1_wrapper">
                            <div class="select1_inner">
                                <select class="select2 select select2-hidden-accessible" name="vehicle_type_id" style="width: 100%" tabindex="-1" aria-hidden="true">
                                    <option value="">@lang('message.select-all')</option>
                                    @foreach(\App\VehicleType::listAll('id') as $key => $vehicle)
                                        <option value="{{ $key }}" {{ $request->vehicle_type_id && $key == $request->vehicle_type_id ? 'selected' : '' }}>{{ $vehicle }}</option>
                                     @endforeach
                                </select>
                                {{--<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="City or Airport">@lang('message.city-airport')</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                            </div>
                        </div>
                    </div>
                    <div class="{{--col-sm-3 --}}col-md-2">
                        <label>@lang('message.seats-car'):</label>
                        <div class="select1_wrapper">
                            <div class="select1_inner">
                                <select class="select2 select select2-hidden-accessible" name="num_of_seats" style="width: 100%" tabindex="-1" aria-hidden="true">
                                    <option value="">@lang('message.select-all')</option>
                                    @foreach($num_of_seats_lists as $seat)
                                        <option value="{{ $seat }}" {{ $request->num_of_seats && $seat == $request->num_of_seats ? 'selected' : '' }}>{{ $seat }}</option>
                                    @endforeach
                                </select>
                                {{--<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="City or Airport">City or Airport</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                            </div>
                        </div>
                    </div>
                    <div class="{{--col-sm-3--}} col-md-2">
                        <label>@lang('message.reserve-driver-car'):</label>
                        <div class="select1_wrapper">
                            <div class="select1_inner">
                                <select class="select2 select select2-hidden-accessible" name="with_driver" style="width: 100%" tabindex="-1" aria-hidden="true">
                                    <option value="">@lang('message.select-all')</option>
                                    <option value="1" {{ isset($request->with_driver) && 1 == $request->with_driver ? 'selected' : '' }}>@lang('message.with-driver')</option>
                                    <option value="0" {{ isset($request->with_driver) && 0 == $request->with_driver ? 'selected' : '' }}>@lang('message.without-driver')</option>
                                </select>
                                {{--<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="City or Airport">City or Airport</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="">@lang('message.model-name'):</label>
                        <div class="input1_wrapper">
                            <div class="input1_inner">
                                <input type="text" name="keywords" class="input" placeholder="@lang('message.enter-model-name')">
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

            {{--add image with header--}}
            <div class="d-sm-none d-md-block">
                <h2 class="animated-logo animated fadeInUp visible drivers_page_logo " data-animation="fadeInUp" data-animation-delay="200">@lang('message.aboutas-cars')</h2>
            </div>
            {{--<div class="d-none d-md-none text-center"><h2>@lang('message.aboutas-cars')</h2></div>--}}
            @if(count($model))
                <div class="row">
                        <div style="display: block; clear: both; height: 10px"></div>
                        @foreach($model as $key => $driver)
                            @if(($key > 1) && ($key % 3) == 0)
                                <div style="display: block; clear: both; height: 10px"></div>
                            @endif
                            <div class="col-sm-4 drivers_block">
                                <div class="popular">
                                    <div class="popular_inner">
                                        <figure>
                                            <img src="/uploads/{{ $driver->grid_image }}" alt="{{ $driver->name }}" class="img-responsive">
                                        </figure>
                                        <div class="caption">
                                            <div class="txt1"><span>{{ $driver->name }}</span></div>
                                            <div class="txt2"><span class="ellipsis">{!! strip_tags($driver->desc) !!}</span></div>
                                            <div class="txt3 clearfix">
                                                <div class="right_side"><a href="{{ route('driver.single', [$driver->id]) }}" class="btn-default btn1">@lang('message.read-more')</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div style="display: block; clear: both; height: 10px"></div>
                    </div>
            @else
                <br>
                <h4 class="text-center">@lang('message.result-not-found')</h4>
            @endif
            {{ $model->links('vendor.pagination.default') }}
        </div>
    </div>
    </div>

@endsection
