<tr id="d1">
    <td>{{ $model->id }}</td>
    <td>{{ $model->name_hy }}</td>
    <td>{{ $model->name_en }}</td>
    <td>{{ $model->name_ru }}</td>
    <td><span>{{ $model->description_hy }}</span></td>
    <td><span>{{ $model->description_en }}</span></td>
    <td><span>{{ $model->description_ru }}</span></td>
    <td>
        <a href="{{ route('team.update',[$model->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
        <a href="{{ route('team.delete',[$model->id]) }}" type="button" class="delete btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
    </td>
</tr>