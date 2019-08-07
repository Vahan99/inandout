@extends('site.layouts.app')
@section('content')
    {{ Form::open(['route' => 'send.driver.mail', 'method' => 'post', 'files' => true,'id']) }}
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="text-center hch2">{{ $model->name }}</h3>
                    <div class="clearfix"></div>
                    <div class="col-md-4 booking-row">
                        <h4 class="line"> @lang('message.reserve-info-title') </h4>
                        <p style="font-size:13px;">@lang('message.reserve-validate-title'):</p>

                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-name') <span style="color: red">*</span> </label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="text" class="{{ $errors->has('name') ? 'error-input' : ''}} form-control" value="{{ old('name') }}" spellcheck="false" name="name" placeholder="@lang('message.reserve-form-name')">
                                <li style="list-style-type: none;" class="{{ $errors->has('name') ? 'error-li' : ''}}">{{ $errors->first('name') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-surname') <span style="color: red">*</span> </label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="text" class="{{ $errors->has('lastname') ? 'error-input' : ''}} form-control" value="{{ old('lastname') }}" spellcheck="false" name="lastname" placeholder="@lang('message.reserve-form-surname')">
                                <li style="list-style-type: none;" class="{{ $errors->has('lastname') ? 'error-li' : ''}}">{{ $errors->first('lastname') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-phone') <span style="color: red">*</span></label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="phone" class="{{ $errors->has('phone') ? 'error-input' : ''}} form-control" value="{{ old('phone') }}" spellcheck="false" name="phone" placeholder="@lang('message.reserve-form-phone')">
                                <li style="list-style-type: none;" class="{{ $errors->has('phone') ? 'error-li' : ''}}">{{ $errors->first('phone') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-email') <span style="color: red">*</span> </label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="email" class="{{ $errors->has('email') ? 'error-input' : ''}} form-control" value="{{ old('email') }}" spellcheck="false" name="email" placeholder="@lang('message.reserve-form-email')">
                                <li style="list-style-type: none;" class="{{ $errors->has('email') ? 'error-li' : ''}}">{{ $errors->first('email') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-city') <span style="color: red">*</span> </label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="text" class="{{ $errors->has('city') ? 'error-input' : ''}} form-control" value="{{ old('city') }}" spellcheck="false"  name="city" placeholder="@lang('message.reserve-form-city')">
                                <li style="list-style-type: none;" class="{{ $errors->has('city') ? 'error-li' : ''}}">{{ $errors->first('city') }}</li>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5 booking-row">
                        <h4 class="line">@lang('message.reserve-you-have-chosen')</h4>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.reserve-price-car')</label>
                            <div class="col-md-6">
                                <span class="red"> {{ currency($data[$type], 'AMD', currency()->getUserCurrency()) }}</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.reserve-model-car') </label>
                            <div class="col-md-6">
                                <span class="red">{{ $model->name }}</span>
                            </div>
                        </div>
                        @if($type != 'price')
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.direction')</label>
                            <div class="col-md-6">
                                <span class="red">
                                    @if(str_contains($type, 'one_way'))
                                        @lang('message.reserve-direction-1-way')
                                        @else
                                        @lang('message.reserve-direction-2-way')
                                    @endif
                                </span>
                            </div>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.reserve-duration-car')</label>
                            <div class="col-md-6">
                                <span class="red">{{ $data['duration'] }} {{ listOfTimeIntervals($data['duration'], $data['interval']) }}</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.reserve-driver-car')</label>
                            <div class="col-md-6">
                                <span class="red">
                                    @if($model->with_driver)
                                        @lang('message.reserve-yes-car')
                                    @else
                                        @lang('message.reserve-no-car')
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.starting-point') <span style="color: red;">*</span></label>
                            <div class="col-md-6">
                                <span class="red">
                                    <input type="date" class="form-control" value="" name="starting_place" placeholder="{{ trans('message.enter-starting-point') }}">
                                </span>
                                <div class="input-group date" id="time" >
                                    <input type="date" class="form-control" value="" name="starting_time" placeholder="{{ trans('message.starting-time') }}">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.other-notes')</label>
                        </div>
                        <div class="input2_wrapper">
                            <textarea name="other_notes" id="" cols="10" rows="3" class="form-control" placeholder="{{ trans('message.other-notes') }}"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="margin-top" style="margin-top:30px;"></div>
                        <div class="border-3px"></div>
                        <div class="margin-top"></div>
                        <div class="clearfix"></div>

                        <input type="hidden" name="model" value="{{ $model->name }}">
                        <input type="hidden" name="price" value="{{ $data[$type] }}">
                        <input type="hidden" name="driver" value="{{ $model->with_driver ? trans('message.reserve-yes-car') : trans('message.reserve-no-car') }}">
                        @if($type != 'price')
                            <input type="hidden" name="direction" value="{{ str_contains($type, 'one_way') ? trans('message.reserve-direction-1-way') : trans('message.reserve-direction-2-way') }}">
                        @endif
                        <input type="hidden" name="duration" value="{{ $data['duration'] }} {{ listOfTimeIntervals($data['duration'], $data['interval']) }}">
                        <input type="submit" value="@lang('message.reserve-data-submit')" class="btn-default btn-form1-submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
@push('post-scripts')
    <script type="text/javascript" src="{{ mix('assets/js/datetimepicker.plugin.js') }}"></script>
    <script>
        $('#time').datetimepicker();
    </script>
@endpush
@push('post-css')
    <link rel="stylesheet" type="text/css" href="{{ mix('assets/css/datetimepicker.plugin.css') }}" />
    <style>
        .date {
            padding-top: 10px;
        }
        .booking-row .col-md-6 {
            padding-right: 0;
        }
        .other-notes {
            margin-top: 30px;
        }
        .input2_wrapper {
            padding: 10px 0 10px 0;
        }
        .input2_wrapper label {
            padding: 0 !important;
        }
        .glyphicon-calendar {
            cursor: pointer;
        }
        .bootstrap-datetimepicker-widget .btn[data-action=togglePeriod] {
            background-color: #D7733D;
        }
        .bootstrap-datetimepicker-widget table td span.active, .bootstrap-datetimepicker-widget table td.active,.bootstrap-datetimepicker-widget table td.active:hover{background-color:#D7733D !important;}
        .bootstrap-datetimepicker-widget table td.today:before{content:'';display:inline-block;border:solid transparent;border-width:0 0 7px 7px;border-bottom-color:red !important;border-top-color:rgba(0,0,0,0.2);position:absolute;bottom:4px;right:4px}
    </style>
@endpush