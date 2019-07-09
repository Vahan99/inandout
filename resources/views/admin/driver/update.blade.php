{{-- {{dd($model)}} --}}
@extends('admin.layouts.admin-layout')
@section('admin-content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="box">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box-header">
            <h3 class="box-title">Update Driver</h3>
        </div>
        <div class="box-body">
            @include('admin.driver.form')
        </div>
    </div>
    @if(count($model->sliderImages))
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Slider Images</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    @foreach($model->sliderImages as $image)
                    <div class="col-md-3">
                        <img src="/uploads/{{ $image->name }}" class="img-responsive">
                        <a style="display: block;" href="{{ route('driver.delete-slider-image', ['id' => $image->id]) }}" class="btn bg-red btn-flat">Delete</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection