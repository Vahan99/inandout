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
    <div class="box-body">
        <div class="form-group price-tbl">
    <div class="pull-right">
        <div class="form-group">
            <button class="btn btn-success fa fa-plus add" type="button"></button>
            <button class="btn btn-info fa fa-calendar add-date" type="button"></button>
            <button class="btn btn-danger fa fa-calendar remove-date" type="button"></button>
        </div>
    </div>
    <table class="table-responsive table table-bordered" id="">
        <thead id="theadDateField">
            <tr>
                <th style="width: 100px"></th>
                @if(isset($model) && $model->meta_data[0])
                    @foreach($model->meta_data[0]['dates'] as $date)
                       <th>Order Date</th>
                    @endforeach
                @else
                    <th>Order Date</th>
                @endif
                <th></th>
            </tr>
            <tr id="dateField">
                <th>Room Type</th>
                @if(isset($model) && $model->meta_data[0])
                    @foreach($model->meta_data[0]['dates'] as $date)
                    <th>
                        <input type="text" class="form-control input-sm reserve-date" value="{{ $date }}" name="datepicker">
                    </th>
                    @endforeach
                @else
                    <th>
                        <input type="text" class="form-control input-sm reserve-date" value="" name="datepicker">
                    </th>
                @endif
                <th></th>
            </tr>
        </thead>
        <tbody id="tbodyPrice">
            @if(isset($model) && $model->meta_data[0])
            @foreach($model->meta_data[0]['data'] as $data)
            <tr class="tr-row">
                @foreach($data as $key => $value)
                    @if($key === 0)
                    <td>
                        {{ Form::select('room_types', App\RoomType::listAll('id'), $value, ['class' => 'form-control room-type']) }}
                    </td>
                    @else
                        <td>
                            <input type="number" class="form-control input-sm price" value="{{ $value }}">
                        </td>
                    @endif
                @endforeach
                <td>
                    <button class="btn btn-danger fa fa-minus remove btn-sm" type="button"></button>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="tr-row">
                <td>
                    {{ Form::select('room_types', App\RoomType::listAll('id'), null, ['class' => 'form-control room-type']) }}
                </td>
                <td>
                    <input type="number" class="form-control input-sm price">
                </td>
                <td>
                    <button class="btn btn-danger fa fa-minus remove btn-sm" type="button"></button>
                </td>
            </tr>
            @endif
        </tbody>
    </table>    
</div>
    <button class="btn btn-info" id="button">Save</button>
    </div>
</div>
<style>
    .tr-row:first-child .remove {
        display: none;
    }
</style>
@endsection
@push('scripts')
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var create_url = "{{ $createUrl }}";
    var show_url = "{{ $showUrl }}";
 
    var $priceField = $('#priceField');
    var $tbody = $('tbody');
    var $submit = $('#button');

    $('body').on('focus',".reserve-date", function(){
        $(this).daterangepicker();
    });

    $("input[name=datepicker]").daterangepicker();

    $(document).on('click', '.add', function() {
        if($('.tr-row').length < 30) {
            var $row = $('tbody .tr-row:first');
            $tbody.append($row.clone());
            $tbody.children().last().find('input').val('');
        } else {
            alert('Reached max limit: ' + 30);
        }
    });
    
    $(document).on('click', '.remove', function() {
        if($('tbody tr').length > 1) {
            $(this).parents('tr').remove();
        }
    });

    $(document).on('click', '.remove-date', function() {
        if($('thead tr:first th').length > 3) {
            $('thead tr').each(function(index, el) {
                $(el).children().last().prev().remove();
            });    
            $('tbody tr').each(function(index, el) {
                $(el).children().last().prev().remove();
            });
        }
    });
    
    $(document).on('click', '.add-date', function() {
        if($('tbody tr:first').children().length < 10){
            $('tbody tr').each(function(index, el) { 
                $(el).children('td:last').before($('<td><input type="number" class="form-control input-sm"></td>'));
            });
                                                               
            $('#theadDateField tr:last').each(function(index, el) {
                $(el).children('th:last').before($('<th><input type="text" class="form-control input-sm reserve-date" value="" name="datepicker"></th>'));
                console.log($(el).children('th:last'));
            });

            $('thead tr:first').each(function(index, el) {
                $(el).children('th:last').before($('<th>Order Date</th>'));
            });
        } else {
            alert('Reached max limit: ' + 10);
        }
    });

    var reserve_dates = [];
    var reserve_data = [];
    var data = [];
    $submit.on('click', function() {
        var th_count = $('#dateField th').length;
        $(document).find('.reserve-date').each(function(index, el) {
            reserve_dates.push($(el).val());
        });

        $(document).find('.tr-row').each(function(tr_index, el) {
            // console.log($(el));
            $(el).children().not(':last').each(function(index, element) {
                if(index === 0) {
                    reserve_data.push([$(element).children().val()]);
                } else {
                    reserve_data[reserve_data.length-1].push($(element).children().val());
                }
            });
        });

        data.push({
            dates: reserve_dates,
            data: reserve_data
        });

        $.ajax({
            url: create_url,
            method: 'post',
            data: {
                data: data,
                id: "{{ $model->id }}"
            },
            success: function(res) {
                location.href = show_url;
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
</script>
@endpush
