@extends('layouts.frontend', ['title' => _lang('Hajj')])
@push('css')
@endpush

@section('content')

        <!--Hero Section start-->
        
        <div class="hero-section section position-relative">

            <!--Hero Slider start-->
            <div class="hero-slider section">
            @if ($slider->count()>0)
                
              @foreach ($slider as $slide_show)
                      <!--Hero Item start-->
                <div class="hero-item" style="background-image: url({{asset('storage/slider/'.$slide_show->image)}})">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">

                                <!--Hero Content start-->
                                <div class="hero-property-content text-center">

                                    <h1 class="title"><a href="">{{$slide_show?$slide_show->title:'Welcome to Hajj kafela'}} </a></h1>

                                    <div class="type-wrap">
                                        <span class="type">{{$slide_show?$slide_show->btn_text:'For Rent'}}</span>
                                        <span class="price">{{$slide_show?$slide_show->sub_title:'$500'}}</span>
                                    </div>

                                </div>
                                <!--Hero Content end-->

                            </div>
                        </div>
                    </div>
                </div>
                <!--Hero Item end-->
              @endforeach
              @endif

            </div>
            <!--Hero Slider end-->

        </div>
        <!--Hero Section end-->

        <!--Welcome Khonike - Real Estate Bootstrap 4 Templatesection-->
        <div class="feature-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-60 mb-xs-30">
                        <div class="section-title center">
                            <h1>Feature Property</h1>
                        </div>
                    </div>
                </div>
                <div class="feature-wrap row row-25">
                    <!--Feature start-->
                    <div class="col-lg-4 col-sm-6 col-12 mb-50">
                        <div class="feature">
                            <div class="icon"><i class="pe-7s-bookmarks"></i></div>
                            <div class="content">
                                <h4>Cheap Rates</h4>
                                <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                            </div>
                        </div>
                    </div>
                    <!--Feature end-->

                    <!--Feature start-->
                    <div class="col-lg-4 col-sm-6 col-12 mb-50">
                        <div class="feature">
                            <div class="icon"><i class="pe-7s-config"></i></div>
                            <div class="content">
                                <h4>Discount Offers</h4>
                                <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                            </div>
                        </div>
                    </div>
                    <!--Feature end-->

                    <!--Feature start-->
                    <div class="col-lg-4 col-sm-6 col-12 mb-50">
                        <div class="feature">
                            <div class="icon"><i class="pe-7s-check"></i></div>
                            <div class="content">
                                <h4>Trust & Safety</h4>
                                <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                            </div>
                        </div>
                    </div>
                    <!--Feature end-->

                    <!--Feature start-->
                    <div class="col-lg-4 col-sm-6 col-12 mb-50">
                        <div class="feature">
                            <div class="icon"><i class="pe-7s-signal"></i></div>
                            <div class="content">
                                <h4>Free Wifi</h4>
                                <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                            </div>
                        </div>
                    </div>
                    <!--Feature end-->

                    <!--Feature start-->
                    <div class="col-lg-4 col-sm-6 col-12 mb-50">
                        <div class="feature">
                            <div class="icon"><i class="pe-7s-map"></i></div>
                            <div class="content">
                                <h4>Easy to Find</h4>
                                <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                            </div>
                        </div>
                    </div>
                    <!--Feature end-->

                    <!--Feature start-->
                    <div class="col-lg-4 col-sm-6 col-12 mb-50">
                        <div class="feature">
                            <div class="icon"><i class="pe-7s-shield"></i></div>
                            <div class="content">
                                <h4>Reliable</h4>
                                <p>ed do eiusmod tempor dolor sit amet, conse elit ctetur sed tempor.</p>
                            </div>
                        </div>
                    </div>
                    <!--Feature end-->

                </div>

            </div>
        </div>
        <!--Welcome Khonike - Real Estate Bootstrap 4 Templatesection end-->

        <!--Agent Section start-->
        <div class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">

                <!--Section Title start-->
                <div class="row">
                    <div class="col-md-12 mb-60 mb-xs-30">
                        <div class="section-title center">
                            <h1>ECONOMY PACKAGE</h1>
                        </div>
                    </div>
                </div>
                <!--Section Title end-->

                <div class="row">
                    <div class="agent-carousel section">
              @if ($package->count()>0)
                
              @foreach ($package as $pkg_show)
                        <!--Agent satrt-->
                        <div class="col">
                            <div class="agent">
                                <div class="image">
                                    <a class="img" href="{{ route('details',['slug'=>$pkg_show->slug,'id'=>$pkg_show->id]) }}"><img src="{{asset('storage/packege/'.$pkg_show->photo)}}" alt="" width="270" height="202.5"></a>
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
                     @endif   
                   
                        <!--Agent end-->

                    </div>
                </div>
            </div>
        </div>
        <!--Agent Section end-->


        <!--Services section start-->
        <div class="service-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
            <div class="container">

                <!--Section Title start-->
                <div class="row">
                    <div class="col-md-12 mb-60 mb-xs-30">
                        <div class="section-title center">
                            <h1>Our Services</h1>
                        </div>
                    </div>
                </div>
                <!--Section Title end-->

                <div class="row row-30 align-items-center">
                    <div class="col-lg-5 col-12 mb-30">
                        <div class="property-slider-2">
                        @if ($service_slider->count()>0)
                        @foreach ($service_slider as $srl_show)
                            <div class="property-2">
                                <div class="property-inner">
                                    <a href="" class="image"><img src="{{asset('storage/service/slider/'.$srl_show->image)}}" alt="" width="420" height="315"></a>
                                    <div class="content">
                                        <h4 class="title"><a href="#">{{$srl_show->title1}}</a></h4>
                                        <span class="location">{{$srl_show->sub_title1}}</span>
                                        <h4 class="type">Rent <span>{{$srl_show->title2}} <span>Month</span></span></h4>
                                       <span class="location"> {{$srl_show->sub_title2}}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="row row-20">
                        @if ($service->count()>0)
                        @foreach ($service as $sr_show)
                            <!--Service start-->
                            <div class="col-md-6 col-12 mb-30">
                                <div class="service">
                                    <div class="service-inner">
                                        <div class="head">
                                            <div class="icon"><img src="{{asset('storage/service/'.$sr_show->icon)}}" alt="" width="40" height="42"></div>
                                            <h4>{{$sr_show->title}}</h4>
                                        </div>
                                        <div class="content">
                                            <p>{{$sr_show->text}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Service end-->
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--Services section end-->
@stop
@push('scripts')

<!-- start - This is for export functionality only -->
@endpush