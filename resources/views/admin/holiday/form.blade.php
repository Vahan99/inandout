@php($model = isset($model) ? $model : false)
{{ Form::open(['route' => $formRoute, 'method' => 'post', 'files' => true,'id']) }}
<div class="form-group">
    {{ Form::textarea('text_hy',$model ? $model->text_hy : null,['id' => 'text_hy', 'class' => 'form-control', 'name' => 'text_hy']) }}
</div>
<div class="form-group">
    {{ Form::textarea('text_en',$model ? $model->text_en : null,['id' => 'text_en', 'class' => 'form-control', 'name' => 'text_en']) }}
</div>
<div class="form-group">
    {{ Form::textarea('text_ru',$model ? $model->text_ru : null,['id' => 'text_ru', 'class' => 'form-control', 'name' => 'text_ru']) }}
</div>
<div class="form-group">
    {!! Form::file('images[]', ['id' => 'images']) !!}
</div>
{{ csrf_field() }}
{!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
{{ Form::close() }}
@push('styles')
<link rel="stylesheet" href="{{ mix('css/tour-create-plugin.css') }}">
@endpush
@push('scripts')
<script src="{{ mix('js/tour-create-plugin.js') }}"></script>
<script>
	var areas = ['text_ru','text_en','text_hy'];
</script>
@endpush

