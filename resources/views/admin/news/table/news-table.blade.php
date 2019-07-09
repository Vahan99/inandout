<tr id="d1">
    <td>{{ $news->id }}</td>
    <td>{{ $news->name_hy }}</td>
    <td>{{ $news->name_en }}</td>
    <td>{{ $news->name_ru }}</td>
    <td><img src="/uploads/{{ $news->grid_image }}" width="150" alt=""></td>
    <td>
        <a href="{{ route('news.update',[$news->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="" type="button" class="delete btn btn-danger btn-sm delete_attr" data-toggle="modal" data-target="#{{ $news->id }}" data-url="{{ route('news.delete',[$news->id]) }}" data-id="{{ $news->id }}"><span class="fa fa-trash"></span></a>
    </td>
</tr>