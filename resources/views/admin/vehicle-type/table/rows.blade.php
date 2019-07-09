<tr id="d1">
    <td>{{ $vehicle->id }}</td>
    <td>{{ $vehicle->name_hy }}</td>
    <td>{{ $vehicle->name_en }}</td>
    <td>{{ $vehicle->name_ru }}</td>
    <td>
        <a href="{{ route('vehicle-type.update',[$vehicle->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="" type="button" class="delete btn btn-danger btn-sm delete_attr" data-toggle="modal" data-target="#{{ $vehicle->id }}" data-url="{{ route('vehicle-type.delete',[$vehicle->id]) }}" data-id="{{ $vehicle->id }}"><span class="fa fa-trash"></span></a>
    </td>
</tr>