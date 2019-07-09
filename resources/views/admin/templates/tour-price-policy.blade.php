@extends('admin.layouts.admin-layout')
@section('admin-content')
    <style>
        thead input {
            margin-bottom: 5px;
        }
        .input-group-btn select {
            border-color: #ccc;
            margin-top: 0px;
            margin-bottom: 0px;
            padding-top: 7px;
            padding-bottom: 7px;
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
            <h3 class="box-title">Create Tour Price Policy</h3>
        </div>
        <div class="box-body">
            <div class="col-md-12 no-padding">
                <div class="col-md-3 no-padding">
                    <div class="form-group">
                        <label>Duration</label>
                        <div class="input-group">
                            <input type="text" 
                                   class="form-control duration_value"
                                   value="{{ $model->duration ? $model->duration->duration_value : '1-2'}}">
                            <span class="input-group-btn">
                                <select class="btn duration_type">
                                    <option value="d" {{ $model->duration && $model->duration->duration_type == 'd' ? 'selected' : ''}}>Days</option>
                                    <option value="h" {{ $model->duration && $model->duration->duration_type == 'h' ? 'selected' : ''}}>Hours</option>
                                </select>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <h4 class="box-title">Price Policy</h4>
            <div class="form-group price-tbl">
                <div class="pull-right">
                    <div class="form-group">
                        <button class="btn btn-success fa fa-plus add" type="button"></button>
                        <button class="btn btn-danger fa fa-minus remove" type="button"></button>
                    </div>
                </div>
                @php($head_texts = isset($model) && isset($model->meta_data['head_texts']) ? $model->meta_data['head_texts'] : false)
                <table class="table-responsive table table-bordered" id="">
                    <thead>
                    <form id="heading">
                        <tr>
                            <th>
                                <input class="form-control" name="num_of_person_en" type="text"
                                       value="{{ $head_texts ? $head_texts['num_of_person_en'] : 'Number of persons' }}">
                                <input class="form-control" name="num_of_person_ru" type="text"
                                       value="{{ $head_texts ? $head_texts['num_of_person_ru'] : 'Количества людей' }}">
                                <input class="form-control" name="num_of_person_hy" type="text"
                                       value="{{ $head_texts ? $head_texts['num_of_person_hy'] : 'Մարդկանց քանակը' }}">
                            </th>
                            <th>
                                <input class="form-control" name="price_en" type="text"
                                       value="{{ $head_texts ? $head_texts['price_en'] : 'Price' }}">
                                <input class="form-control" name="price_ru" type="text"
                                       value="{{ $head_texts ? $head_texts['price_ru'] : 'Цена' }}">
                                <input class="form-control" name="price_hy" type="text"
                                       value="{{ $head_texts ? $head_texts['price_hy'] : 'Արժեքը' }}">
                            </th>
                            <th>
                                <input class="form-control" name="guide_en" type="text"
                                       value="{{ $head_texts ? $head_texts['guide_en'] : 'With Guide' }}">
                                <input class="form-control" name="guide_ru" type="text"
                                       value="{{ $head_texts ? $head_texts['guide_ru'] : 'С гидом' }}">
                                <input class="form-control" name="guide_hy" type="text"
                                       value="{{ $head_texts ? $head_texts['guide_hy'] : 'Գիդով' }}">
                            </th>
                        </tr>
                    </form>
                    </thead>
                    <tbody id="append-place">
                    @if(isset($model) && $model->meta_data)
                        @foreach($model->meta_data['data'] as $data)
                            <tr>
                                <td>
                                    <input type="text" class="form-control" placeholder="Enter name" name="name[]"
                                           value="{{ $data['name'] }}">
                                </td>
                                <td>
                                    <input placeholder="Enter price" type="number" class="form-control" name="price[]"
                                           value="{{ $data['price'] }}">
                                </td>
                                <td>
                                    <input placeholder="Enter price with guide" type="number" class="form-control"
                                           name="price_guide[]" value="{{ $data['price_guide'] }}">
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div id="row"></div>
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
        var $row = $('<tr><td><input type="text" class="form-control" placeholder="Enter name" name="name[]"></td><td><input placeholder="Enter price" type="number" class="form-control" name="price[]"></td><td><input placeholder="Enter price with guide" type="number" class="form-control" name="price_guide[]"></td></tr>');

        $('.remove').on('click', function () {
            $appendPlace.children().last().remove();
        });
        $('.add').on('click', function () {
            $appendPlace.append($row.clone());
        });
        $('.submit').on('click', function () {
            var data = [];
            var head_texts = {};
            $appendPlace.children().each(function (i, el) {
                data.push({
                    name: $(el).children().first().children().val(),
                    price: $(el).children('td:nth-child(2)').children().val(),
                    price_guide: $(el).children().last().children().val(),
                })
            });

            $.each($headTexts.serializeArray(), function (i, el) {
                head_texts[this.name] = this.value;
            });

            var dur_val = $('.duration_value').val();
            var duration = {
                duration_value: dur_val ? dur_val : 0,
                duration_type: $('.duration_type').val()
            };

            $.ajax({
                url: create_url,
                method: 'post',
                data: {
                    data: {
                        data: data,
                        head_texts: head_texts
                    },
                    id: "{{ $model->id }}",
                    duration: duration
                },
                success: function (res) {
                    location.href = show_url;
                },
                error: function (err) {
                    console.log(err);
                }
            });
        });
    </script>
@endpush
