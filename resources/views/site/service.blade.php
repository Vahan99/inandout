@extends('site.layouts.app')
@section('content')
  <div id="parallax2" class="parallax">
    <div class="bg2 parallax-bg" style="background-image: url('/uploads/{{ $image }}')"></div>
    <div class="overlay"></div>
    <div class="parallax-content">
      <div class="container">
      </div>
    </div>
  </div>
<div class="main">
  <h3 style="text-align:center; margin-top: 50px;">@lang('message.title-page-service')</h3>
  <div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <div class="blog_content">
            <div class="post post-short">
              @if(count($model))
              @foreach($model as $service)
              <div class="post-story">
                <h5 style="color: #1cbbb4">{{ $service->name }}</h5>
                  <div class="post-story-body clearfix">
                    <p>{!! $service->desc !!}</p>
                  </div>
              </div>
              <hr>
              @endforeach
              @else
                <br>
                <h4 class="text-center">@lang('message.result-not-found')</h4>
              @endif
            </div>
            {{ $model->links('vendor.pagination.default') }}
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
