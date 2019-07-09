@extends('admin.layouts.admin-layout')
@section('admin-content')
<style>
    .duration-field .form-group {
        width: 49%;
        padding-right: 5px;
    }
    .duration-field .form-control {
        width: 100%;
    }
    thead .form-control {
        margin-bottom: 5px;
    }
</style>
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
        <h3 class="box-title">Create Price Policy</h3>
    </div>
    <div class="box-body">
        <div class="form-group price-tbl">
            <div class="pull-right">
                <div class="form-group">
                    <button class="btn btn-success fa fa-plus add" type="button"></button>
                    <button class="btn btn-danger fa fa-minus remove" type="button"></button>
                </div>
            </div>
            @php($head_texts = isset($model) && isset($model->meta_data['head_texts']) ? $model->meta_data['head_texts'] : false)
            <table class="table-responsive table table-bordered" id="">
                <form id="heading">
                <thead>
                    <tr>
                        <th>
                            <input class="form-control" name="duration_en" type="text" value="{{ $head_texts ? $head_texts['duration_en'] : 'Duration' }}">
                            <input class="form-control" name="duration_ru" type="text" value="{{ $head_texts ? $head_texts['duration_ru'] : 'Продолжительность' }}">
                            <input class="form-control" name="duration_hy" type="text" value="{{ $head_texts ? $head_texts['duration_hy'] : 'Տևողությունը' }}">
                        </th>
                        <th>
                            <input class="form-control" name="price_en" type="text" value="{{ $head_texts ? $head_texts['price_en'] : 'Price' }}">
                            <input class="form-control" name="price_ru" type="text" value="{{ $head_texts ? $head_texts['price_ru'] : 'Цена' }}">
                            <input class="form-control" name="price_hy" type="text" value="{{ $head_texts ? $head_texts['price_hy'] : 'Արժեքը' }}">
                        </th>
                    </tr>
                </thead>
                </form>
                <tbody id="append-place">
                	@if(isset($model) && $model->meta_data)
                        @foreach($model->meta_data['data'] as $data)
                            <tr>
                                <td>
                                    <div class="form-inline duration-field">
                                        <div class="form-group">
                                            <input type="text" class="form-control duration" placeholder="Enter duration" name="duration[]" value="{{ $data['duration'] }}">
                                        </div>
                                        <div class="form-group">
                                            {{ Form::select('interval', listOfTimeIntervals(), $data['interval'], ['class' => 'form-control interval']) }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <input placeholder="Price" type="number" class="form-control price" name="price[]" value="{{ $data['price'] }}">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>    
        </div>
        <div id="row">
        </div>
	   <button class="btn btn-info submit" id="button">Save</button>
    </div>
</div>
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
    var $appendPlace = $('#append-place');
    var $headTexts = $('#heading');
    var $row = $('<tr><td><div class="form-inline duration-field"><div class="form-group"><input type="text" class="form-control duration" placeholder="Enter duration" name="duration[]"></div><div class="form-group">{{ Form::select("interval", listOfTimeIntervals(), null, ["class" => "form-control interval"]) }}</div></div></td><td><input placeholder="Price" type="number" class="form-control price" name="price[]"></td></tr>');
 
    $('.remove').on('click', function() {
        $appendPlace.children().last().remove();
    });
    $('.add').on('click', function() {
        $appendPlace.append($row.clone());
    });
    $('.submit').on('click', function() {
        var data = [];
        var head_texts = {};
        $appendPlace.children().each(function(i, el) {
            data.push({
                duration: $(el).find('.duration').val(),
                price: $(el).find('.price').val(),
                interval: $(el).find('.interval').val()
            })
        });

        $.each($headTexts.serializeArray(), function (i, el) {
            head_texts[this.name] = this.value;
        });

        console.log(head_texts);
        
        $.ajax({
            url: create_url,
            method: 'post',
            data: {
                data: {
                    data: data,
                    head_texts: head_texts
                },
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
