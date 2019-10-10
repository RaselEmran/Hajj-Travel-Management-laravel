@extends('layouts.app', ['title' => _lang('language'), 'modal' => 'lg'])
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
        <h4 class="text-themecolor">{{_lang('language')}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{_lang('language')}}</li>
            </ol>
            
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
@stop
@section('content')
<!-- Basic initialization -->
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Local Language</h4>
        <h6 class="card-subtitle"><a href="" class="btn btn-info  m-l-15" id="content_managment" data-url ="{{ route('admin.language.create') }}"><i class="ti-plus"></i> Create New</a></h6>
        <div class="table-responsive m-t-40">
            <table class="table table-bordered table-striped" id="sampleTable">
                <thead>
                   <tr>
                    <th>{{_lang('language')}}</th>
                    <th>{{_lang('edit_tarnslation')}}</th>
                    <th>{{_lang('remove')}}</th>
                </tr>
            </thead>
            <tbody>
               @foreach(get_language_list() as $language)
               <tr>
                <td>{{ ucwords($language) }}</td>
                <td>
                    <a href="{{ route('admin.language.edit',$language) }}" class="btn btn-info"><i class="icon-pencil7"></i>{{_lang('translate')}}</a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger" id="delete_item" data-id ="{{$language}}" data-url="{{route('admin.language.delete',$language) }}">{{_lang('trash')}}</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
<!-- /basic initialization -->
@stop
@push('admin.scripts')
<script src="{{asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/setting.js')}}"></script>

<!-- start - This is for export functionality only -->
@endpush