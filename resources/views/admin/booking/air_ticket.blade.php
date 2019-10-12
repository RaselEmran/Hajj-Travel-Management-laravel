@extends('layouts.app', ['title' => _lang('Air Ticket'), 'modal' => 'lg'])
@push('admin.css')
<link rel="stylesheet" type="text/css"
href="{{asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css"
href="{{asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
<link href="{{asset('assets/node_modules/summernote/dist/summernote.css')}}" rel="stylesheet" />
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
                <li class="breadcrumb-item active">{{_lang('Air Ticket')}}</li>
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
        <h4 class="card-title">Air Ticket Booking List</h4>
        <h6 class="card-subtitle"></h6>

        <div class="table-responsive m-t-40">
            <table class="table table-bordered table-striped" id="sampleTable">
                <thead>
                   <tr>
                    <th>{{_lang('Id')}}</th>
                    <th>{{_lang('Name')}}</th>
                    <th>{{_lang('phone')}}</th>
                    <th>{{_lang('Email')}}</th>
                    <th>{{_lang('Action')}}</th>
                </tr>
              </thead>
            <tbody>
               @foreach($ticket as $all)
               <tr>
                  <td>{{$loop->index+1}}</td>
                  <td>{{$all->name}}</td>
                  <td>{{$all->phone}}</td>
                  <td>{{$all->email}}</td>
                  <td>
                     <a href=""  id="content_managment" data-url="{{ route('admin.air_ticket.mail',$all->id) }}" class="btn btn-info">Email</a>
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