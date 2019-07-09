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
            <h3 class="box-title">Parallax Size 1920x727, Main Image Size 1920 x 809</h3>
        </div>
        <div class="box-body">
            @include('admin.gallery.form')
        </div>
    </div>
@endsection