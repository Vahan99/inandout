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
            <h3 class="box-title">Update About</h3>
        </div>

        <div class="box-body">
            @include('admin.about.form')
        </div> 
    </div> 
    
    @if(isset($model))
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Background Image</h3>
            </div>
            <div class="box-body">
                <div>
                    <img src="/uploads/{{ $model->images }}" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    @endif
    
    @if(count(\App\Team::all()))
        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Stuff 600x600</h3>
            </div>
            <div class="box-body">
                <ul class="users-list clearfix">
                    @foreach(\App\Team::all() as $employee)
                        <li class="thumbnail">
                            <a href="{{ route('team.delete', ['id' => $employee->id]) }}" class="pull-right"><i class="fa fa-times text-danger"></i></a>
                            <img src="/uploads/{{ $employee->image }}" alt="" class="">
                            <a class="users-list-name" href="{{ route('team.update', ['id' => $employee->id]) }}">
                                {{ $employee->name }}
                            </a>
                            <span class="users-list-date">{{ $employee->rank }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <hr>
        </div>   
    @endif
    <div class="box-footer">
        <a href="{{ route('team.create') }}" class="btn btn-info btn-flat">Add Employee</a>
    </div>  
@endsection