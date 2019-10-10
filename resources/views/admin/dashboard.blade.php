@extends('layouts.app', ['title' => 'Dahsboard', 'modal' => false])
@push('admin.css')
<link href="{{asset('dist/css/pages/widget-page.css')}}" rel="stylesheet">
@endpush
@section('pageheader')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard </h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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


    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-6 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">{{Visitor::count()}}</h1>
                    <h6 class="text-white">Unique Visitor</h6>
                </div>
            </div>
        </div>
               <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-2">
                        <div class="card">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">{{Visitor::clicks()}}</h1>
                                <h6 class="text-white">Total Click</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-2">
                        <div class="card">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"> {{count(App\Package::all())}}</h1>
                                <h6 class="text-white">Total Package</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-2">
                        <div class="card">
                            <div class="box bg-dark text-center">
                                <h1 class="font-light text-white">{{count(App\User::all())}}</h1>
                                <h6 class="text-white">Total Book</h6>
                            </div>
                        </div>
                    </div>
                 
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-xlg-12">
            @php
                $prev =date('Y-m-d', strtotime('-7 days'));
                $today =date('Y-m-d');
            @endphp
                 
                    <div class="card">
                            <div class="d-flex flex-row">
                                <div class="p-10 bg-info">
                                    <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3></div>
                                <div class="align-self-center m-l-20">
                                    <h3 class="m-b-0 text-info">{{Visitor::range($prev, $today)}}</h3>
                                    <h5 class="text-muted m-b-0">Last 7 Days Unique Visitor</h5></div>
                            </div>
                        </div>
        </div>

    </div>

    <!-- /basic initialization -->
    @stop
    @push('admin.scripts')
    @endpush