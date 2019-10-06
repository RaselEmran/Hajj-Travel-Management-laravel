@extends('layouts.app', ['title' => _lang('package-option'), 'modal' => 'lg'])
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
        <h4 class="text-themecolor">{{_lang('package-option')}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{_lang('package-option')}}</li>
            </ol>
            <a href=""  data-url="{{ route('admin.option.create') }}" class="btn btn-info d-none d-lg-block m-l-15"  id="content_managment"><i class="ti-plus"></i> Create New</a>
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
        <h4 class="card-title">Data Table</h4>
        <h6 class="card-subtitle">Data table example</h6>
        <div class="table-responsive m-t-40">
            <table class="table table-bordered table-striped content_managment_table" data-url="{{ route('admin.option.datatable') }}">
                <thead>
                   <tr>
                    <th>{{_lang('id')}}</th>
                    <th>{{_lang('name')}}</th>
                    <th>{{_lang('option')}}</th>
                    <th>{{_lang('action')}}</th>
                   </tr>
               </thead>

          </table>
     </div>
  </div>
</div>
<!-- /basic initialization -->
@stop
@push('admin.scripts')
<script src="{{asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('js/option.js')}}"></script>

<!-- start - This is for export functionality only -->
@endpush