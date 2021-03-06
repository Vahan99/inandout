@extends('admin.layouts.admin-layout')
@section('admin-content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tours</h3>
    </div>
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name HY</th>
                <th>Name EN</th>
                <th>Name RU</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                @each('admin.tour-type.table.tour-table', $model, 'tour')
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