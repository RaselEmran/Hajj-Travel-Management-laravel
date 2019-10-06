<div class="toggle lg">
  <label id="status_{{$model->id}}" title="{{ $model->status == 'activated' ? _lang('status_online_to_offline') : _lang('status_offline_to_online') }}" data-popup="tooltip-custom" data-placement="bottom">
    <input type="checkbox" id="change_status" data-id="{{ $model->id }}" data-status="{{ $model->status }}" data-url="{{ route($route.'change',['value'=> ($model->status == 'activated' ? 'suspend' : 'activated'),'id'=>$model->id])  }}" {{ $model->status == 'activated' ? 'checked' : '' }} data-fouc ><span class="button-indecator"></span>
  </label>
</div>