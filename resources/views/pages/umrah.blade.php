@extends('layouts.frontend', ['title' => _lang('Umrah-Package')])
@push('css')
@endpush

@section('content')

        <!--Page Banner Section start-->
        <div class="page-banner-section section" style="    background-image: url({{$aboutinfo?asset('storage/pages/'.$aboutinfo->about_banner):''}})">
            <div class="container">
                <div class="row">
                    <div class="col" data-aos="zoom-in-up" data-aos-duration="1500" >
                        <h1 class="page-banner-title">Umrah Packages</h1>
                        <ul class="page-breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Umrah Packages</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      

        <!--Agent Section start-->
        <div class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">

                <!--Section Title start-->
                <div class="row">
                    <div class="col-md-12 mb-60 mb-xs-30">
                        <div class="section-title center">
                            <h1>UMRAH PACKAGE</h1>
                        </div>
                    </div>
                </div>
                <!--Section Title end-->

                <div class="row">
                    <!--Agent satrt-->

                    @foreach ($packages as $pkg_show)
                  
                    <div class="col" data-aos="zoom-in-up" data-aos-duration="1500">
                        <div class="agent">
                            <div class="image">
                                <a class="img" href="{{ route('details',['slug'=>$pkg_show->slug,'id'=>$pkg_show->id]) }}"><img src="{{asset('storage/packege/'.$pkg_show->photo)}}" alt=""  width="270" height="202.5"></a>
                            </div>
                              <div class="content">
                                    <h4 class="title"><a href="{{ route('details',['slug'=>$pkg_show->slug,'id'=>$pkg_show->id]) }}">
                                        {{strtoupper($pkg_show->name)}}:
                                        {{strtoupper($pkg_show->duration)}}</a></h4>
                                    <a href="{{ route('details',['slug'=>$pkg_show->slug,'id'=>$pkg_show->id]) }}" class="phone">{{$pkg_show->option->name}}</a>
                                    <a href="{{ route('details',['slug'=>$pkg_show->slug,'id'=>$pkg_show->id]) }}" class="email">
                                        <p>{{strtoupper($pkg_show->type)}} Packages</p>
                                    </a>
                                    <span class="properties">{{$pkg_show->price}} {{get_option('currency_symbol')}}</span>
                                </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
@stop
@push('scripts')

@endpush