<tr id="d1">
    <td>{{ $driver->id }}</td>
    <td>{{ $driver->name_hy }}</td>
    <td>{{ $driver->name_en }}</td>
    <td>{{ $driver->name_ru }}</td>
    <td><img src="/uploads/{{ $driver->grid_image }}" width="150" alt=""></td>
    <td style="width: 150px">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Actions
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('driver.update',[$driver->id]) }}" type="button" class="update"><i class="fa fa-pencil text-primary"></i> Update driver </a></li>
                <li><a href="" type="button" class="delete delete_attr" data-toggle="modal" data-target="#{{ $driver->id }}" data-url="{{ route('driver.delete',[$driver->id]) }}" data-id="{{ $driver->id }}"><i class="fa fa-trash-o text-danger"></i> Delete driver </a></li>
                <li><a href="" class="delete_attr" data-toggle="modal" data-target="#{{ $driver->id }}" data-url="{{ route('driver.delete-data',[$driver->id]) }}" data-id="{{ $driver->id }}"> <i class="fa fa-trash-o text-danger"></i> Delete Price Policy</a></li>
                    <li class="divider"></li>
                    @if($driver->data)
                    <li><a href="{{ route('driver.create-update-data',[$driver->id]) }}" class=""> <i class="fa fa-pencil text-primary"></i> Update Price Policy</a></li>
                    <li><a href="" class="delete_attr" data-toggle="modal" data-target="#{{ $driver->id }}" data-url="{{ route('driver.delete-data',[$driver->id]) }}" data-id="{{ $driver->id }}"> <i class="fa fa-trash-o text-danger"></i> Delete Price Policy</a></li>
                    @else
                    <li><a href="{{ route('driver.create-update-data',[$driver->id]) }}" class=""> <i class="fa fa-plus text-success"></i> Create Price Policy</a></li>
                    @endif
                    @if($driver->amenity_data)
                        <li class="divider"></li>
                        <li><a href="" class="delete_attr" data-toggle="modal" data-target="#{{ $driver->id }}" data-url="{{ route('driver.delete-amenities',[$driver->id]) }}" data-id="{{ $driver->id }}" ><i class="fa fa-trash-o text-danger"></i> Delete Amenities</a></li>
                        <li><a href="{{ route('driver.create-update-amenities',[$driver->id]) }}" class=""><i class="fa fa-pencil text-primary"></i> Update Amenities</a></li>
                    @else
                        <li><a href="{{ route('driver.create-update-amenities',[$driver->id]) }}" class=""><i class="fa fa-plus text-success"></i> Create Amenities</a></li>
                    @endif
            </ul>
        </div>
    </td>
</tr>