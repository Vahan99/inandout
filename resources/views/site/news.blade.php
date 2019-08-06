@extends('site.layouts.app')
@section('content')
    <div id="content">
        <div class="container">
            <div class="col-sm-12">
                <section class="tour-slider-container">
                    <div class="tour-info-slider">
                        @if($model->images()->count())
                            @foreach($model->images as $image)
                                <div class="tour-info-slider-item"
                                     style="background-image: url({{ asset('uploads/'.$image->image )}})"></div>
                            @endforeach
                        @endif
                    </div>
                </section>
                <div class="blog_content">
                    <div class="post post-short">
                        <div class="post-story">
                            <h3>{{ $model->name }}</h3>
                            <div class="post-story-body clearfix">
                                {!! $model->desc !!}
                            </div>
                            <div class="post-story-info">
                                <div class="by">
                                    <i class="fa fa-clock-o font-green"></i>
                                    {{ $model->created_at->format('M d Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            @include('site.partials.social-share')
        </div>
    </div>
@endsection
@push('social-meta')
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="{{ $model->name }}"/>
    <meta property="og:description" content="{!! strip_tags($model->desc) !!}"/>
    <meta property="og:image" content="{{ URL::to('/') }}/uploads/{{ $model->images[0]->image }}"/>
    <meta name="keywords" content="{{ $model->name }}"/>
    <meta name="description" content="{!! strip_tags($model->desc) !!}"/>
@endpush
