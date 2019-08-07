@extends('site.layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ dump($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{ Form::open(['route' => 'send.residence.mail', 'method' => 'post', 'files' => true,'id']) }}
<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="text-center hch2">{{ $model->name }} </h3>
                <div class="clearfix"></div>
                <div class="col-md-4 booking-row">
                    <h4 class="line"> @lang('message.reserve-info-title') </h4>
                    <p style="font-size:13px;">@lang('message.reserve-form-title-validate')<span style="color:red;">*</span>&nbsp; @lang('message.reserve-validate-title'):</p>

                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-name')<span style="color:red;">*</span></label>
                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control {{ $errors->has('name') ? 'error-input' : ''}}" value="{{ old('name') }}" spellcheck="false" name="name">
                            <li class="{{ $errors->has('name') ? 'error-li' : ''}}" style="list-style-type: none">{{ $errors->first('name') }}</li>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-surname')<span style="color:red;">*</span></label>
                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control {{ $errors->has('lastname') ? 'error-input' : ''}}" value="{{ old('lastname') }}" spellcheck="false" name="lastname">
                            <li class="{{ $errors->has('lastname') ? 'error-li' : ''}}" style="list-style-type: none">{{ $errors->first('lastname') }}</li>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-phone')<span style="color:red;">*</span></label>
                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="phone" class="form-control {{ $errors->has('phone') ? 'error-input' : ''}}" value="{{ old('phone') }}" spellcheck="false" name="phone">
                            <li class="{{ $errors->has('phone') ? 'error-li' : ''}}" style="list-style-type: none">{{ $errors->first('phone') }}</li>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-email')</label>
                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="email" class="form-control {{ $errors->has('email') ? 'error-input' : ''}}" value="{{ old('email') }}" spellcheck="false" name="email">
                            <li class="{{ $errors->has('email') ? 'error-li' : ''}}" style="list-style-type: none">{{ $errors->first('email') }}</li>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-city')<span style="color:red;">*</span></label>
                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control {{ $errors->has('city') ? 'error-input' : ''}}" value="{{ old('city') }}" spellcheck="false"  name="city">
                            <li class="{{ $errors->has('city') ? 'error-li' : ''}}" style="list-style-type: none">{{ $errors->first('city') }}</li>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-5" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-address')<span style="color:red;">*</span></label>
                        <div class="col-md-7" style="padding-right:0;padding-left:0;">
                            <input type="text" class="form-control {{ $errors->has('address') ? 'error-input' : ''}}" value="{{ old('address') }}" spellcheck="false" name="address">
                            <li class="{{ $errors->has('address') ? 'error-li' : ''}}" style="list-style-type: none">{{ $errors->first('address') }}</li>
                        </div>
                    </div>

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
                        <label class="col-md-6" style="padding-left:0;padding-top:12px;">@lang('message.reserve-price-car')`</label>
                        <div class="col-md-6" style="padding-right:0;padding-left:0;">
                            <span class="red">{{ currency($data['price'], 'AMD', currency()->getUserCurrency()) }}</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-6" style="padding-left:0;padding-top:12px;">@lang('message.reserve-form-address')`</label>
                        <div class="col-md-6" style="padding-right:0;padding-left:0;">
                            <span class="red">{{ $model->address }}</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input2_wrapper">
                        <label class="col-md-6" style="padding-left:0;padding-top:12px;">@lang('message.reserve-duration-car')</label>
                        <div class="col-md-6" style="padding-right:0;padding-left:0;">
                            <span class="red">
                                {{ $data['duration'] }} {{ listOfTimeIntervals($data['duration'], $data['interval']) }}
                            </span>
                        </div>
                    </div>

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
                    <input type="hidden" name="price" value="{{ $data['price'] }}">
                    <input type="hidden" name="duration" value="{{ $data['duration'] }} {{ listOfTimeIntervals($data['duration'], $data['interval']) }}">

                    <input type="submit" value="@lang('message.reserve-data-submit')" class="btn-default btn-form1-submit">
                </div>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
@endsection