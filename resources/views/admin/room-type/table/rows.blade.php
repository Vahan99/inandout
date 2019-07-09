<tr id="d1">
    <td>{{ $room->id }}</td>
    <td>{{ $room->name_hy }}</td>
    <td>{{ $room->name_en }}</td>
    <td>{{ $room->name_ru }}</td>
    <td>
        <a href="{{ route('room-type.update',[$room->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="#" type="button" class="delete btn btn-danger btn-sm delete_attr" data-toggle="modal" data-target="#{{ $room->id }}" data-url="{{ route('room-type.delete',[$room->id]) }}" data-id="{{ $room->id }}"><span class="fa fa-trash"></span></a>
    </td>
</tr>