@extends('site.layouts.app')
@section('content')
<div id="content">
    <div class="container">
        <div class="blog_content">
            <div class="post post-short">
                <div class="post-header">
                    <div class="post-slide">
                        <div id="sl1">
                            <a class="sl1_prev" href="#"></a>
                            <a class="sl1_next" href="#"></a>
                            <div class="sl1_pagination"></div>
                            <div class="carousel-box">
                                <div class="inner">
                                    <div class="carousel main">
                                        <ul>
                                            @foreach($model->images as $image)
                                                <li>
                                                    <div class="sl1">
                                                        <div class="sl1_inner">
                                                            <img src="/uploads/{{ $image->image }}" alt="{{ $model->name }}" class="img-responsive">
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="post-story">
                    <h2>{{ $model->name }}</h2>
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
    @include('site.partials.social-share')
    </div>
</div>
@endsection
@push('social-meta')
    <meta property="og:url"           content="{{ url()->current() }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $model->name }}" />
    <meta property="og:description"   content="{!! strip_tags($model->desc) !!}" />
    <meta property="og:image"         content="{{ URL::to('/') }}/uploads/{{ $model->images[0]->image }}" />
    <meta name="keywords"         content="{{ $model->name }}" />
    <meta name="description"      content="{!! strip_tags($model->desc) !!}" />
@endpush
