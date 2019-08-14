@extends('site.layouts.app')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <section class="tour-slider-container">
                        <div class="tour-info-slider">
                            @if($model->sliderImages()->count())
                                @foreach($model->sliderImages as $image)
                                    <div class="tour-info-slider-item" style="background-image: url({{ asset('uploads/'.$image->name )}})"></div>
                                @endforeach
                            @endif
                        </div>
                    </section>
                    <div class="blog_content">
                        <div class="post post-full">
                        </div>
                        <div class="post-story">
                            <div class="post-story-body clearfix">
                                {{ $model->name }}
                                {!! $model->desc !!}
                            </div>
                            @if(isset($model->amenity_data))
                                <div class="post-story-body clearfix text-center">
                                    {{--                        <b style="font-size:18px;">@lang('message.residence-properties')</b>--}}
                                    @if($model->amenity_data)
                                        <table class="table-responsive table table-bordered" id="">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center; font-size: 16px" colspan="2">@lang('message.residence-properties')</th>
                                                {{--                                 <th style="text-align: center">@lang('message.table-qty')</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody id="append-place">
                                            @foreach($model->amenity_data as $key => $data)
                                                <tr>
                                                    <td style="width: 80%">
                                                        {{ $data['name'][\App::getLocale()] }}
                                                    </td>
                                                    <td>
                                                        @if($data['qty'] == 'v')
                                                            <i class="fa fa-check text-success"></i>
                                                        @endif
                                                        @if($data['qty'] == 'x')
                                                            <i class="fa text-danger">&#xf00d;</i>
                                                        @endif
                                                        @if(($data['qty'] !== 'v') && ($data['qty'] !== 'x'))
                                                            {{ $data['qty'] }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            @endif

                            <div style="margin-top: 20px; margin-bottom: 20px; width: 100%">
                            @if($model->meta_data)
                                    @if($model->with_driver)
                                        <h4 class=" text-center">@lang('message.price-policy-with-driver')</h4>
                                    @endif
                                    <table class="text-center" style="width: 100% !important;">
                                    <thead>
                                            <tr>
                                                @if($model->with_driver)
                                                    <th class="text-center">
                                                        @lang('message.duration')
                                                    </th>
                                                    <th class="text-center">@lang('message.reserve-direction-2-way')</th>
                                                    <th class="text-center">@lang('message.reserve-direction-1-way')</th>
                                                @else
                                                    <th class="text-center" colspan="2">
                                                        @lang('message.price-policy-without-driver')
                                                    </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($model->meta_data as $key => $data)
                                             @if(
                                                !is_null($data['duration'])&&
                                                !is_null($data['one_way'])&&
                                                !is_null($data['two_way'])&&
                                                !is_null($data['interval'])
                                                )
                                                <tr>
                                                    <td>
                                                        {{ $data['duration'] }} {{ listOfTimeIntervals($data['duration'], $data['interval']) }}
                                                    </td>
                                                    @if($model->with_driver)
                                                        <td>
                                                            <a href="{{ route('reserve-car', ['driver_id' => $model->id, 'key' => $key, 'type' => 'one_way']) }}">
                                                                {{ currency($data['one_way'], 'AMD', currency()->getUserCurrency()) }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('reserve-car', ['driver_id' => $model->id, 'key' => $key, 'type' => 'two_way']) }}">
                                                                {{ currency($data['two_way'], 'AMD', currency()->getUserCurrency()) }}
                                                            </a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <a href="{{ route('reserve-car', ['driver_id' => $model->id,'key' => $key, 'type' => 'price']) }}">
                                                                {{ currency($data['price'], currency()->getUserCurrency()) }}
                                                            </a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                            {!! $model->after_text !!}
                            @include('site.partials.social-share')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('social-meta')
    <meta property="og:url"          content="{{ url()->current() }}"/>
    <meta property="og:type"         content="website"/>
    <meta property="og:title"        content="{{ $model->name }}"/>
    <meta property="og:description"  content="{!! strip_tags($model->desc) !!}"/>
    <meta name="keywords"        content="{{ $model->name }}"/>
    <meta name="description"     content="{!! strip_tags($model->desc) !!}"/>
    <meta property="og:image"        content="{{ URL::to('/') }}/uploads/{{ $model->sliderImages[0]->name }}" />
@endpush

