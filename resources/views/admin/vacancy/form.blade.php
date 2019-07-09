@php($model = isset($model) ? $model : false)
{{ Form::open(['route' => $formRoute, 'method' => 'post', 'files' => true]) }}
<div class="form-group">
    {!! Form::label('name_hy','Name HY', ['class' => 'awesome']) !!}
    {!! Form::text('name_hy', $model ? $model->name_hy : null ,['class' => 'form-control', 'placeholder' => 'Անուն:','required'])!!}
</div>
<div class="form-group">
    {{ Form::label('desc_hy', 'Description HY') }}
    {!! Form::textarea('desc_hy', $model ? $model->desc_hy : null ,['name' => 'desc_hy', 'size' => '25x5', 'placeholder' => 'Հայերեն:' ,'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {!! Form::label('name_en','Name EN', ['class' => 'awesome']) !!}
    {!! Form::text('name_en', $model ? $model->name_en : null ,['class' => 'form-control','placeholder' => 'Name:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('desc_en', 'Description EN') !!}
    {!! Form::textarea('desc_en', $model ? $model->desc_en : null , ['name' => 'desc_en', 'size' => '25x5','placeholder' => 'English:', 'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {!! Form::label('name_ru','Name RU', ['class' => 'awesome']) !!}
    {!! Form::text('name_ru', $model ? $model->name_ru : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('desc_ru', 'Description RU') !!}
    {!! Form::textarea('desc_ru',  $model ? $model->desc_ru : null , ['name' => 'desc_ru', 'size' => '25x5','placeholder' => 'Русский:', 'class' => 'form-control','required']); !!}
</div>
{!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
{{ Form::close() }}
<script type="text/javascript">var areas = ['desc_hy', 'desc_en', 'desc_ru'];</script>
@push('styles')
<link rel="stylesheet" href="{{ mix('css/tour-create-plugin.css') }}">
@endpush
@push('scripts')
<script src="{{ mix('js/tour-create-plugin.js') }}"></script>
@endpush

