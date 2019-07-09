<tr id="d1">
    <td>{{ $residence->id }}</td>
    <td>{{ $residence->name_hy }}</td>
    <td>{{ $residence->name_en }}</td>
    <td>{{ $residence->name_ru }}</td>
    <td><img src="/uploads/{{ $residence->grid_image }}" width="150" alt=""></td>
    <td style="width: 200px">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Actions
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('residence.update',[$residence->id]) }}" type="button" class="update"><i class="fa fa-pencil text-primary"></i> Update Residence </a></li>
                <li><a href="" type="button" class="delete delete_attr" data-toggle="modal" data-target="#{{ $residence->id }}" data-url="{{ route('residence.delete',[$residence->id]) }}" data-id="{{ $residence->id }}"><i class="fa fa-trash-o text-danger"></i> Delete Residence </a></li>
                <li class="divider"></li>
                @if($residence->data)
                    <li><a href="" class="delete delete_attr" data-toggle="modal" data-target="#{{ $residence->id }}" data-url="{{ route('residence.delete-data',[$residence->id]) }}" data-id="{{ $residence->id }}"><i class="fa fa-trash-o text-danger"></i> Delete Price Policy</a></li>
                    <li><a href="{{ route('residence.create-update-data',[$residence->id]) }}" class=""><i class="fa fa-pencil text-primary"></i> Update Price Policy</a></li>
                @else
                    <li><a href="{{ route('residence.create-update-data',[$residence->id]) }}" class=""><i class="fa fa-plus text-success"></i> Create Price Policy</a></li>
                @endif

                @if($residence->amenity_data)
                    <li class="divider"></li>
                    <li><a href="" class="delete_attr" data-toggle="modal" data-target="#{{ $residence->id }}" data-url="{{ route('residence.delete-amenities',[$residence->id]) }}" data-id="{{ $residence->id }}"><i class="fa fa-trash-o text-danger"></i> Delete Amenities</a></li>
                    <li><a href="{{ route('residence.create-update-amenities',[$residence->id]) }}" class=""><i class="fa fa-pencil text-primary"></i> Update Amenities</a></li>
                @else
                    <li><a href="{{ route('residence.create-update-amenities',[$residence->id]) }}" class=""><i class="fa fa-plus text-success"></i> Create Amenities</a></li>
                @endif
            </ul>
        </div>

    </td>
</tr>
