@php
    $settings = \App\Setting::first();
@endphp
@include('site.layouts.header2')
<main>
    <div class="empty-div"></div>
    <section class="main-page-image" style="background-image: url('{{asset('assets')}}/img/main-page-background.jpg')">
        <h1 class="decoration-header decoration decoration-cont-style">@lang('message.aboutas-tours')</h1>
        @if(count($tours) > 2)
            <div class="tours-slider">
                @foreach($tours as $tour)
                    <div class="tour-single" style="background-image: url('../uploads/{{ $tour->grid_image }}')">
                        <div class="tour-single-content">
                                    <span>{{ $tour->name }}</span>
                            <p>{!! strip_tags($tour->desc) !!}</p>
                            <a class="btn">{{ route('tour-single', ['slug' => $tour->slug]) }}@lang('message.read-more')</a></button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
    <section class="hotels">
        <div class="hotels-container">
            <h1 class="decoration decoration-cont-style">@lang('message.aboutas-hotels')</h1>
            @if(count($hotels) > 2)
                <div class="hotels-slider">
                    @foreach($hotels as $hotel)
                        <a href="javascript:;" class="hotels-content">
                            @foreach($hotel as $h)
                                    <div class="hotels-item" style="background-image: url('/uploads/{{ $h->grid_image }}')"></div>
                            @endforeach
                        </a>
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
                                <div class="transport-slider-image" style="background-image: url('/uploads/{{ $car->grid_image }}')"></div>
                                <div class="transport-slider-item-content">
                                    <h1>{{ $car->name }}</h1>
                                    <p>{!! strip_tags($car->desc) !!}</p>
                                    <button class="btn"><a href="{{ route('car-single', ['slug' => $car->slug]) }}">@lang('message.read-more')</a></button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </section>
</main>
@include('site.layouts.footer2')
</body>
</html>