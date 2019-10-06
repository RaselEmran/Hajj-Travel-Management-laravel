  <div class="btn-group" id="action_menu_{{$model->id}}">
  	<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  		<i class="ti-settings"></i>
  	</button>
  	<div class="dropdown-menu">
  		<a class="dropdown-item" href="{{ route('admin.user.edit',$model->id) }}"> <i class=" icon-note"></i>{{_lang('edit')}}</a>
  		<a class="dropdown-item" href="#" id="delete_item" data-id ="{{$model->id}}" data-url="{{route('admin.user.delete',$model->id) }}">
  			<i class="icon-trash"></i>{{_lang('delete')}}
  		</a>
  	</div>
  </div>