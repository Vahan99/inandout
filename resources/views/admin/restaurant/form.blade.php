@php($model = isset($model) ? $model : false)

{{ Form::open(['route' => $formRoute, 'method' => 'post', 'files' => true]) }}
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
    {!! Form::label('address_hy','Address HY', ['class' => 'awesome']) !!}
    {!! Form::text('address_hy', $model ? $model->address_hy : null ,['class' => 'form-control', 'placeholder' => 'Հասցե:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('address_en','Address EN', ['class' => 'awesome']) !!}
    {!! Form::text('address_en', $model ? $model->address_en : null ,['class' => 'form-control', 'placeholder' => 'Address:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('address_ru','Address RU', ['class' => 'awesome']) !!}
    {!! Form::text('address_ru', $model ? $model->address_ru : null ,['class' => 'form-control', 'placeholder' => 'Адрес:','required'])!!}
</div>

<div class="form-group">
    {!! Form::label('region_id') !!}
    {!! Form::select('region_id', App\Region::listAll('id'), $model ? $model->region_id : null, ['class' => 'form-control','required']) !!}
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
    {!! Form::label('image', 'Slider Image 1130x600') !!}
    {!! Form::file('image[]', ['multiple' => true]) !!}
</div>

{!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
{{ Form::close() }}
<script type='text/javascript'>var areas = ['desc_hy', 'desc_en', 'desc_ru'];</script>
@push('styles')
<link rel="stylesheet" href="{{ mix('css/tour-create-plugin.css') }}">
@endpush
@push('scripts')
<script src="{{ mix('js/tour-create-plugin.js') }}"></script>
@endpush

