@extends('site.layouts.app')
@section('content')
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="blog_content" style="margin-top: 50px">
                        <div class="post post-full">
                            <div class="clearfix"></div>
                            {{--<div class="post-header">--}}
                                {{--<div class="post-slide">--}}
                                    {{--<div id="sl1">--}}
                                        {{--<a class="sl1_prev" href="#"></a>--}}
                                        {{--<a class="sl1_next" href="#"></a>--}}
                                        {{--<div class="sl1_pagination"></div>--}}
                                        {{--<div class="carousel-box">--}}
                                            {{--<div class="inner">--}}
                                                {{--<div class="carousel main">--}}
                                                    {{--<div class="caroufredsel_wrapper">--}}
                                                        {{--<ul>--}}
                                                            {{--@foreach($model->images as $image)--}}
                                                                {{--<li style="width: 1132px;">--}}
                                                                    {{--<div class="sl1">--}}
                                                                        {{--<div class="sl1_inner">--}}
                                                                            {{--<img src="/uploads/{{ $image->image }}"--}}
                                                                                 {{--alt="{{ $model->name }}" class="img-responsive">--}}
                                                                        {{--</div>--}}
                                                                    {{--</div>--}}
                                                                {{--</li>--}}
                                                            {{--@endforeach--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="post-story">
                                <h3 class="hch">{{ $model->name }}</h3>
                                {{--<div class="post-story-info margin-top">--}}
                                    {{--<div class="date12 col-md-offset-5">@lang('message.residence-desc')</div>--}}
                                {{--</div>--}}
                                <div class="post-story-body clearfix">
                                    <p>
                                        {!! $model->description !!}
                                    </p>
                                </div>
                                @if($model->data)
                                    @if($model->meta_data)
                                        <br>
                                        <br>
                                        <h5 class="text-center">@lang('message.apartment-price-policy-title')</h5>
                                        <table class="table table-bordered" id="">
                                            <thead>
                                            <tr id="datefield">
                                                <th class="text-center">@lang('message.hotel-room-type-title')</th>
                                                @if(isset($model) && $model->meta_data[0])
                                                    @foreach($model->meta_data[0]['dates'] as $date)
                                                        <th class="text-center">
                                                            {{ $date }}
                                                        </th>
                                                    @endforeach
                                                @endif
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($model) && $model->meta_data[0])
                                                @foreach($model->meta_data[0]['data'] as $row => $data)
                                                    <tr class="tr-row text-center">
                                                    @foreach($data as $key => $value)
                                                        @if($key === 0)
                                                                <td class="text-center">
                                                                    {{ \App\RoomType::find($value) ? \App\RoomType::find($value) ->name : ''}}
                                                                </td>
                                                            @else
                                                                <td class="text-center">
                                                                    <a class="color-orange" href="{{ route('reserve-hotel', ['residence_id' => $model->id, 'row' => $row, 'key' => $key]) }}">
                                                                        {{ currency($value, 'AMD', currency()->getUserCurrency()) }}
                                                                    </a>
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    @endif
                                    <div class="post-story-body clearfix text-center">
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
                                                        {{ $data['name'][\app::getlocale()] }}
                                                    </td>
                                                    <td>
                                                        @if($data['qty'] == 'v')
                                                            <i class="fa fa-check text-success"></i>
                                                        @endif
                                                        @if($data['qty'] == 'x')
                                                            <i class="fa text-danger">&#xf00d;</i>
                                                            {{--<i class="fa fa-remove text-danger"></i>--}}
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
                            </div>
                            {!! $model->after_text !!}
                            <div class="post-story-tags clearfix">
                                <div class="tags_wrapper"><b>Address</b>: <a>{{ $model->address }}</a> </div>
                            </div>
                            @include('site.partials.social-share')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('social-meta')
    <meta property="og:url"           content="{{ url()->current() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $model->name }}" />
    <meta property="og:description"   content="{!! strip_tags($model->description) !!}" />
    <meta name="keywords"             content="{{ $model->name }}" />
    <meta name="description"          content="{!! strip_tags($model->description) !!}" />
    @if($model->images()->count())
        <meta property="og:image"         content="{{ URL::to('/') }}/uploads/{{ $model->images[0]->image }}" />
    @endif
@endpush
