{{-- @extends('site.layouts.app')
@section('content')
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog_content">
          <div class="post post-short">
            <div class="post-story">
              <div class="row">
              	@foreach($model as $region) 
              		<div class="col-md-4">
              			<img src="http://via.placeholder.com/350x150">
						<b>
                      		<a href="{{ route('view.region', [$region->slug])}}">{{ $region->name }}</a>
                    	</b>
              			<p>{!! $region->description !!}</p>
              		</div>
              	@endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection --}}