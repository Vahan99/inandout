@extends('site.layouts.app')
@section('content')
<div id="content">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <div class="blog_content">
               <div class="post post-full">
                  <div class="post-header">
                     <div class="post-slide">
                        <div id="sl1">
                           <a class="sl1_prev" href="#"></a>
                           <a class="sl1_next" href="#"></a>
                           <div class="sl1_pagination"></div>
                           <div class="carousel-box">
                              <div class="inner">
                                 <div class="carousel main">
                                    <div class="caroufredsel_wrapper">
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
                  </div>
                  <div class="post-story">
                     {{--<div class="post-story-info margin-top">--}}
                        {{--<div class="date12 col-md-offset-5">@lang('message.residence-desc')</div>--}}
                     {{--</div>--}}
                     <h3 class="hch">{{ $model->name }}</h3>
                     <div class="clearfix"></div>
                     <div class="post-story-body clearfix">
                        <p>
                           {!! $model->description !!}
                        </p>
                     </div>
                     @if($model->meta_data)
                        @php
                           $head_texts = $model->meta_data['head_texts'];
                           $lang = \App::getLocale();
                        @endphp
                        <br><br>
                        <div class="post-story-body clearfix text-center">
                           <h5 class="text-center">@lang('message.apartment-price-policy-title')</h5>
                           <table style="text-align:center;" width="100%" class="table-responsive table table-bordered">
                              <thead>
                              <tr>
                                 <th style="width: 50%;" class="text-center">
                                    {{ $head_texts['duration_' . $lang] }}
                                 </th>
                                 <th class="text-center">
                                    {{ $head_texts['price_' . $lang] }}
                                 </th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($model->meta_data['data'] as $key => $data)
                                 <tr>
                                    <td>
                                       {{ $data['duration'] }} {{ listOfTimeIntervals($data['duration'], $data['interval']) }}
                                    </td>
                                    <td>
                                       <a href="{{ route('reserve-residence', ['residence_id' => $model->id, 'key' => $key, 'type' => \App\Residence::residence_type_apartment]) }}">{{ currency($data['price'], 'AMD', currency()->getUserCurrency()) }}</a>
                                    </td>
                                 </tr>
                              @endforeach
                              </tbody>
                           </table>
                           @endif
                        </div>
                     @if($model->amenity_data)
                     <div class="post-story-body clearfix text-center">
{{--                        <b style="font-size:18px;">@lang('message.residence-properties')</b>--}}
                        @if($model->amenity_data)
                        <table class="table-responsive table table-bordered" id="">
                           <thead>
                              <tr>
                                 <th style="text-align: center; font-size: 16px" colspan="2">@lang('message.residence-properties')</th>
{{--                                 <th style="text-align: center">@lang('message.table-qty')</th>--}}
                              </tr>
                           </thead>
                           <tbody id="append-place">
                              @foreach($model->amenity_data as $key => $data)
                              <tr>
                                 <td style="width: 80%">
                                   {{ $data['name'][\App::getLocale()] }}    
                                 </td>
                                 <td>
                                    @if($data['qty'] == 'v')
                                        <i class="fa fa-check text-success"></i>
                                    @endif
                                    @if($data['qty'] == 'x')
                                          <i class="fa text-danger">&#xf00d;</i>
                                    @endif
                                    @if(($data['qty'] !== 'v') && ($data['qty'] !== 'x'))
                                        {{ $data['qty'] }}
                                    @endif
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        @endif
                     </div>
                     @endif
                     {!! $model->after_text !!}
                        <div class="tags_wrapper">
                           @if($model->address)
                              <b>@lang('message.address')</b>: <span class="font-green">{{ $model->address }}</span>
                           @endif
                        </div>
                        <br />
                        @include('site.partials.social-share')
                  </div>
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
   <meta property="og:image"         content="{{ URL::to('/') }}/uploads/{{ $model->images[0]->image }}" />
   <meta name="keywords"         content="{{ $model->name }}" />
   <meta name="description"      content="{!! strip_tags($model->description) !!}" />
@endpush