@extends('layouts.frontend', ['title' => _lang('news-details')])
@push('css')
@endpush

@section('content')
<!--Page Banner Section start-->
<div class="page-banner-section section" style="background-image: url({{$news?asset('storage/news/'.$news->banner):''}})">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="page-banner-title">Latest News</h1>
                <ul class="page-breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Latest News</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Page Banner Section end-->

<!--Page Banner Section end-->

<!--News Section start-->
<div class="news-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
         
            <div class="col-xl-9 col-lg-8 col-12 order-1 mb-sm-50 mb-xs-50">
                
                <div class="single-news-item">
                    <div class="image"><img src="{{$news?asset('storage/news/'.$news->photo):''}}" alt="{{$news->title}}" class="img-fluid" width="100%"></div>
                    <div class="content">
                        <h2 class="title">{{$news->title}}</h2>
                        <ul class="news-meta">
                            <li>{{$news->category->name}}</li>
                            <li>{{$news->created_at->format('F-d-Y')}}</li>
                        </ul>
                        <div class="desc">
                           {!! $news->news_content!!}
                       </div>
                       <div class="news-footer">
                        <div class="tags"><span>Category:</span> <a href="">{{$news->category->name}}</a></div>
                    </div>
                </div>
            </div>

            @php
            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            @endphp
            
            <div class="sharethis-inline-share-buttons st-left st-has-labels  st-inline-share-buttons st-animated" id="st-1" style="margin-top: 10px">
                <div class="st-btn st-first" data-network="facebook" style="display: inline-block; color: #fff">
                    <a href="javascript:void(0)"  onclick="javascript:genericSocialShare('https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>')">
                      <img src="https://platform-cdn.sharethis.com/img/facebook.svg">
                      <span class="st-label">Share</span>
                  </a>
              </div>
              <div class="st-btn" data-network="twitter" style="display: inline-block; color: #fff">
                <a href="javascript:void(0)"  onclick="javascript:genericSocialShare('https://twitter.com/home?status=<?php echo $actual_link; ?>')">
                  <img src="https://platform-cdn.sharethis.com/img/twitter.svg">
                  <span class="st-label">Tweet</span>
              </a>
          </div>
          <div class="st-btn" data-network="pinterest" style="display: inline-block;color: #fff">
            <a href="javascript:void(0)" onclick="javascript:genericSocialShare('http://pinterest.com/pin/create/button/?url=<?php echo $actual_link; ?>]')">
              <img src="https://platform-cdn.sharethis.com/img/pinterest.svg">
              <span class="st-label">Pin</span>
          </a>
      </div>

  </div>         
  <div class="fb-comments" data-href="{{$actual_link}}" data-numposts="5"></div>         
  
</div>

<div class="col-xl-3 col-lg-4 col-12 order-2 pl-30 pl-sm-15 pl-xs-15">

    @if ($populars->count()>0)
    <!--Sidebar start-->
    <div class="sidebar">
        <h4 class="sidebar-title"><span class="text">Popular News</span><span class="shape"></span></h4>
        
        <!--Sidebar Property start-->
        <div class="sidebar-news-list">
            @foreach ($populars as $pp)
                {{-- expr --}}
     
            <div class="sidebar-news">
                <div class="image">
                    <a href="{{ route('news-details',['slug'=>$pp->slug,'id'=>$pp->id]) }}"><img src="{{asset('storage/news/'.$pp->photo)}}" alt=""></a>
                </div>
                <div class="content">
                    <h5 class="title"><a href="{{ route('news-details',['slug'=>$pp->slug,'id'=>$pp->id]) }}">{{$pp->title}}</a></h5>
                    <span class="date">{{$pp->created_at->format('F-d-Y')}}</span>
                </div>
            </div>
           @endforeach
            
            
        </div>
        <!--Sidebar Property end-->
        
    </div>
    @endif
    
</div>

</div>
</div>
</div>
<!--News Section end-->
<!--News Section end-->
@stop
@push('scripts')

<script>
    function genericSocialShare(url){
        window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
        return true;
    }

</script>
<script>
  {!!$comments->code_body!!}
</script>
@endpush