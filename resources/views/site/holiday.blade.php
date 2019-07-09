@extends('site.layouts.app')
@section('content')
<div id="parallax2" class="parallax">
  <div class="bg2 parallax-bg" style="background-image: url('/uploads/{{ $model->images }}')"></div>
  <div class="overlay"></div>
  <div class="parallax-content">
    <div class="container">
    </div>
  </div>
</div>
  <div class="main">
  <div id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog_content">
          <div class="post post-short">
            <div class="post-story">
              <h2 style="text-align:center; color:#fa852b;">
                <b>@lang('message.title-page-holiday')</b></h2>
                <hr>
                <section class="content col-md-9 col-sm-12 col-xs-12" style="text-align:center !important;">
                  <div class="text-image">
                    {!! $model->desc !!}
                  </div>
                </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
