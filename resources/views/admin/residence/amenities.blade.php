@extends('admin.layouts.admin-layout')
@section('admin-content')
<style>
	.error {
		color: red;
	}
</style>
<div class="box">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="box-header">
        <h3 class="box-title">Create Amenities</h3>
    </div>
    <div class="box-body">
        <div class="form-group price-tbl">
            <div class="pull-right">
                <div class="form-group">
                    <button class="btn btn-success fa fa-plus add" type="button"></button>
                    <button class="btn btn-danger fa fa-minus remove" type="button"></button>
                </div>
            </div>
            <form id="form">	
            <table class="table-responsive table table-bordered" id="">
            	<thead>
            		<tr>
            			<th>Name</th>
            			<th>Qty</th>
            		</tr>
            	</thead>
                <tbody id="append-place">
                	@php($i = 0)
                	@if(isset($model) && $model->amenity_data)
                        @foreach($model->amenity_data as $key => $data)
                        @php($i++)
                            <tr>
                                <td style="width: 50%">
                                	<div class="col-md-3">
                                    	<input type="text" class="form-control name_en" placeholder="Enter name EN" name="name_en{{ $i }}" required value="{{ $data['name']['en'] }}">
                                	</div>
                                	<div class="col-md-3">
                                    	<input type="text" class="form-control name_ru" placeholder="Enter name RU" name="name_ru{{ $i }}" required value="{{ $data['name']['ru'] }}">
                                	</div>
                                	<div class="col-md-3">
                                    	<input type="text" class="form-control name_hy" placeholder="Enter name HY" name="name_hy{{ $i }}" required value="{{ $data['name']['hy'] }}">
                                	</div>
                                    <div class="col-md-3">
                                        <select class="multi_select" name="room_types" multiple>
                                            <option>Superior Room</option>
                                            <option>Executive Room</option>
                                            <option>Pacific Room</option>
                                            <option>Deluxe Suite</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                </td>
                                <td>
                                	<div class="col-md-3">
	                                	<div class="input-group input-group-sm">
									        <span class="input-group-btn">
									            <button type="button" class="btn btn-default">
													<i class="fa fa-check text-success"></i>
													<input type="radio" {{ $data['qty'] == 'v' ? 'checked' : '' }} name="data{{ $i }}" value="v">
									            </button>
									            <button type="button" class="btn btn-default">
													<i class="fa fa-remove text-danger"></i>
													<input type="radio" name="data{{ $i }}" value="x" {{ $data['qty'] == 'x' ? 'checked' : '' }}>
									            </button>
									        </span>
									    </div>
                                	</div>
                                	<div class="col-md-9">
									    <div class="input-group input-group-sm">
			        		                <span class="input-group-addon">
				            	              <input type="radio" name="data{{ $i }}" value="text" {{ ($data['qty'] != 'v') && ($data['qty'] != 'x') ? 'checked' : '' }}>
				                        	</span>
				                	    	<input 
                                                type="text" 
                                                class="form-control text" 
                                                @if(($data['qty'] !== 'v') && ($data['qty'] !== 'x'))
                                                    value={{ $data['qty'] }}
                                                @else
                                                'readonly'
                                                @endif>
				                  		</div>
                                	</div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>    
	        <div id="row">
   				<button type="submit" class="btn btn-info submit" id="button">Save</button>
	        </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var i = 1000;
    var validate = true;
    var create_url = "{{ route('residence.create-update-amenities-save', ['id' => $model->id]) }}";
    var show_url = "{{ $showUrl }}";
    var $appendPlace = $('#append-place');
    $(document).on('change', 'input[value=text]', function() {
        $(this).parents('.input-group').find('input[type=text]').removeAttr('readonly');
    });
    $(document).on('change', 'input[value=x], input[value=v]', function() {
        $(this).parents('td').find('input[type=text]').attr('readonly', 'readonly').val('');
    });
    $(document).on('keydown', 'input[type=text]', function() {
        if(!!$(this).val()) {
            $(this).parents('.input-group').removeClass('has-error');
        }
    });

    $('.remove').on('click', function() {
        $appendPlace.children().last().remove();
    });
    $('.add').on('click', function() {
        i++;
    	var $row = $('<tr><td style="width: 50%"><div class="col-md-4"><input type="text" class="form-control name_en" placeholder="Enter name EN" name="name_en' + i +'" required></div><div class="col-md-4"><input type="text" class="form-control name_ru" placeholder="Enter name RU" name="name_ru' + i + '" required></div><div class="col-md-4"><input type="text" class="form-control name_hy" placeholder="Enter name HY" name="name_hy' + i +'" required></div></td><td><div class="col-md-3"><div class="input-group input-group-sm"><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-check text-success"></i><input type="radio" checked name="data' + i + '" value="v"></button><button type="button" class="btn btn-default"><i class="fa fa-remove text-danger"></i><input type="radio" name="data' + i + '" value="x"></button></span></div></div><div class="col-md-9"><div class="input-group input-group-sm">' +
            '<span class="input-group-addon"><input type="radio" name="data' + i + '" value="text"></span><input type="text" class="form-control text" readonly></div></div></td></tr>');
        $appendPlace.append($row.clone());
    });
    $('.submit').on('click', function(e) {
        var data = [];
        $appendPlace.children().each(function(i, el) {
        	var qty = $(el).find('input[type=radio]:checked').val();
        	var name = {
        		ru: $(el).find('.name_ru').val(),
        		hy: $(el).find('.name_hy').val(),
        		en: $(el).find('.name_en').val()
        	};
    	    var select = $(el).find('.multi_select');
        	if(qty === 'text') {
                validate = true;
                qty = $(el).find('.text').val();
                qty = !!qty ? qty : validate = false;
                if(!validate) {
                    $(el).find('.text').parents('.input-group').addClass('has-error');
                } 
        	}
        
            data.push({
                name: name,
                qty: qty
            })
        });

        $('#form').validate({
            submitHandler: function(e) {
                console.log(validate);
                if(validate) {
                    $.ajax({
                        url: create_url,
                        method: 'post',
                        data: {
                            data: data,
                            id: "{{ $model->id }}"
                        },
                        success: function(res) {
                            location.href = show_url;
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            }
        });        
    });
</script>
@endpush
