@extends('admin.layouts.admin-layout')
@section('admin-content')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="box box-danger">
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
            <h3 class="box-title">Update About Armenia</h3>
        </div>

        <div class="box-body">
            @include('admin.about.form')
        </div>
    </div>
    @if(isset($model) && $model->images)
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Background Image</h3>
            </div>
            <div class="box-body">
                <div>
                    <div class="col-md-12 thumbnail">
                        <img src="/uploads/{{ $model->images }}" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection