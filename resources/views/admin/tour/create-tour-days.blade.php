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
            <h3 class="box-title">Create Reservation</h3>
        </div>
        <form class="box-body" action="#">
            <div class="form-group price-tbl">
                <div class="pull-right">
                    <div class="form-group">
                        <button class="btn btn-success fa fa-plus add" type="button"></button>
                    </div>
                </div>
                <form action="">
                <table class="table-responsive table table-bordered" id="">
                    <thead id="theadDateField">
                    <tr>
                        <th>name_hy</th>
                        <th>name_en</th>
                        <th>name_ru</th>
                        <th>title_hy</th>
                        <th>title_en</th>
                        <th>title_ru</th>
                        <th>desc_hy</th>
                        <th>desc_en</th>
                        <th>desc_ru</th>
                        <th>Update</th>
                        <th>Delete</th>

                    </tr>

                    @if(isset($tours))
                        @foreach($tours as $tour)
                            <tr id="dateField">
                                <td>
                                    <p>{{ $tour->name_hy }}</p>
                                </td>
                                <td>
                                    <p>{{ $tour->name_en }}</p>
                                </td>
                                <td>
                                    <p >{{ $tour->name_ru }}</p>
                                </td>
                                <td>
                                    <p>{{ $tour->title_hy }}</p>
                                </td>
                                <td>
                                    <p>{{ $tour->title_en }}</p>
                                </td>
                                <td>
                                    <p>{{ $tour->title_ru }}</p>
                                </td>
                                <td>
                                    <p>{{ $tour->desc_hy }}</p>
                                </td>
                                <td>
                                    <p>{{ $tour->desc_en }}</p>
                                </td>
                                <td>
                                    <p>{{ $tour->desc_ru }}</p>
                                </td>
                                <td><a href="{{ route('tour.update-days', $tour->id)}}">Update</a></td>
                                <td><a href="{{ route('tour.delete-days',$tour->id) }}">Delete</a></td>

                            <tr>
                            @endforeach
                        @endif

                    </thead>
                    <tbody id="tbodyPrice">

                    </tbody>
                </table>
            </div>
            <button class="btn btn-info" id="button">Save</button>
        </div>
    </div>
    </form>
    <style>
        .tr-row:first-child .remove {
            display: none;
        }
    </style>
@endsection



