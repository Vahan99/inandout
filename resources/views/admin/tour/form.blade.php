@php($model = isset($model) ? $model : false)
{{ Form::open(['route' => $formRoute, 'method' => 'post', 'files' => true]) }}
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
<div class="form-group">
    {{ Form::label('after_text_hy', 'Text After Price HY') }}
    {!! Form::textarea('after_text_hy', $model ? $model->after_text_hy : null,['name' => 'after_text_hy', 'size' => '25x5','placeholder' => 'Русский:', 'class' => 'form-control']); !!}
</div>
<div class="form-group">
    {{ Form::label('after_text_ru', 'Text After Price RU') }}
    {!! Form::textarea('after_text_ru', $model ? $model->after_text_ru : null,['name' => 'after_text_ru', 'size' => '25x5','placeholder' => 'Русский:', 'class' => 'form-control']); !!}
</div>
<div class="form-group">
    {{ Form::label('after_text_en', 'Text After Price EN') }}
    {!! Form::textarea('after_text_en', $model ? $model->after_text_en : null,['name' => 'after_text_en', 'size' => '25x5','placeholder' => 'Русский:', 'class' => 'form-control']); !!}
</div>

{{--Text after price (price exclude)--}}

<div class="form-group">
    {{ Form::label('exclude_hy', 'Price Exclude HY') }}
    {!! Form::textarea('exclude_hy', $model ? $model->exclude_hy : null,['name' => 'exclude_hy', 'size' => '25x5','placeholder' => 'Հայերեն:', 'class' => 'form-control']); !!}
</div>
<div class="form-group">
    {{ Form::label('exclude_ru', 'Price exclude RU') }}
    {!! Form::textarea('exclude_ru', $model ? $model->exclude_ru : null,['name' => 'exclude_ru', 'size' => '25x5','placeholder' => 'Русский:', 'class' => 'form-control']); !!}
</div>
<div class="form-group">
    {{ Form::label('exclude_en', 'Price exclude EN') }}
    {!! Form::textarea('exclude_en', $model ? $model->exclude_en : null,['name' => 'exclude_en', 'size' => '25x5','placeholder' => 'English:', 'class' => 'form-control']); !!}
</div>


<div class="form-group">
    {!! Form::label('region_id') !!}
    {!! Form::select('region_id', App\Region::listAll('id'), $model ? $model->region_id : null, ['class' => 'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('sightseeing_place') !!}
    {!! Form::checkbox('sightseeing_place', 1, $model && $model->sightseeing_place ? true : false) !!}
</div>
<div class="form-group">
  {!! Form::label('date', 'Date') !!}
  {!! Form::text('from', $model ? $model->date : null, ['class' => 'form-control']) !!}

  {!! Form::hidden('birthday', $model ? $model->from : null) !!}
</div>
<div class="form-group">
    {!! Form::label('tour_type_id') !!}
    @php
        if($model) {
            $parentId = $model->type && $model->type->parentTourType ? $model->type->parentTourType->id : $model->tour_type_id;
            $childrenTourTypes = $model->type && $model->type->parentTourType ? $model->type->parentTourType->childrenTourTypes->pluck('name_' . \App::getLocale(), 'id') : [];
        } else {
            $parentId = null;
            $childrenTourTypes = [];
        }
    @endphp
    {!! Form::select('tour_type_id', \App\TourType::listAll('id'), $model ? $parentId : null, ['class' => 'form-control', 'placeholder' => 'Select Tour Type']) !!}
    <br>
    {!! Form::select('tour_type_children',
        $childrenTourTypes,
        $model && $model->tour_type_id ? $model->tour_type_id : null,
        [
          'id' => 'tour_type_children',
          'class' => 'form-control',
        ])
    !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Slider Image 1130x600') !!}
    {!! Form::file('image[]', ['multiple' => true, $model ? '' : 'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('grid_image', 'Grid Image 340x360') !!}
    {!! Form::file('grid_image[]', [$model ? '' : 'required']) !!}
    @if(isset($model->grid_image))
    <div class="row">
      <div class="col-md-3">
        <img src="/uploads/{{ $model->grid_image }}" alt="" class="img-responsive">
      </div>
    </div>
    @endif
</div>
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

