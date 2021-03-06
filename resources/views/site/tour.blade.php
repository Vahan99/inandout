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
                          @if(count($model->slider_images))
                          @foreach($model->slider_images as $image)
                          <li>
                            <div class="sl1">
                              <div class="sl1_inner">
                                <img src="/uploads/{{ $image }}" alt="" class="img-responsive">
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
            <div class="post-story">
              <h2>{{ $model->name }}</h2>
              <div class="post-story-body clearfix">
                <p>{!! $model->desc !!}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

