@extends('site.layouts.app')
@section('content')
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog_content">
          <div class="post post-short">
            <div class="post-story">
             <h2>{{ $model->name }}</h2>	
              <div class="post-story-body clearfix">
	              <p>{!! $model->description !!}</p>
              </div>
              <hr>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection