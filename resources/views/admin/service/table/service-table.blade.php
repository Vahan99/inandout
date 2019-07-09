<tr id="d1">
    <td>{{ $service->id }}</td>
    <td>{{ $service->name_hy }}</td>
    <td>{{ $service->name_en }}</td>
    <td>{{ $service->name_ru }}</td>
    <td>
        <a href="{{ route('service.update',[$service->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="" type="button" class="delete btn btn-danger btn-sm delete_attr" data-toggle="modal" data-target="#{{ $service->id }}" data-url="{{ route('service.delete',[$service->id]) }}" data-id="{{ $service->id }}"><span class="fa fa-trash"></span></a>
    </td>
</tr>