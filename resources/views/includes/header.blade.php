<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12">
                @if(Auth::check())
                <a href="{{route('home')}}" class="logo"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" alt="{{ $siteSetting->site_name }}" /></a>              
                @endif
            
                @if(Auth::guard('company')->check()) 
                <a href="{{route('company.home')}}" class="logo"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" alt="{{ $siteSetting->site_name }}" /></a>
                @endif
                
                @if(!Auth::user() && !Auth::guard('company')->user())
                                <a href="{{route('home')}}" class="logo"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" alt="{{ $siteSetting->site_name }}" /></a>              

                @endif
                <div class="navbar-header navbar-light">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#nav-main" aria-controls="nav-main" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-9 col-md-12 col-12"> 

                <!-- Nav start -->
                <nav class="navbar navbar-expand-lg navbar-light">

                    <div class="navbar-collapse collapse" id="nav-main">
                        <ul class="navbar-nav ml-auto">
                            <!--<li class="nav-item {{ Request::url() == route('index') ? 'active' : '' }}"><a href="{{url('/')}}" class="nav-link">{{__('Home')}}</a> </li>-->
                            @if(Auth::check())
                            <li class="nav-item {{ Request::url() == route('index') ? 'active' : '' }}"><a href="{{route('home')}}" class="nav-link">{{__('Home')}}</a> </li>
                            @endif
                            @if(Auth::guard('company')->check()) 
                            <li class="nav-item {{ Request::url() == route('index') ? 'active' : '' }}"><a href="{{route('company.home')}}" class="nav-link">{{__('Home')}}</a> </li>
                            @endif
                            <!--<li class="nav-item"><a href="{{ route('job.list') }}" class="nav-link">Mentoring Opportunities</a> </li>-->
                            @if(Auth::guard('company')->check())
                            <li class="nav-item"><a href="{{ route('job.seeker.list') }}" class="nav-link">Consumers</a> </li>
                            @else
                            <li class="nav-item"><a href="{{ route('job.list') }}" class="nav-link">Producer</a> </li>
                            @endif

                            <!--<li class="nav-item {{ Request::url()}}"><a href="{{url('/companies')}}" class="nav-link">{{__('Companies')}}</a> </li>-->
                            @foreach($show_in_top_menu as $top_menu) @php $cmsContent = App\CmsContent::getContentBySlug($top_menu->page_slug); @endphp
                            <!--<li class="nav-item {{ Request::url() == route('cms', $top_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $top_menu->page_slug) }}" class="nav-link">How it works</a> </li>-->
                            <li class="nav-item {{ Request::url() == route('cms', $top_menu->page_slug) ? 'active' : '' }}"><a href="" class="nav-link">How it works</a> </li>
                            @endforeach
                            <!--<li class="nav-item {{ Request::url() == route('blogs') ? 'active' : '' }}"><a href="{{ route('blogs') }}" class="nav-link">News</a> </li>-->
                            <li class="nav-item {{ Request::url() == route('blogs') ? 'active' : '' }}"><a href="" class="nav-link">News</a> </li>
                            <!--<li class="nav-item {{ Request::url() == route('contact.us') ? 'active' : '' }}"><a href="{{ route('contact.us') }}" class="nav-link">{{__('Contact us')}}</a> </li>-->
                            @if(Auth::check())
                            <li class="nav-item dropdown userbtn"><a href="">{{Auth::user()->printUserImage()}}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{route('home')}}" class="nav-link"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li class="nav-item"><a href="{{ route('my.profile') }}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Profile')}}</a> </li>
                                    <li class="nav-item"><a href="{{ route('view.public.profile', Auth::user()->id) }}" class="nav-link"><i class="fa fa-eye" aria-hidden="true"></i> {{__('View Public Profile')}}</a> </li>
                                    <li><a href="{{ route('my.job.applications') }}" class="nav-link"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('My Mentor Applications')}}</a> </li>
                                    <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif
                            @if(Auth::guard('company')->check())
                            <!--<li class="nav-item postjob"><a href="{{route('post.job')}}" class="nav-link register">{{__('Post a job')}}</a> </li>-->
                            <li class="nav-item dropdown userbtn"><a href="">{{Auth::guard('company')->user()->printCompanyImage()}}</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="{{route('company.home')}}" class="nav-link"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li class="nav-item"><a href="{{ route('company.profile') }}" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i> {{__('Producer Profile')}}</a></li>
                                    <li class="nav-item"><a href="{{ route('post.job') }}" class="nav-link"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Opportunity')}}</a></li>
                                    <li class="nav-item"><a href="{{route('company.messages')}}" class="nav-link"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Consumer Messages')}}</a></li>
                                    <li class="nav-item"><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header1" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif @if(!Auth::user() && !Auth::guard('company')->user())
                            <li class="nav-item"><a href="{{route('register')}}" class="nav-link">{{__('Register')}}</a> </li>                            
                            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">{{__('Sign in')}}</a> </li>
                            <!--<li class="nav-item"><a href="{{route('login')}}" class="nav-link register">{{__('Consumer')}}</a> </li>-->                            
                            <!--<li class="nav-item"><a href="login/producer" class="nav-link register">{{__('Producer')}}</a> </li>-->                            
                            <!--<li class="nav-item"><a target="_blank" href="adhoc/login" class="nav-link register">{{__('Ad-Hoc')}}</a> </li>-->                            
                            @endif
<!--                            <li class="dropdown userbtn"><a href="{{url('/')}}"><img src="{{asset('/')}}images/lang.png" alt="" class="userimg" /></a>
                                <ul class="dropdown-menu">
                                    @foreach($siteLanguages as $siteLang)
                                    <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-{{$siteLang->iso_code}}').submit();" class="nav-link">{{$siteLang->native}}</a>
                                        <form id="locale-form-{{$siteLang->iso_code}}" action="{{ route('set.locale') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="locale" value="{{$siteLang->iso_code}}"/>
                                            <input type="hidden" name="return_url" value="{{url()->full()}}"/>
                                            <input type="hidden" name="is_rtl" value="{{$siteLang->is_rtl}}"/>
                                        </form>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>-->
                        </ul>

                        <!-- Nav collapes end --> 

                    </div>
                    <div class="clearfix"></div>
                </nav>

                <!-- Nav end --> 

            </div>
        </div>

        <!-- row end --> 

    </div>

    <!-- Header container end --> 

</div>






<?php
/* ?>@if(!Auth::user() && !Auth::guard('company')->user())
  <div class="">my dive 2</div>
  @endif<?php */?>