@extends('layouts.app', ['title' => _lang('Booking'), 'modal' => 'xl'])
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
        <h4 class="text-themecolor">Dashboard</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{_lang('Booking')}}</li>
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
        <h4 class="card-title">Booking List</h4>
        <div class="table-responsive m-t-40">
            <table class="table table-bordered table-striped" id="sampleTable">
                <thead>
                   <tr>
                    <th>{{_lang('Package Name')}}</th>
                    <th>{{_lang('Client Name')}}</th>
                    <th>{{_lang('Booking Date')}}</th>
                    <th>{{_lang('Action')}}</th>
                </tr>
            </thead>
            <tbody>
               @foreach($book as $all)
               <tr>
                  <td>{{$all->package->name}}</td>
                  <td>{{$all->user->name}}</td>
                  <td>{{$all->created_at->format('F-d-Y')}}</td>
                  <td>
                      <a href=""  id="content_managment" data-url="{{ route('admin.book.client',$all->id) }}" class="btn btn-info" style="width:100%;margin-bottom:3px;">Client Info</a>
                      
                      <a href=""  id="content_managment" data-url="{{ route('admin.book.packege',$all->id) }}" class="btn btn-primary" style="width:100%;margin-bottom:3px;">Package Info</a>

                      <a href="" id="delete_item" data-id ="{{$all->id}}" data-url="{{route('admin.book.delete',$all->id) }}" class="btn btn-danger" style="width:100%;margin-bottom:3px;">Remove</a>
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