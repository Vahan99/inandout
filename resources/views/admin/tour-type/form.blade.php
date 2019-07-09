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
    {!! Form::label('parent_id','Parent Tour Type') !!}
    {!! Form::select('parent_id', $model::listAll('id'), $model ? $model->parent_id : null ,['class' => 'form-control', 'placeholder' => 'Имя:'])!!}
</div>
@if($model && $model->image)
<div class="row">
    <div class="col-md-3">
    <label>Size: 1200 x 400</label>
        <img src="/uploads/{{ $model->image }}" alt="" class="img-responsive">
    </div>
</div>
@endif
<div class="form-group">
    {!! Form::label('image') !!}
    {!! Form::file('image[]', [$model ? '' : 'required'])!!}
</div>
{!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
{{ Form::close() }}
@push('styles')
<link rel="stylesheet" href="{{ mix('css/tour-create-plugin.css') }}">
@endpush
@push('scripts')
<script src="{{ mix('js/tour-create-plugin.js') }}"></script>
@endpush

