<tr id="d1">
    <td>{{ $tour->id }}</td>
    <td>{{ $tour->name_hy }}</td>
    <td>{{ $tour->name_en }}</td>
    <td>{{ $tour->name_ru }}</td>
    <td><img src="/uploads/{{ $tour->grid_image }}" width="100" alt=""></td>
    <td style="width: 150px">
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Actions
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{ route('tour.update',[$tour->id]) }}" type="button" class="update"><i class="fa fa-pencil text-primary"></i> Update Tour </a></li>
                <li><a type="button" class="delete delete_attr" data-toggle="modal" data-target="#{{ $tour->id }}" data-url="{{ route('tour.delete',[$tour->id]) }}" data-id="{{ $tour->id }}"><i class="fa fa-trash-o text-danger"></i> Delete Tour </a></li>
                <li><a href="{{ route('tour-days.show',['id' => $tour->id]) }}" type="button" class="update"><i class="fa fa-pencil text-primary"></i> Show tour days </a></li>
                @if(!$tour->sightseeing_place)
                    <li class="divider"></li>
                    @if($tour->data)
                    <li><a href="{{ route('tour.create-update-data',[$tour->id]) }}" class=""> <i class="fa fa-pencil text-primary"></i> Update Price Policy</a></li>
                    <li><a href="{{ route('tour.delete-data',[$tour->id]) }}" class=""> <i class="fa fa-trash-o text-danger"></i> Delete Price Policy</a></li>
                    @else
                    <li><a href="{{ route('tour.create-update-data',[$tour->id]) }}" class=""> <i class="fa fa-plus text-success"></i> Create Price Policy</a></li>
                    @endif
                @endif
            </ul>
        </div>
    </td>   
</tr>
