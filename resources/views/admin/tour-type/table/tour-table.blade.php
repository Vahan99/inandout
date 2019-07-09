<tr id="d1">
    <td>{{ $tour->id }}</td>
    <td>{{ $tour->name_hy }}</td>
    <td>{{ $tour->name_en }}</td>
    <td>{{ $tour->name_ru }}</td>
    <td>
        <a href="{{ route('tour.update-tour-type',[$tour->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="#" type="button" class="delete btn btn-danger btn-sm delete_attr" data-toggle="modal" data-target="#{{ $tour->id }}" data-url="{{ route('tour.delete-tour-type',[$tour->id]) }}" data-id="{{ $tour->id }}"><span class="fa fa-trash"></span></a>
    </td>
</tr>