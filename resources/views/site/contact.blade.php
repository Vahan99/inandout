@php
  $settings = \App\Setting::first();
@endphp
@extends('site.layouts.app')
@section('content')
<style>
  iframe {
    width: 100% !important;
  }
</style>

<div class="contacts_main_pic"></div>

<div id="content" class="contacts_content">
  <div class="container">
    <div class="d-block text-center animated-header">
      <h1 class="decoration decoration-cont-style animated-contact" data-animation="fadeInUp" data-animation-delay="200">@lang('message.contact-head')</h1>
    </div>
    <div class="row">
      <div class="col-sm-8 contact_content">
        <h3>WELCOME TO THE OFFICIAL WEBSITE OF THE TOUR ORGANIZATION LOREM IPSUM, ARMENIA</h3>
        {!! $model->desc !!}
      </div>
      <div class="col-sm-4">
        {{--<h3>@lang('message.contact-page-title')</h3>--}}
        {{--<h3>WELCOME TO THE OFFICIAL WEBSITE OF THE TOUR ORGANIZATION LOREM IPSUM. ARMENIA</h3>--}}
        <div id="note"></div>
        <div id="fields">
          <form id="ajax-contact-form" class="form-horizontal" action="{{ route('site.mails.contact') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputName">@lang('message.contact-name')</label>
                <input type="text" class="form-control" id="inputName" name="name" value="" required placeholder="@lang('message.contact-name')">
            </div>
            <div class="form-group">
                <label for="inputEmail">@lang('message.contact-mail')</label>
                <input type="email" class="form-control" id="inputEmail" name="email" value="" required placeholder="@lang('message.contact-mail')">
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                    <label for="inputMessage">@lang('message.contact-text')</label>
                    <textarea class="form-control" rows="7" id="inputMessage" name="message"  required placeholder="@lang('message.contact-text')"></textarea>
                </div>
              </div>
            </div>
            <button type="submit" class="contact_btn btn-default btn-form1-submit">@lang('message.contact-send')</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="container contact_map">{!! $model->data !!}</div>
@endsection