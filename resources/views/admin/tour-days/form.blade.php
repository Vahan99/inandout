@php($model = isset($model) ? $model : false)
{{ Form::open(['url' => $formRoute, 'method' => 'post', 'files' => true]) }}
<div class="form-group">
    {!! Form::label('name_hy','Name HY', ['class' => 'awesome']) !!}
    {!! Form::text('name_hy', $model ? $model->name_hy : null ,['class' => 'form-control', 'placeholder' => 'Անուն:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('name_ru','Name RU', ['class' => 'awesome']) !!}
    {!! Form::text('name_ru', $model ? $model->name_ru : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('name_en','Name EN', ['class' => 'awesome']) !!}
    {!! Form::text('name_en', $model ? $model->name_en : null ,['class' => 'form-control','placeholder' => 'Name:','required'])!!}
</div>

<div class="form-group">
    {!! Form::label('title_hy','Title HY', ['class' => 'awesome']) !!}
    {!! Form::text('title_hy', $model ? $model->title_hy : null ,['class' => 'form-control', 'placeholder' => 'Անուն:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('title_ru','Title RU', ['class' => 'awesome']) !!}
    {!! Form::text('title_ru', $model ? $model->title_ru : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('title_en','Title EN', ['class' => 'awesome']) !!}
    {!! Form::text('title_en', $model ? $model->title_en : null ,['class' => 'form-control','placeholder' => 'Name:','required'])!!}
</div>

<div class="form-group">
    {{ Form::label('desc_hy', 'Description HY') }}
    {!! Form::textarea('desc_hy', $model ? $model->desc_hy : null ,['name' => 'desc_hy', 'size' => '25x5', 'placeholder' => 'Հայերեն:' ,'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {!! Form::label('desc_en', 'Description EN') !!}
    {!! Form::textarea('desc_en', $model ? $model->desc_en : null , ['name' => 'desc_en', 'size' => '25x5','placeholder' => 'English:', 'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {!! Form::label('desc_ru', 'Description RU') !!}
    {!! Form::textarea('desc_ru',  $model ? $model->desc_ru : null , ['name' => 'desc_ru', 'size' => '25x5','placeholder' => 'Русский:', 'class' => 'form-control','required']); !!}
</div>
@if(isset($tourId))
{{ Form::hidden('tour_id', $tourId) }}
@endif
@if(isset($tourDayId))
{{ Form::hidden('tour_day_id', $tourDayId) }}
@endif
{!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
{{ Form::close() }}
<script type='text/javascript'>
    var areas = [
        'desc_hy',
        'desc_en',
        'desc_ru',
        'after_text_hy',
        'after_text_ru',
        'after_text_en',
        'exclude_hy',
        'exclude_ru',
        'exclude_en'
    ];
</script>
@push('styles')
<link rel="stylesheet" href="{{ mix('css/tour-create-plugin.css') }}">
@endpush
@push('scripts')
<script src="{{ mix('js/tour-create-plugin.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
      var select_placeholder = $('<option selected="selected" value="">Select Tour Type</option>');
      $('#tour_type_id').on('change', function () {
        $.ajax({
            url: "{{ route('get_children_tour_types') }}",
            data: {id:$(this).val()},
            type: 'post',
            success: function (res) {
              if(res && res.length) {
                $('#tour_type_children option').remove();
                for(var i = 0; i < res.length; i++) {
                  $('#tour_type_children')
                    .append($('<option value=' + res[i].id + '>' + res[i].name_en + '</option>'));
                }
              } else {
                $('#tour_type_children option').remove();
                $('#tour_type_children').append(select_placeholder);
              }
            },
            error: function (err) {
              console.log(err);
            }
        });
      });

    $(function() {
        $('input[name="from"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
        });
    });
})
</script>
@endpush

