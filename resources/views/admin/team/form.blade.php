@php($model = isset($model) ? $model : false)

{{ Form::open(['route' => $formRoute, 'method' => 'post', 'files' => true]) }}
<div class="form-group">
    {!! Form::label('name_hy','Name HY', ['class' => 'awesome']) !!}
    {!! Form::text('name_hy', $model ? $model->name_hy : null ,['class' => 'form-control','placeholder' => 'Անուն:','required'])!!}
</div>
<div class="form-group">
    {{ Form::label('description_hy', 'Description HY') }}
    {!! Form::textarea('description_hy', $model ? $model->description_hy : null ,['size' => '25x5', 'placeholder' => 'Հայերեն:' ,'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {{ Form::label('rank_hy', 'Rank Hy') }}
    {{ Form::text('rank_hy', $model ? $model->rank_hy : null ,['size' => '25x5', 'placeholder' => 'Հայերեն:' ,'class' => 'form-control','required']) }}
</div>
<div class="form-group">
    {!! Form::label('name_en','Name EN', ['class' => 'awesome']) !!}
    {!! Form::text('name_en', $model ? $model->name_en : null ,['class' => 'form-control','placeholder' => 'Name:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('description_en', 'Description EN') !!}
    {!! Form::textarea('description_en', $model ? $model->description_en : null , ['size' => '25x5','placeholder' => 'English:', 'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {{ Form::label('rank_en', 'Rank En') }}
    {{ Form::text('rank_en', $model ? $model->rank_en : null ,['size' => '25x5', 'placeholder' => 'Հայերեն:' ,'class' => 'form-control','required']) }}
</div>
<div class="form-group">
    {!! Form::label('name_ru','Name RU', ['class' => 'awesome']) !!}
    {!! Form::text('name_ru', $model ? $model->name_ru : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('description_ru', 'Description RU') !!}
    {!! Form::textarea('description_ru',  $model ? $model->description_ru : null , ['size' => '25x5','placeholder' => 'Русский:', 'class' => 'form-control','required']); !!}
</div>
<div class="form-group">
    {{ Form::label('rank_ru', 'Rank Ru') }}
    {{ Form::text('rank_ru', $model ? $model->rank_ru : null ,['size' => '25x5', 'placeholder' => 'Հայերեն:' ,'class' => 'form-control','required']) }}
</div>
<div class="row no-padding">
    <div class="col-md-4">
        @if($model)
            <img src="/uploads/{{ $model->image }}" alt="" class="img-responsive thumbnail">
        @endif
        <div class="form-group">
            {!! Form::file('image[]') !!}
        </div>  
    </div>
</div>
<div class="clearfix">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
</div>
{{ Form::close() }}
@push('styles')
<link rel="stylesheet" href="{{ mix('css/tour-create-plugin.css') }}">
@endpush
@push('scripts')
<script src="{{ mix('js/tour-create-plugin.js') }}"></script>
@endpush





























