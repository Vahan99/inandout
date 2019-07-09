@extends('site.layouts.app')
@section('content')
    <div class="container-fluid tour_content_bg">{{--start container-fluid--}}
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="blog_content">
                        <div class="post post-short ">
                            <div class="post-header">
                                <div class="post-slide ">
                                    <div id="sl1">
                                        <a class="sl1_prev" href="#"></a>
                                        <a class="sl1_next" href="#"></a>
                                        <div class="sl1_pagination"></div>
                                        <div class="carousel-box">
                                            <div class="inner">
                                                <div class="carousel main">
                                                    <ul>
                                                        @if(count($model->slider_images))
                                                            @foreach($model->slider_images as $image)
                                                                <li>
                                                                    <div class="sl1">
                                                                        <div class="sl1_inner">
                                                                            {{--<img src="/uploads/{{ $image }}" alt="{{ $model->name }}" class="img-responsive">--}}
                                                                            <img src="/uploads/second_img.png"
                                                                                 class="img-responsive">
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>{{--end of container-fluid--}}
                        <div class="post-story">
                            {{--<h2>{{ $model->name }}</h2>--}}
                            <div class="post-story-body clearfix">
                                {{--<p>{!! preg_replace('/\<[a-z0-9]*>&nbsp;<\/[a-z0-9]*>\s/', ' ', $model->desc); !!}</p>--}}
                                <p>{!! $model->desc; !!}</p>
                            </div>
                        </div>

                        {{--@if($model->meta_data)--}}
                            {{--<div class="post-story-body clearfix text-center">--}}
                                {{--<h5 class="font-green text-center">@lang('message.aboutas-min-title2')</h5>--}}
                                {{--<table width="100%" class="table-responsive table table-bordered">--}}
                                    {{--<thead>--}}
                                    {{--@php--}}
                                        {{--$head_texts = $model->meta_data['head_texts'];--}}
                                        {{--$lang = \App::getLocale();--}}
                                    {{--@endphp--}}
                                    {{--<tr>--}}
                                        {{--<th width="33.3%" class="text-center">--}}
                                            {{--{{ $head_texts['num_of_person_' . $lang] }}--}}
                                        {{--</th>--}}
                                        {{--<th width="33.3%" class="text-center">--}}
                                            {{--{{ $head_texts['price_' . $lang] }}--}}
                                        {{--</th>--}}
                                        {{--<th width="33.3%" class="text-center">--}}
                                            {{--{{ $head_texts['guide_' . $lang] }}--}}
                                        {{--</th>--}}
                                    {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                    {{--@foreach($model->meta_data['data'] as $key => $data)--}}
                                        {{--<tr>--}}
                                            {{--<td>--}}
                                                {{--{{ $data['name'] }}--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price']) }}">--}}
                                                    {{--{{ currency($data['price'], 'AMD', currency()->getUserCurrency()) }}--}}
                                                {{--</a>--}}
                                            {{--</td>--}}
                                            {{--<td>--}}
                                                {{--<a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price_guide']) }}">--}}
                                                    {{--{{ currency($data['price_guide'], 'AMD', currency()->getUserCurrency()) }}--}}
                                                {{--</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--@endif--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="content">
        <div class="container-fluid">
            <div class="container w_wt_table">
                <div class="table_wrapper">
                    @if($model->meta_data)
                        <div class="post-story-body clearfix text-center">
                            {{--<h5 class="--}}{{--font-green--}}{{-- text-center first_row">@lang('message.aboutas-min-title2')</h5>--}}
                            {{--<table width="100%" class="table-responsive table table-bordered">--}}
                                {{--<thead>--}}
                                @php
                                    $head_texts = $model->meta_data['head_texts'];
                                    $lang = \App::getLocale();
                                @endphp
                                {{--<tr class="headings_row">--}}
                                    {{--<th --}}{{--width="33.3%--}}{{--" class="text-center">--}}
                                        {{--{{ $head_texts['num_of_person_' . $lang] }}--}}
                                    {{--</th>--}}
                                    {{--<th --}}{{--width="33.3%--}}{{--" class="text-center">--}}
                                        {{--{{ $head_texts['price_' . $lang] }}--}}
                                    {{--</th>--}}
                                    {{--<th --}}{{--width="33.3%--}}{{--" class="text-center">--}}
                                        {{--{{ $head_texts['guide_' . $lang] }}--}}
                                    {{--</th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@foreach($model->meta_data['data'] as $key => $data)--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--{{ $data['name'] }}--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price']) }}">--}}
                                                {{--{{ currency($data['price'], 'AMD', currency()->getUserCurrency()) }}--}}
                                            {{--</a>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price_guide']) }}">--}}
                                                {{--{{ currency($data['price_guide'], 'AMD', currency()->getUserCurrency()) }}--}}
                                            {{--</a>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        </div>
                    @endif
                    <table class="single_tour_table ">
                        <tr>
                            <td colspan="3" class="text-center first_row">@lang('message.aboutas-min-title2')</td>
                        </tr>
                        <tr class="headings_row">
                            <th>{{ $head_texts['num_of_person_' . $lang] }}</th>
                            <th>{{ $head_texts['price_' . $lang] }}</th>
                            <th>{{ $head_texts['guide_' . $lang] }}</th>
                        </tr>

                        @foreach($model->meta_data['data'] as $key => $data)
                            <tr>
                                <td>
                                    {{ $data['name'] }}
                                </td>
                                <td>
                                    <a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price']) }}">
                                        {{ currency($data['price'], 'AMD', currency()->getUserCurrency()) }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('reserve-tour', ['tour-id' => $model->id, 'key' => $key, 'type' => 'price_guide']) }}">
                                        {{ currency($data['price_guide'], 'AMD', currency()->getUserCurrency()) }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>{{--end content--}}
    <div class="container-fluid tour_prices">
        <div class="price_includes">
            <div class="price_includes_wrapper">
                <div class="first_list">
                    <p class="first_list_heading">The price includes</p>
                    {!! $model->after_text !!}
                </div>
                <div class="second_list">
                    <p class="first_list_heading">The price does not include</p>
                    {!! $model->exclude !!}
                </div>
            </div>
        </div>
        <div class="container pre_footer">@include('site.partials.social-share')</div>

    </div>
    </div>
@endsection
@push('social-meta')
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $model->name }}"/>
    <meta property="og:description" content="{!! strip_tags($model->desc) !!}"/>
    <meta property="og:image" content="{{ URL::to('/') }}/uploads/{{ $model->slider_images[0] }}"/>
    <meta name="keywords" content="{{ $model->name }}"/>
    <meta name="description" content="{!! strip_tags($model->desc) !!}"/>
@endpush