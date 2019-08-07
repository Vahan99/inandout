@extends('site.layouts.app')
@section('content')

<div class="aboutus_main_pic" style="background-image: url('/uploads/{{ $model->images }}')"></div>
<div id="main">
<div id="why1" style="background-color: #fff;">
	<div class="container">
		<div class="d-block text-center animated-header">
			<h1 class="decoration decoration-cont-style animated-about" data-animation="fadeInUp" data-animation-delay="200">@lang('message.title2-page-aboutas')</h1>
		</div>
	</div>
</div>

<div style="background-color: #fff;">
	<div id="company1">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
						<div class="about_desc" data-animation="fadeIn" data-animation-delay="300">{!! $model->desc !!}</div>
				</div>
				{{--<div class="col-sm-12 col-md-6 col-md-pull-6">--}}
					{{--<img src="/assets/images/logo/logo-lg.png" alt="" class="img1 img-responsive animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="300">--}}
				{{--</div>--}}
			</div>
		</div>
	</div>
</div>

@if(count(\App\Team::all()))
<div id="team1">
	<div class="container">
		<h2 class="animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="200">@lang('message.our-team')</h2>
		<br>
		<div class="row">
			@foreach(\App\Team::all() as $employee)
			<div class="col-sm-3">
				<div class="thumb3 animated flipInY visible" data-animation="flipInY" data-animation-delay="300">
					<div class="thumbnail clearfix">
						<figure class="" style="overflow: hidden">
							<img src="/uploads/{{ $employee->image }}" alt="" class="img-responsive" style="height: 250px">
							<div class="over">{{ $employee->rank }}</div>
						</figure>
						<div class="caption">
							<div class="txt1">{{ $employee->name }}</div>
							<div class="txt2">{!! $employee->desc !!}</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
</div>
@endif
@endsection