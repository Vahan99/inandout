<tr id="d1">
    <td>{{ $page->id }}</td>
    <td>{{ $page->name_hy }}</td>
    <td>{{ $page->name_en }}</td>
    <td>{{ $page->name_ru }}</td>
    <td>
        <a href="{{ route('page.update',[$page->id]) }}" type="button" class="update btn btn-warning btn-sm"><span class="fa fa-pencil"></span></a>
    </td>
</tr>