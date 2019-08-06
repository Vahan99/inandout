@extends('site.layouts.app')
@section('content')
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <section class="tour-slider-container">
          <div class="tour-info-slider">
            @if(count($model->images))
              @foreach($model->images as $image)
                <div class="tour-info-slider-item" style="background-image: url({{ asset('uploads/'.$image->image )}})"></div>
              @endforeach
            @endif
          </div>
        </section>
        <div class="blog_content">
          <div class="post post-short">
            <div class="post-story">
              <h3>{{ $model->name }}</h3>
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