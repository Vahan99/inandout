@extends('site.layouts.app')
@section('content')
{{ Form::open(['route' => 'send.tour.mail', 'method' => 'post', 'files' => true,'id']) }}
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 reserve-space">
                    <h3 class="text-center hch2">{{ $model->name }}</h3>
                    <div class="clearfix"></div>
                    <div class="col-md-4 booking-row">
                        <h4 class="line"> @lang('message.reserve-info-title') </h4>
                        <p style="font-size:13px;">@lang('message.reserve-validate-title'):</p>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-name') <span style="color:red;">*</span></label>
                            <div class="col-md-7">
                                <input type="text"  placeholder="@lang('message.reserve-form-name')" class="{{ $errors->has('name') ? 'error-input' : ''}} form-control" value="{{ old('name') }}" spellcheck="false" name="name">
                                <li style="list-style-type: none;" class="{{ $errors->has('name') ? 'error-li' : ''}}">{{ $errors->first('name') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-surname') <span style="color:red;">*</span></label>
                            <div class="col-md-7">
                                <input type="text"  placeholder="@lang('message.reserve-form-surname')" class="{{ $errors->has('lastname') ? 'error-input' : ''}} form-control" value="{{ old('lastname') }}" spellcheck="false" name="lastname">
                                <li style="list-style-type: none;" class="{{ $errors->has('lastname') ? 'error-li' : ''}}">{{ $errors->first('lastname') }}</li>
                            </div>
                        </div>
						<div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-phone') <span style="color:red;">*</span></label>
                            <div class="col-md-7">
                                <input type="phone" placeholder="@lang('message.reserve-form-phone')"  class="{{ $errors->has('phone') ? 'error-input' : ''}} form-control" value="{{ old('phone') }}" spellcheck="false" name="phone">
                                <li style="list-style-type: none;" class="{{ $errors->has('phone') ? 'error-li' : ''}}">{{ $errors->first('phone') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-email') <span style="color:red;">*</span></label>
                            <div class="col-md-7">
                                <input type="email" placeholder="@lang('message.reserve-form-email')"  class="{{ $errors->has('email') ? 'error-input' : ''}} form-control" value="{{ old('email') }}" spellcheck="false" name="email">
                                <li style="list-style-type: none;" class="{{ $errors->has('email') ? 'error-li' : ''}}">{{ $errors->first('email') }}</li>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-5">@lang('message.reserve-form-city') <span style="color:red;">*</span></label>
                            <div class="col-md-7">
                                <input type="text" placeholder="@lang('message.reserve-form-city')" class="{{ $errors->has('city') ? 'error-input' : ''}} form-control" value="{{ old('city') }}" spellcheck="false"  name="city">
                                <li style="list-style-type: none;" class="{{ $errors->has('city') ? 'error-li' : ''}}">{{ $errors->first('city') }}</li>
                            </div>
                        </div>
                        {{--<div class="clearfix"></div>--}}
                        {{--<div class="input2_wrapper">--}}
                            {{--<label class="col-md-5">@lang('message.reserve-form-address') <span style="color:red;">*</span></label>--}}
                            {{--<div class="col-md-7">--}}
                                {{--<input type="text" class="{{ $errors->has('address') ? 'error-input' : ''}} form-control" value="{{ old('address)') }}" spellcheck="false" name="address">--}}
                                {{--<li style="list-style-type: none;" class="{{ $errors->has('address') ? 'error-li' : ''}}">{{ $errors->first('address') }}</li>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5 booking-row">
                        <h4 class="line">@lang('message.reserve-you-have-chosen')</h4>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.reserve-data-number-of-individuals-in-the-group')</label>
                            <div class="col-md-6">
                                <span class="red">{{ $data['name'] }}</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">
                                @if($type == 'price_guide')
                                    @lang('message.reserve-data-price-per-person-guide')
                                @else
                                    @lang('message.reserve-data-price-per-person')
                                @endif
                            </label>
                            <div class="col-md-6">
                                <span class="red">{{ $data[$type] }} <sub><small>AMD</small></sub></span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.reserve-data-payment')</label>
                            <div class="col-md-6">
                                <span class="red">@lang('message.reserve-data-cash')</span>
                            </div>
                        </div>
                        @if($model->show_duration)
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.reserve-duration-car')</label>
                            <div class="col-md-6">
                                <span class="red">{{ $model->show_duration }}</span>
                            </div>
                        </div>
                        @endif
                        <div class="clearfix"></div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.starting-point')</label>
                            <div class="col-md-6">
                                <span class="red">
                                    <input type="date" class="form-control" value="" name="starting_place" required="" placeholder="{{ trans('message.enter-starting-point') }}">
                                </span>
                                <div class='input-group date' id="datatimepiker" >
                                    <input type='date' name="starting_time" class="form-control" placeholder="{{ trans('message.starting-time') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="input2_wrapper">
                            <label class="col-md-6">@lang('message.other-notes')</label>
                        </div>
                        <div class="input2_wrapper">
                            <textarea name="other_notes" id="" cols="10" rows="3" class="form-control other-notes" placeholder="{{ trans('message.other-notes') }}"></textarea>
                        </div>
                        <div class="clearfix"></div>
                        <div class="margin-top" style="margin-top:30px;"></div>
                        <div class="border-3px"></div>
                        <div class="margin-top"></div>
                        <div class="clearfix"></div>
                        <input type="hidden" name="tourname" value="{{ $model->name }}">
                        <input type="hidden" name="price" value="{{ $data[$type] }}">
                        <input type="hidden" name="personnumber" value="{{ $data['name'] }}">
                        <input type="hidden" name="type" value="{{ $type }}">
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
        $('#datatimepiker').datetimepicker();
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