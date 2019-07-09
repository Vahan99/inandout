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
<div id="main">
<div id="why1" style="background-color: #fff;">
	<div class="container">

		<h2 class="animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="200">@lang('message.title1-page-aboutas')</h2>
		<br><br>

		<div class="row">
			<div class="col-sm-4">
				<div class="thumb2 animated flipInY visible" data-animation="flipInY" data-animation-delay="400">
					<div class="thumbnail clearfix">
						<a href="#">
							<figure class="">
								<img src="/assets/images/why2.png" alt="" class="img1 img-responsive">
								<img src="/assets/images/why2_hover.png" alt="" class="img2 img-responsive">
							</figure>
							<div class="caption">
								<div class="txt1">@lang('message.aboutas-min-title1')</div>
								<div class="txt2">@lang('message.aboutas-min-desc1')</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="thumb2 animated flipInY visible" data-animation="flipInY" data-animation-delay="500">
					<div class="thumbnail clearfix">
						<a href="#">
							<figure class="">
								<img src="/assets/images/why3.png" alt="" class="img1 img-responsive">
								<img src="/assets/images/why3_hover.png" alt="" class="img2 img-responsive">
							</figure>
							<div class="caption">
								<div class="txt1">@lang('message.aboutas-min-title2')</div>
								<div class="txt2">@lang('message.aboutas-min-desc2')</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="thumb2 animated flipInY visible" data-animation="flipInY" data-animation-delay="600">
					<div class="thumbnail clearfix">
						<a href="#">
							<figure class="">
								<img src="/assets/images/why4.png" alt="" class="img1 img-responsive">
								<img src="/assets/images/why4_hover.png" alt="" class="img2 img-responsive">
							</figure>
							<div class="caption">
								<div class="txt1">@lang('message.aboutas-min-title3')</div>
								<div class="txt2">@lang('message.aboutas-min-desc3')</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="background-color: #fff;">
	<div id="company1">
		<div class="container">
			<h2 class="animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="200">@lang('message.title2-page-aboutas')</h2>
			<br>
			<div class="row">
				<div class="col-sm-12 col-md-6 col-md-push-6">
					<div class="content">
						<div class="" data-animation="fadeIn" data-animation-delay="300">{!! $model->desc !!}</div>
						<div class="distance1 animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="0">
							<div class="txt">@lang('message.aboutas-tours')</div>
							<div class="bg">
								<div class="animated-distance" data-num="94" data-duration="1300" data-animation-delay="0" style="width: 94%;"><span>94%</span></div>
							</div>
						</div>

						<div class="distance1 animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="100">
							<div class="txt">@lang('message.aboutas-hotels')</div>
							<div class="bg">
								<div class="animated-distance" data-num="87" data-duration="1300" data-animation-delay="100" style="width: 87%;"><span>87%</span></div>
							</div>
						</div>

						<div class="distance1 animated fadeInUp visible" data-animation="fadeInUp" data-animation-delay="200">
							<div class="txt">@lang('message.aboutas-cars')</div>
							<div class="bg">
								<div class="animated-distance" data-num="75" data-duration="1300" data-animation-delay="200" style="width: 75%;"><span>75%</span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-md-pull-6">
					<img src="/assets/images/logo/logo-lg.png" alt="" class="img1 img-responsive animated fadeInLeft visible" data-animation="fadeInLeft" data-animation-delay="300">
				</div>
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
						<figure class="">
							<img src="/uploads/{{ $employee->image }}" alt="" class="img-responsive">
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