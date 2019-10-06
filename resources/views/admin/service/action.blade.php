

<a href="{{ route('admin.service.edit',$model->id) }}" class="btn btn-info" title="{{ __('Edit Permission') }}" data-popup="tooltip" data-placement="bottom"><i class=" icon-note"></i></a>

<a href="#" id="delete_item" data-id ="{{$model->id}}" data-url="{{route('admin.service.delete',$model->id) }}" class="btn btn-danger" title="{{ __('Delete Permission') }}" data-popup="tooltip" data-placement="bottom"><i class="icon-trash"></i></a>

