@extends('layouts.frontend', ['title' => _lang('news')])
@push('css')
@endpush

@section('content')

        <!--Page Banner Section start-->
        <div class="page-banner-section section" style="    background-image: url({{$aboutinfo?asset('storage/pages/'.$aboutinfo->about_banner):''}})">
            <div class="container">
                <div class="row">
                    <div class="col" data-aos="zoom-in-up" data-aos-duration="1500" >
                        <h1 class="page-banner-title">Latest News</h1>
                        <ul class="page-breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Latest News</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      
    <!--News Section start-->
    <div class="news-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
            
            <div class="row">
               
                <!--News start-->
                @foreach ($news as $element)
           
                <div class="col-lg-4 col-md-6 col-12 mb-30">
                    <div class="news">
                        <div class="image">
                            <a href="{{ route('news-details',['slug'=>$element->slug,'id'=>$element->id]) }}"><img src="{{asset('storage/news/'.$element->photo)}}" alt="{{$element->title}}" width="328" height="283"></a>
                            <div class="meta-wrap">
                                <ul class="meta">
                                    <li>{{$element->created_at->format('F-d-Y')}}</li>
                                </ul>
                                <ul class="meta back">
                                     <li>{{$element->created_at->format('F-d-Y')}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h4 class="title"><a href="{{ route('news-details',['slug'=>$element->slug,'id'=>$element->id]) }}">{{$element->title}}</a></h4>
                            <div class="desc">
                                <p>{{$element->short_content}}</p>
                            </div>
                            <a href="{{ route('news-details',['slug'=>$element->slug,'id'=>$element->id]) }}" class="readmore">Continure Reading</a>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            
            <div class="row mt-30">
                <div class="col">
                    {{ $news->links() }}
                 {{--    <ul class="page-pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i> Prev</a></li>
                        <li class="active"><a href="#">01</a></li>
                        <li><a href="#">02</a></li>
                        <li><a href="#">03</a></li>
                        <li><a href="#">04</a></li>
                        <li><a href="#">05</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i> Next</a></li>
                    </ul> --}}
                </div>
            </div>
            
        </div>
    </div>
    <!--News Section end-->
@stop
@push('scripts')

@endpush