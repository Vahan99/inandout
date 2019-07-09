<tr id="d1">
    <td>{{ $model->id }}</td>
    <td>{{ $model->name_hy }}</td>
    <td>{{ $model->name_en }}</td>
    <td>{{ $model->name_ru }}</td>
    <td><img src="/uploads/{{ $model->grid_image }}" width="150" alt=""></td>
    <td>
        <a href="{{ route('restaurant.update',[$model->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="" type="button" class="delete btn btn-danger btn-sm delete_attr" data-toggle="modal" data-target="#{{ $model->id }}" data-url="{{ route('restaurant.delete',[$model->id]) }}" data-id="{{ $model->id }}"><span class="fa fa-trash"></span></a>
    </td>
</tr>