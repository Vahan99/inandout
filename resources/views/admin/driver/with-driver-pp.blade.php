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
            <h3 class="box-title">Create Driver Price Policy</h3>
        </div>
        <div class="box-body">
            <div class="form-group price-tbl">
                <div class="pull-right">
                    <div class="form-group">
                        <button class="btn btn-success fa fa-plus add" type="button"></button>
                        <button class="btn btn-danger fa fa-minus remove" type="button"></button>
                    </div>
                </div>
                <table class="table-responsive table table-bordered" id="">
                    <tbody>
                    <tr>
                        <th>Duration</th>
                        <th>One Way</th>
                        <th>Two Way</th>
                    </tr>
                    </tbody>
                    <tbody id="append-place">
                    @if(isset($model) && $model->meta_data)
                        @foreach($model->meta_data as $data)
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
                                    <input placeholder="One way price" type="number" class="form-control one_way" name="one_way[]" value="{{ isset($data['one_way']) ? $data['one_way'] : '' }}">
                                </td>
                                <td>
                                    <input placeholder=" Two way price" type="number" class="form-control two_way" name="two_way[]" value="{{ isset($data['two_way']) ? $data['two_way'] : '' }}">
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
        var $row = $('<tr><td><div class="form-inline duration-field"><div class="form-group"><input type="text" class="form-control duration" placeholder="Enter duration" name="duration[]"></div><div class="form-group">{{ Form::select("interval", listOfTimeIntervals(), null, ["class" => "form-control interval"]) }}</div></div></td><td><input placeholder="One way price" type="number" class="form-control one_way" name="one_way[]"></td><td><input placeholder=" Two way price" type="number" class="form-control two_way" name="two_way[]"></td></tr>');

        $('.remove').on('click', function() {
            $appendPlace.children().last().remove();
        });
        $('.add').on('click', function() {
            $appendPlace.append($row.clone());
        });
        $('.submit').on('click', function() {
            var data = [];
            $appendPlace.children().each(function(i, el) {
                data.push({
                    duration: $(el).find('.duration').val(),
                    one_way: $(el).find('.one_way').val(),
                    two_way: $(el).find('.two_way').val(),
                    interval: $(el).find('.interval').val()
                })
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
