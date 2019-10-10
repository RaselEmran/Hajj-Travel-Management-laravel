@extends('layouts.app', ['title' => 'Role', 'modal' => false])
@push('admin.css')
<link rel="stylesheet" type="text/css"
        href="{{asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css"
        href="{{asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
@endpush
@section('pageheader')
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Role Permission</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Role Permission</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

@stop
@section('content')

 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Other Sample form</h4>
            </div>
            <div class="card-body">
                    {!! Form::open(['route' => 'admin.user.role.update', 'id'=>'content_form','files' => true, 'method' => 'POST']) !!}
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            {{ Form::label('name',  __('Role Name') , ['class' => 'col-form-label required']) }}

            {{ Form::text('name', $role->name, ['class' => 'form-control', 'placeholder' =>  __('Role Name'),'required'=>'']) }}
            <input type="hidden" name="id" value="{{$role->id}}">
          </div>
        </div>
        </div>
        <div class="row">
        <h2>{{__('Permission')}}</h2>
         <table class="table table-bordered">
          @foreach (split_name($permissions) as $key => $element)
            <tr>
                <td rowspan ="{{count($element)+1}}">{!! $key !!}</td>
                <td rowspan="{{count($element)+1}}">
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input select_all" id="select_all_{{$key}}" data-id="{{$key}}">
                <label class="custom-control-label" for="select_all_{{$key}}">{{__('Select All')}}</label>
                </div>
                </td>
            </tr>
             @foreach ($element as $per)
             <tr>

                <td>
                 <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input {{$key}}" id="{{$per}}" multiple="multiple" name="permissions[]" value="{{$per}}" {{in_array($per, $role_permissions)?'checked':''}}>
                <label class="custom-control-label" for="{{$per}}">{{tospane($per)}}</label>
                </div>
                
                </td>
             </tr>
            @endforeach
           @endforeach
         </table>
        </div>
        @can('role.update')
         <div class="text-right">
            <button type="submit" class="btn btn-primary"  id="submit">{{__('Update Permission')}}<i class="icon-arrow-right14 position-right"></i></button>
            <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{__('Processing')}} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>

           </div>
         @endcan

    {!!Form::close()!!}
            </div>
        </div>
       </div> 
      </div>     

<!-- /basic initialization -->
@stop
@push('admin.scripts')
    <script src="{{asset('js/role.js')}}"></script>
    <script>
  $(document).on('click','.select_all',function(){
    var id =$(this).data('id');
    if (this.checked) {
      $("."+id).prop('checked', true);
    } else{
      $("."+id).prop('checked', false);
    }
  });
</script>

    <!-- start - This is for export functionality only -->
@endpush  