@extends('admin.layouts.admin-layout')
@section('admin-content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tour days</h3>
        <div class="box-tools pull-right">
            <a href="{{ route('tour-days.form', ['tour_id' => $tourId]) }}" class="btn btn-box-tool" ><i class="fa fa-plus"></i>Add Tour Day
            </a>
        </div>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name HY</th>
                <th>Name EN</th>
                <th>Name RU</th>
                <th>Title HY</th>
                <th>Title EN</th>
                <th>Title RU</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @each('admin.tour-days.table.tour-table', $model, 'tour_day')
            </tbody>
        </table>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{ mix('js/tour-show-plugin.js') }}"></script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ mix('css/tour-show-plugin.css') }}">
@endpush
