@php($model = isset($model) ? $model : false)
{{ Form::open(['route' => $formRoute, 'method' => 'post', 'files' => true]) }}
<div class="form-group">
    {!! Form::label('title_hy','Title HY', ['class' => 'awesome']) !!}
    {!! Form::textarea('title_hy', $model ? $model->title_hy : null ,['class' => 'form-control', 'name' => 'title_hy'])!!}
</div>  
<div class="form-group">
    {!! Form::label('title_en','Title EN', ['class' => 'awesome']) !!}
    {!! Form::textarea('title_en', $model ? $model->title_en : null ,['class' => 'form-control','name' => 'title_en'])!!}
</div>
<div class="form-group">
    {!! Form::label('title_ru','Title RU', ['class' => 'awesome']) !!}
    {!! Form::textarea('title_ru', $model ? $model->title_ru : null ,['class' => 'form-control', 'name' => 'title_ru'])!!}
</div>
<div class="form-group">
    {!! Form::label('keywords_desc','Keywords Description', ['class' => 'awesome']) !!}
    {!! Form::textarea('keywords_desc', $model ? $model->keywords_desc : null ,['class' => 'form-control', 'placeholder' => 'Keywords desc:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('keywords','Keywords Name', ['class' => 'awesome']) !!}
    {!! Form::text('keywords', $model ? $model->keywords : null ,['class' => 'form-control', 'placeholder' => 'Keywords name:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('phone','Phone', ['class' => 'awesome']) !!}
    {!! Form::text('phone', $model ? $model->phone : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('mail','Mail', ['class' => 'awesome']) !!}
    {!! Form::text('mail', $model ? $model->mail : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('facebook','Facebook link', ['class' => 'awesome']) !!}
    {!! Form::text('facebook', $model ? $model->facebook : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('tripadvisor','tripadvisor link', ['class' => 'awesome']) !!}
    {!! Form::text('tripadvisor', $model ? $model->tripadvisor : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('instagram','Instagram link', ['class' => 'awesome']) !!}
    {!! Form::text('instagram', $model ? $model->instagram : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
</div>
<div class="form-group">
    {!! Form::label('vk','Vk link', ['class' => 'awesome']) !!}
    {!! Form::text('vk', $model ? $model->vk : null ,['class' => 'form-control', 'placeholder' => 'Имя:','required'])!!}
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
{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
{{ Form::close() }}
@push('styles')
<link rel="stylesheet" href="{{ mix('css/tour-create-plugin.css') }}">
@endpush
@push('scripts')
<script type="text/javascript">
    var areas = ['title_ru','title_en','title_hy'];
</script> 
<script src="{{ mix('js/tour-create-plugin.js') }}"></script>
@endpush

