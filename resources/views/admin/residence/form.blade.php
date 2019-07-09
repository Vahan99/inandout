@php($model = isset($model) ? $model : false)
{{ Form::open(['route' => $formRoute, 'method' => 'post', 'files' => true, 'id' => 'form']) }}
<div class="form-group">
    {!! Form::label('name_hy','Name HY', ['class' => 'awesome']) !!}
    {!! Form::text('name_hy', $model ? $model->name_hy : null ,['class' => 'form-control', 'placeholder' => 'Անուն:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('name_en','Name EN', ['class' => 'awesome']) !!}
    {!! Form::text('name_en', $model ? $model->name_en : null ,['class' => 'form-control','placeholder' => 'Name:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('name_ru','Name RU', ['class' => 'awesome']) !!}
    {!! Form::text('name_ru', $model ? $model->name_ru : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('desc_hy', 'Description HY') !!}
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
    {{ Form::label('address_hy', 'Address HY') }}
    {!! Form::text('address_hy', $model ? $model->address_hy : null ,['size' => '25x5', 'placeholder' => 'Հայերեն:' ,'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {{ Form::label('address_en', 'Address EN') }}
    {!! Form::text('address_en', $model ? $model->address_en : null ,['size' => '25x5', 'placeholder' => 'English:' ,'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {{ Form::label('address_ru', 'Address RU') }}
    {!! Form::text('address_ru', $model ? $model->address_ru : null ,['size' => '25x5', 'placeholder' => 'Русский:' ,'class' => 'form-control','required']); !!}
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
<div class="form-group">
    {!! Form::label('region_id') !!}
    {!! Form::select('region_id', App\Region::listAll('id'), $model ? $model->region_id : null, ['class' => 'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('residence_type') !!}
    {!! Form::select('residence_type', App\Residence::residenceList(), $model ? $model->residence_type : null, ['class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('grid_image', 'Grid Image 360x240') !!}
    {!! Form::file('grid_image[]', [$model ? '' : 'required']) !!}
    @if(isset($model->grid_image))
    <div class="row">
      <div class="col-md-3">
        <img src="/uploads/{{ $model->grid_image }}" alt="" class="img-responsive">
      </div>
    </div>
    @endif
</div>

<div class="form-group">
    {{  Form::label('image', 'Slider Image 1130x600') }}
    {!! Form::file('image[]', ['multiple' => true]) !!}
</div>
{!! Form::submit('Save', ['class' => 'btn btn-primary submit']); !!}
{{ Form::close() }}
<script type='text/javascript'>
    var areas = [
        'desc_hy',
        'desc_en',
        'desc_ru',
        'after_text_hy',
        'after_text_ru',
        'after_text_en'
    ];
</script>
@push('styles')
    <link rel="stylesheet" href="{{ mix('css/tour-create-plugin.css') }}">
@endpush
@push('scripts')
<script src="{{ mix('js/tour-create-plugin.js') }}"></script>
@endpush