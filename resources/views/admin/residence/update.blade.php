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
            <h3 class="box-title">Update Residence</h3>
        </div>
        <div class="box-body">
            @include('admin.residence.form')
        </div>
    </div>
    @if(count($model->images))
        <div class="box">
            <div class="box-body">
                <div id="residence-images">
                    @foreach($model->images as $image)
                        <div class="col-md-2 thumbnail">
                            <img src="/uploads/{{ $image->image }}" alt="" class="img-responsive">
                            <a href="{{ route('residence.deleteImage', [$image->id] )}}" class="btn btn-block btn-danger btn-flat delete">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection