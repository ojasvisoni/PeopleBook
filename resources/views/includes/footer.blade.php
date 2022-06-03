<!--Footer-->
<!--<div class="largebanner shadow3">
<div class="adin">
{!! $siteSetting->above_footer_ad !!}
</div>
<div class="clearfix"></div>
</div>-->






<div class="footerWrap"> 
    <div class="container-fluid">
        <div class="row"> 
            
            <!--About Us-->
            <div class="col-md-4 col-sm-12">
                <h5>People Book</h5>
                <p class="common_para">People Book is initiative to connect aspirants with mentors to enable greater competence in a wide range of support sectors to achieve educational, professional and personal goals.</p>
                <div class="address commom-text"><span>Address : </span>{{ $siteSetting->site_street_address }}</div>
                <div class="email commom-text"><span>Email : </span> <a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a> </div>
                <div class="phone commom-text"><span>Phone No. : </span>  <a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a></div>
                <!-- Social Icons -->
                <div class="social">@include('includes.footer_social')</div>
                <!-- Social Icons end --> 

            </div>
            <!--About us End--> 
            
            <div class="col-md-8">
                <div class="row">
                <!--Quick Links-->
                <div class="col-md-4 col-sm-6">
                    <h5>{{__('Quick Links')}}</h5>
                    <!--Quick Links menu Start-->
                    <ul class="quicklinks">
                        <li><a href="{{ route('index') }}">{{__('Home')}}</a></li>
                        <li><a href="">How it works</a></li>
                        <li><a href="">Mentoring Opportunities</a></li>
                        <li><a href="">Mentors</a></li>
                        <li class="postad"><a href="{{ route('post.job') }}">Join as Mentor</a></li>
                        
                    </ul>
                </div>

                <!--Quick Links-->
                <div class="col-md-4 col-sm-6">
                    <h5>Explore More</h5>
                    <!--Quick Links menu Start-->
                    <ul class="quicklinks">
                        <li><a href="">{{__('FAQs')}}</a></li>
                        <li><a href="">About us</a></li>
                        <li><a href="">{{__('Contact Us')}}</a></li>
                        <li><a href="">Term of use</a></li>
                        <li><a href="">Privacy Policy</a></li>
    <!--                    @foreach($show_in_footer_menu as $footer_menu)
                        @php
                        $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                        @endphp

                        <li class="{{ Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $footer_menu->page_slug) }}">{{ $cmsContent->page_title }}</a></li>
                        @endforeach-->
                    </ul>
                </div>

                <!--Jobs By Industry-->
                <div class="col-md-4 col-sm-6">
                    <h5>Support Sectors</h5>
                    <!--Industry menu Start-->
                    <ul class="quicklinks">
                        @php
                        $industries = App\Industry::getUsingIndustries(8);
                        @endphp
                        @foreach($industries as $industry)
                        <!--<li><a href="{{ route('job.list', ['industry_id[]'=>$industry->industry_id]) }}">{{$industry->industry}}</a></li>-->
                        <li><a href="{{ route('job.list', ['industry_id[]'=>$industry->industry_id]) }}">{{$industry->industry}}</a></li>
                        @endforeach
                    </ul>
                    <!--Industry menu End-->
                    <div class="clear"></div>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!--Footer end--> 
<!--Copyright-->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bttxt" style="text-align: center">{{__('Copyright')}} &copy; {{date('Y')}} {{ $siteSetting->site_name }}. {{__('All Rights Reserved')}}. {{__('Design by')}}: <a href="https://oquentglobal.com/" target="_blank">Oquent Global Corporation</a></div>
            </div>
<!--            <div class="col-md-4">
                <div class="paylogos"><img src="{{asset('/')}}images/payment-icons.png" alt="" /></div>	
            </div>-->
        </div>

    </div>
</div>
