@extends('admin.layouts.admin-layout')
@section('admin-content')
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
        <h3 class="box-title">Create Room Type</h3>
    </div>
    <div class="box-body">
        @include('admin.room-type.form')
    </div>
</div>
@endsection
