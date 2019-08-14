@extends('site.layouts.app')
@section('content')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    {{ Form::open(['route' => 'send.hotel.mail', 'method' => 'post', 'files' => true,'id']) }}
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 reserve-space">
                    <h3 class="text-center hch2">{{ $model->name }}</h3>
                    <div class="clearfix"></div>
                    <div class="col-md-4 booking-row">
                        <h4 class="line"> @lang('message.reserve-info-title') </h4>
                        <p style="font-size:13px;">@lang('message.reserve-form-title-validate') <span style="color:red;">*</span>&nbsp; @lang('message.reserve-validate-title'):</p>

                        <div class="input2_wrapper">
                            <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-name') <span style="color:red;">*</span></label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="text" class="{{ $errors->has('name') ? 'error-input' : ''}} form-control" value="{{ old('name') }}" spellcheck="false" name="name" placeholder="@lang('message.reserve-form-name')">
                                <li style="list-style-type: none!important" class="{{ $errors->has('name') ? 'error-li' : 'name'}}">{{ $errors->first('name') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-surname') <span style="color:red;">*</span></label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input placeholder="@lang('message.reserve-form-surname')" type="text" class=" {{ $errors->has('lastname') ? 'error-input' : ''}} form-control" value="{{ old('lastname') }}" spellcheck="false" name="lastname">
                                <li style="list-style-type: none!important" class="{{ $errors->has('lastname') ? 'error-li' : ''}}">{{ $errors->first('lastname') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-phone') <span style="color:red;">*</span></label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="phone" placeholder="@lang('message.reserve-form-phone')" class=" {{ $errors->has('phone') ? 'error-input' : ''}} form-control" value="{{ old('phone') }}" spellcheck="false" name="phone">
                                <li style="list-style-type: none!important" class="{{ $errors->has('phone') ? 'error-li' : ''}}">{{ $errors->first('phone') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-email') <span style="color:red;">*</span></label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="email" placeholder="@lang('message.reserve-form-email')" class=" {{ $errors->has('email') ? 'error-input' : ''}} form-control" value="{{ old('email') }}" spellcheck="false" name="email">
                                <li style="list-style-type: none!important" class="{{ $errors->has('email') ? 'error-li' : ''}}">{{ $errors->first('email') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-city') <span style="color:red;">*</span></label>
                            <div class="col-md-7" style="padding-right:0;padding-left:0;">
                                <input type="text" placeholder="@lang('message.reserve-form-city')" class=" {{ $errors->has('city') ? 'error-input' : ''}} form-control" value="{{ old('city') }}" spellcheck="false"  name="city">
                                <li style="list-style-type: none!important" class="{{ $errors->has('city') ? 'error-li' : ''}}">{{ $errors->first('city') }}</li>
                            </div>
                        </div>
                        {{--<div class="clearfix"></div>--}}
                        {{--<div class="input2_wrapper">--}}
                            {{--<label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-address') <span style="color:red;">*</span></label>--}}
                            {{--<div class="col-md-7" style="padding-right:0;padding-left:0;">--}}
                                {{--<input type="text" placeholder="@lang('message.reserve-form-address')" class=" {{ $errors->has('address') ? 'error-input' : ''}} form-control" value="{{ old('address') }}" spellcheck="false" name="address">--}}
                                {{--<li style="list-style-type: none!important" class="{{ $errors->has('address') ? 'error-li' : ''}}">{{ $errors->first('address') }}</li>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 booking-row">
                        <h4 class="line">@lang('message.reserve-you-have-chosen')`</h4>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-name')`</label>
                            <div class="col-md-6" style="padding-right:0;padding-left:0;">
                                <span class="red">{{ $model->name }}</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6" style="padding-left:0;padding-top:12px;">@lang('message.hotel-room-type-title')`</label>
                            <div class="col-md-6" style="padding-right:0;padding-left:0;">
                                <span class="red">{{ $roomType }}</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6" style="padding-left:0;padding-top:12px;">@lang('message.reserve-price-car')`</label>
                            <div class="col-md-6" style="padding-right:0;padding-left:0;">
                                <span class="red"> {{ currency($price, 'AMD', currency()->getUserCurrency()) }}</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        {{--<div class="input2_wrapper">--}}
                            {{--<label class="col-md-6" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-address')`</label>--}}
                            {{--<div class="col-md-6" style="padding-right:0;padding-left:0;">--}}
                                {{--<span class="red">{{ $model->address }}</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="clearfix"></div>--}}
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6" style="padding-left:0;padding-top:12px;">@lang('message.other-notes')</label>
                        </div>
                        <div class="input2_wrapper">
                            <div class="col-md-12" style="padding-left:0;padding-top:12px;">
                                <span class="red">
                                    <textarea name="other_notes" id="" cols="10" rows="3" class="form-control" placeholder="{{ trans('message.other-notes') }}"></textarea>
                                </span>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div class="margin-top" style="margin-top:30px;"></div>
                        <div class="border-3px"></div>
                        <div class="margin-top"></div>
                        <div class="clearfix"></div>

                        <input type="hidden" name="model_id" value="{{ $model->id }}">
                        <input type="hidden" name="price" value="{{ $price }}">
                        <input type="hidden" name="duration" value="{{ $duration }}">
                        <input type="hidden" name="room_type" value="{{ $roomType }}">

                        <input type="submit" value="@lang('message.reserve-data-submit')" class="btn-default btn-form1-submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
