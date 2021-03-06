@extends('site.layouts.app')

@php
    $settings = \App\Setting::first();
@endphp

@section('content')
<div class="tours_main_pic" style="background-image: url('/uploads/{{ $model->image }}')!important"></div>
<div id="content">
    <div class="drivers_back">
        <div class="container drivers_container">
            <div class="tabs_wrapper tabs1_wrapper">
                <div class="tabs tabs2 ui-tabs ui-widget ui-widget-content ui-corner-all">
                    <div class="tabs_content tabs1_content">
                        <form action="{{ route('tours', request()->slug) }}" method="get" class="form1">
                            <input type="hidden" name="currency" value="{{ currency()->getUserCurrency() }}">
                            <div class="row">
                                {{--region filter--}}
                                <div class="col-sm-3 col-md-3">
                                    {{--<label>@lang('message.select-region-title'):</label>--}}
                                    <label>@lang('message.region')</label>
                                    <div class="select1_wrapper">
                                        <div class="select1_inner">
                                            <select class="select2 select select2-hidden-accessible" name="region" style="width: 100%" tabindex="-1" aria-hidden="true">
                                                <option value="all" {{request('region') && request('region') == 'all' ? 'selected' : ''}}>@lang('message.select-all')</option>
                                                @if(count($region))
                                                    @foreach($region as $item)
                                                        <option value="{{ $item->id }}" {{request('region') && request('region') == $item->id ? 'selected' : ''}}>{{ $item[$item->lang]}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            {{--<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-9bvf-container"><span class="select2-selection__rendered" id="select2-9bvf-container" title="city or airport">@lang('message.city-airport')</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <label>@lang('message.price')<span class="range_input_prices"></span></label>
                                    <div class="input1_wrapper">
                                        <div class="input1_inner range_input">
                                            @php
                                              $range_val = request('range_val') ? request('range_val') : 0;
                                            @endphp
                                            @if(currency()->getCurrency()['code'] === 'AMD')
                                                <input name="range_val" id="rangeInput" type="range" min="0" max="10000000" step="10000" oninput="amount.value=rangeInput.value" class="form-control-range" value="{{$range_val}}"/>
                                                @elseif(currency()->getCurrency()['code'] === 'RUB')
                                                <input  name="range_val" id="rangeInput" type="range" min="0" max="1000000" step="1000" oninput="amount.value=rangeInput.value" class="form-control-range" value="{{$range_val}}" />
                                                @else
                                                <input name="range_val" id="rangeInput" type="range" min="0" max="100000" step="100" oninput="amount.value=rangeInput.value" class="form-control-range" value="{{$range_val}}"/>
                                            @endif
                                            <input class="text-center" style="height: 2px;" id="amount" type="number" value="{{$range_val}}" oninput="rangeInput.value=amount.value" disabled/>
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
                            <h1 class="decoration decoration-cont-style" data-animation="fadeInUp" data-animation-delay="200">@lang('message.aboutas-tours')</h1>
                        </div>
                        <div id="tabs-1">
                            <div class="row">
                            <div style="display: block; clear: both; height: 10px"></div>
                            @if(!isset(request()->search))
                                {{--<h3 style="text-align:center; color:#024768;">{{ $model->name }} </h3>--}}
                                @endif

                                    @if(count($tours))
                                        @foreach($tours as $key => $tour)
                                        @if(($key > 1) && ($key % 3) == 0)
                                            <div style="display: block; clear: both; height: 10px"></div>
                                        @endif
                                        <div class="col-md-6 col-lg-4">
                                            <div class="popular">
                                                <div class="popular_inner">
                                                    <figure>
                                                        <img src="/uploads/{{ $tour->grid_image }}" alt="{{ $tour->name }}" class="img-responsive">
                                                    </figure>
                                                    <div class="caption">
                                                        <div class="txt1"><span>{{ $tour->name }}</span></div>
                                                        <div class="txt2">
                                                            <span class="ellipsis">
                                                                {!! strip_tags($tour->desc) !!}
                                                            </span>
                                                        </div>
                                                        <div class="txt3 clearfix">
                                                            <div class="right_side"><a href="{{ route('tour-single', ['slug' => $tour->slug]) }}" class="btn-default btn1">@lang('message.read-more')</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                        <br>
                                        <h4 class="text-center">@lang('message.result-not-found')</h4>
                                    @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                {{ $tours->links('vendor.pagination.default') }}
            </div>
    </div>
    </div>

@endsection

@push('event-remove')
    <script>
        $('.select2').unbind();
        $('.select').unbind();
        $('.select2-hidden-accessible').unbind();
    </script>
@endpush
