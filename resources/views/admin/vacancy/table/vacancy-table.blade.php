<tr id="d1">
    <td>{{ $vacancy->id }}</td>
    <td>{{ $vacancy->name_hy }}</td>
    <td>{{ $vacancy->name_en }}</td>
    <td>{{ $vacancy->name_ru }}</td>
    <td>
        <a href="{{ route('vacancy.update',[$vacancy->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="#" type="button" class="delete btn btn-danger btn-sm delete_attr" data-toggle="modal" data-target="#{{ $vacancy->id }}" data-url="{{ route('vacancy.delete',[$vacancy->id]) }}" data-id="{{ $vacancy->id }}"><span class="fa fa-trash"></span></a>
    </td>
</tr>