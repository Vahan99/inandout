<tr id="d1">
    <td>{{ $region->id }}</td>
    <td>{{ $region->name_hy }}</td>
    <td>{{ $region->name_en }}</td>
    <td>{{ $region->name_ru }}</td>
    <td>
        <a href="{{ route('region.update',[$region->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="" type="button" class="delete btn btn-danger btn-sm delete_attr" data-toggle="modal" data-target="#{{ $region->id }}" data-url="{{ route('region.delete',[$region->id]) }}" data-id="{{ $region->id }}"><span class="fa fa-trash"></span></a>
    </td>
</tr>