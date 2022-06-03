@if((bool)$siteSetting->is_slider_active)
<!-- Revolution slider start -->
<div class="tp-banner-container">
    <div class="tp-banner" >
        <ul>
            @if(isset($sliders) && count($sliders))
            @foreach($sliders as $slide)
            <!--Slide-->
            <li data-slotamount="7" data-transition="slotzoom-horizontal" data-masterspeed="1000" data-saveperformance="on"> <img alt="{{$slide->slider_heading}}" src="{{asset('/')}}images/slider/dummy.png" data-lazyload="{{ ImgUploader::print_image_src('/slider_images/'.$slide->slider_image) }}">
                <div class="caption lft large-title tp-resizeme slidertext1" data-x="left" data-y="150" data-speed="600" data-start="1600">{{$slide->slider_heading}}</div>
                <div class="caption lfb large-title tp-resizeme sliderpara" data-x="left" data-y="200" data-speed="600" data-start="2800">{!!$slide->slider_description!!}</div>
                <div class="caption lfb large-title tp-resizeme slidertext5" data-x="left" data-y="280" data-speed="600" data-start="3500"><a href="{{$slide->slider_link}}">{{$slide->slider_link_text}}</a></div>
            </li>
            <!--Slide end--> 
            @endforeach
            @endif
        </ul>
    </div>
</div>
<!-- Revolution slider end --> 
<!--Search Bar start-->
<div class="searchbar searchblack">
    <div class="container">
        @include('includes.search_form')
    </div>
</div>
<!-- Search End --> 
@else
<div class="searchwrap">
    <div class="container">


        @include('includes.search_form')
        <div class="searchbar ">
            <div class="row srchbox">
                <div class="col-lg-3"></div>
                <div class="col-lg-2">                   
                    <a href="{{route('login')}}" class="btn">Consumer</a>
                </div>
                <div class="col-lg-2">                 
                   <a href="login/producer" class="btn">Producer</a>
                </div>
                <div class="col-lg-2">                 
                   <a  href="{{route('login')}}" class="btn">Ad-Hoc</a>
                </div>
                <div class="col-lg-3"></div>

            </div>
        </div>



    </div>
</div>
@endif