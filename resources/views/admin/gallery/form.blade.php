@php($model = isset($model) ? $model : false)
{{ Form::open(['route' => $formRoute, 'method' => 'post', 'files' => true]) }}
<div class="row no-padding">
    <div class="col-md-4">
        <h3>Vacancy</h3>
        <img src="/uploads/{{ $model['vacancy'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('vacancy[]', ['multiple' => false]) !!}
        </div>  
    </div>
</div>
<div class="row no-padding">
    <div class="col-md-4">
        <h3>Car Driver</h3>
        <img src="/uploads/{{ $model['driver'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('driver[]', ['multiple' => false]) !!}
        </div>  
    </div>
</div>
<div class="row no-padding">
    <div class="col-md-4">
        <h3>Service</h3>
        <img src="/uploads/{{ $model['service'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('service[]', ['multiple' => false]) !!}
        </div>  
    </div>
</div>
<div class="row no-padding">
    <div class="col-md-4">
        <h3>Sightseeing places</h3>
        <img src="/uploads/{{ $model['sightseeing-places'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('sightseeing-places[]', ['multiple' => false]) !!}
        </div>
    </div>
</div>
<div class="row no-padding">
    <div class="col-md-4">
        <h3>Restaurants</h3>
        <img src="/uploads/{{ $model['restaurants'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('restaurants[]', ['multiple' => false]) !!}
        </div>
    </div>
</div>
<div class="row no-padding">
    <div class="col-md-4">
        <h3>News</h3>
        <img src="/uploads/{{ $model['news'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('news[]', ['multiple' => false]) !!}
        </div>
    </div>
</div>
<div class="row no-padding">
    <div class="col-md-4">
        <h3>Apartment</h3>
        <img src="/uploads/{{ $model['apartment'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('apartment[]', ['multiple' => false]) !!}
        </div>
    </div>
</div>
<div class="row no-padding">
    <div class="col-md-4">
        <h3>Hotel</h3>
        <img src="/uploads/{{ $model['hotel'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('hotel[]', ['multiple' => false]) !!}
        </div>
    </div>
</div>
<div class="row no-padding">
    <div class="col-md-4">
        <h3>Hostel</h3>
        <img src="/uploads/{{ $model['hostel'] }}" alt="" class="img-responsive thumbnail">
        <div class="form-group">
            {!! Form::file('hostel[]', ['multiple' => false]) !!}
        </div>
    </div>
</div>
{!! Form::submit('Save', ['class' => 'btn btn-primary']); !!}
{{ Form::close() }}

