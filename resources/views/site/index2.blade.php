@php
    $settings = \App\Setting::first();
@endphp
@extends('site.layouts.app')
@section('content')

<section class="main-page-image" style="background: url('{{asset('uploads')}}/{{ $settings->image }}')">
    <div style="background-color: rgba(30,44,55,.3);width: 100%;height: 100%">
        <h1 class="decoration-header decoration decoration-cont-style">@lang('message.aboutas-tours')</h1>

    </div>
    @if(count($tours) > 2)
        <div class="tours-slider">
            @foreach($tours as $tour)
                <div class="tour-single" style="background-image: url('{{asset('uploads/')}}/{{$tour->grid_image}}')">
                    <div class="tour-single-content">
                        <span>{{ $tour->name }}</span>
                        <p>{!! strip_tags($tour->desc) !!}</p>
                        <button class="btn btn-orange btn-animated"><a href="{{ route('tour-single', ['slug' => $tour->slug]) }}">@lang('message.read-more')</a></button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</section>
<section class="hotels">
    <div class="hotels-container">
        <h1 class="decoration decoration-cont-style">@lang('message.aboutas-hotels')</h1>
        @if(count($hotels))
            <div class="hotels-slider">
                @foreach($hotels as $hotel)
                    <div class="hotels-content">
                        @foreach($hotel as $h)
                            <a href="{{ route('hotel-single', ['slug' => $h->slug]) }}" class="hotels-item" style="background-image: url('/uploads/{{ $h->grid_image }}')">
                                    <div class="hotels-item-background">
                                        <p>{{$h->name}}</p>
                                    </div>
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
<section class="transport">
    <div class="transport-container">
        <div class="transport-content">
            <h1 class="decoration decoration-cont-style">@lang('message.aboutas-cars')</h1>
            @if(count($cars) > 2)
                <div class="transport-slider">
                    @foreach($cars as $car)
                        <div class="transport-slider-item">
                            <div class="transport-slider-image" style="background-image: url('{{ asset('uploads/'.$car->grid_image) }}')"></div>
                            <div class="transport-slider-item-content">
                                <h1>{{ $car->name }}</h1>
                                <p>{!! strip_tags($car->desc) !!}</p>
                                <button class="btn btn-orange">
                                    <a href="{{ route('car-single', ['slug' => $car->slug]) }}">@lang('message.read-more')
                                    </a>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
