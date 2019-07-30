<tr id="d1">
    <td>{{ $tour_day->id }}</td>
    <td>{{ $tour_day->name_hy }}</td>
    <td>{{ $tour_day->name_en }}</td>
    <td>{{ $tour_day->name_ru }}</td>
    <td>{{ $tour_day->title_hy }}</td>
    <td>{{ $tour_day->title_en }}</td>
    <td>{{ $tour_day->title_ru }}</td>
    <td style="width: 150px">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Actions
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('tour-days.update-form', [$tour_day->id]) }}" type="button" class="update"><i class="fa fa-pencil text-primary"></i> Update Tour Day</a></li>
                <li><a type="button" class="delete delete_attr" data-toggle="modal" data-target="#{{ $tour_day->id }}" data-url="{{ route('tour-days.delete',[$tour_day->id]) }}" data-id="{{ $tour_day->id }}"><i class="fa fa-trash-o text-danger"></i> Delete Tour </a></li>
            </ul>
        </div>
    </td>   
</tr>
