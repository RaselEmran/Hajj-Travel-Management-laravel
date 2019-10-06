@extends('layouts.frontend', ['title' => _lang('About Us')])
@push('css')
@endpush

@section('content')

        <!--Page Banner Section start-->
        <div class="page-banner-section section" style="    background-image: url({{$aboutinfo?asset('storage/pages/'.$aboutinfo->about_banner):''}})">
            <div class="container">
                <div class="row">
                    <div class="col" data-aos="zoom-in-up" data-aos-duration="1500" >
                        <h1 class="page-banner-title">About us</h1>
                        <ul class="page-breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">About us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Page Banner Section end-->

        <!--Welcome Satt It - Real Estate Bootstrap 4 Templatesection-->
        <div class="feature-section feature-section-border-top section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-60 pb-lg-40 pb-md-30 pb-sm-20 pb-xs-10">
            <div class="container">
                <div class="row row-25 align-items-center">

                    <!--Feature Image start-->
                    <div class="col-lg-5 col-12 order-1 order-lg-2 mb-40" data-aos="zoom-in-up"data-aos-duration="2000">
                        <div class="feature-image"><img class="w-100" src="{{$aboutinfo?asset('storage/pages/'.$aboutinfo->about_image):''}}" alt=""></div>
                    </div>
                    <!--Feature Image end-->

                    <div class="col-lg-7 col-12 order-2 order-lg-1 mb-40" data-aos="zoom-in" data-aos-duration="3000">
                        <div class="row">
                            <div class="col">
                                <div class="about-content">
                                {!!  $aboutinfo?$aboutinfo->about_content:'' !!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
@stop
@push('scripts')

@endpush