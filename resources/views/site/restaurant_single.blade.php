@extends('site.layouts.app')
@section('content')
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
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
                <p>{!! $model->description !!}</p>
              </div>
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
  <meta name="keywords"         content="{{ $model->name }}" />
  <meta name="description"      content="{!! strip_tags($model->description) !!}" />
  <meta property="og:image"         content="{{ URL::to('/') }}/uploads/{{ $model->images[0]->image }}" />
@endpush