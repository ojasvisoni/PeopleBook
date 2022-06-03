@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Opportunity Detail')]) 
<!-- Inner Page Title end -->
@include('flash::message')
@include('includes.inner_top_search')
@php
$company = $job->getCompany();
@endphp
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
        <!-- Job Detail start -->
        <div class="row">
            <div class="col-lg-7">
                <!-- Job Header start -->
                <div class="job-header">
                    <div class="jobinfo">
                        <h2>{{$job->title}} - {{$company->name}}</h2>
                        <div class="ptext">{{__('Date Posted')}}: <span>{{$job->created_at->format('M d, Y')}}</span></div>
                        @if(!Auth::user() && !Auth::guard('company')->user())
                        <a href="{{route('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> {{__('Login to View Salary')}} </a>
                        @else
                        @if(!(bool)$job->hide_salary)
                        <div class="salary">{{$job->getSalaryPeriod('salary_period')}}: <span>{{$job->salary_from.' '.$job->salary_currency}} - {{$job->salary_to.' '.$job->salary_currency}}</span></div>
                        @endif
                        @endif
                    </div>
                    <!-- Job Detail start -->
                    <div class="jobmainreq">
                        <div class="jobdetail">
                            <h3> {{__('Opportunity Detail')}}</h3>
                            <table class="jbdetail" style="width: 100%;">
                                <tr>
                                    <td>{{__('Location')}}:</td>
                                    <td>
                                        @if((bool)$job->is_freelance)
                                        <span>Freelance</span>
                                        @else
                                        <span>{{$job->getLocation()}}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mentor:</td>
                                    <td><a href="{{route('company.detail', $company->id)}}">{{$company->name}}</a></td
                                </tr>
                                <tr>
                                    <td>{{__('Type')}}:</td>
                                    <td><span class="permanent">{{$job->getJobType('job_type')}}</span></td>
                                </tr>
                                <tr>
                                    <td>{{__('Shift')}}:</td>
                                    <td><span class="freelance">{{$job->getJobShift('job_shift')}}</span></td>
                                </tr>
                                <tr>
                                    <td>{{__('Career Level')}}:</td>
                                    <td><span>{{$job->getCareerLevel('career_level')}}</span></td>
                                </tr>
<!--                                <tr>
                                    <td>{{__('Positions')}}:</td>
                                    <td><span>{{$job->num_of_positions}}</span></td>
                                </tr>-->
                                <tr>
                                    <td>{{__('Experience')}}:</td>
                                    <td><span>{{$job->getJobExperience('job_experience')}}</span></td>
                                </tr>
                                <tr>
                                    <td>{{__('Gender')}}:</td>
                                    <td><span>{{$job->getGender('gender')}}</span></td>
                                </tr>
                                <tr>
                                    <td>{{__('Degree')}}:</td>
                                    <td><span>{{$job->getDegreeLevel('degree_level')}}</span></td>
                                </tr>
<!--                                <tr>
                                    <td>{{__('Apply Before')}}:</td>
                                    <td><span>{{$job->expiry_date->format('M d, Y')}}</span></td>
                                </tr>-->
                            </table>
                        </div>
                    </div>
                    <div class="jobButtons">
                        <a href="{{route('email.to.friend', $job->slug)}}" class="btn"><i class="fa fa-envelope" aria-hidden="true"></i> {{__('Email to Friend')}}</a>
                        @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug)) <a href="{{route('remove.from.favourite', $job->slug)}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Favourite Job')}} </a> @else <a href="{{route('add.to.favourite', $job->slug)}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Add to Favourite')}}</a> @endif
                        <a href="{{route('report.abuse', $job->slug)}}" class="btn report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{__('Report Abuse')}}</a>
                    </div>
                </div>
                <!-- Job Description start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3>{{__('Opportunity Description')}}</h3>
                        <p>{!! $job->description !!}</p>
                    </div>
                </div>
                <!--				<div class="job-header benefits">
                    <div class="contentbox">
                        <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{__('Benefits')}}</h3>
                        <p>{!! $job->benefits !!}</p>                       
                    </div>
                    </div>-->
                <div class="job-header">
                    <div class="contentbox">
                        <h3>{{__('Skills Required')}}</h3>
                        <ul class="skillslist">
                            {!!$job->getJobSkillsList()!!}
                        </ul>
                    </div>
                </div>
                <!-- Job Description end --> 
            </div>
            <!-- related jobs end -->
            
            <div class="col-lg-5">
                <div class="jobButtons applybox">
                    @if($job->isJobExpired())
                    <span class="jbexpire"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Opportunity is expired')}}</span>
                    @elseif(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                    <a href="javascript:;" class="btn apply applied"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Already Applied')}}</a>
                    @else
                    <a href="{{route('apply.job', $job->slug)}}" class="btn apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Apply Now')}}</a>
                    @endif
                </div>
                <div class="companyinfo">
                    <h3>{{__('Producer Overview')}}</h3>
                    <div class="companylogo"><a href="{{route('company.detail',$company->slug)}}">{{$company->printCompanyImage()}}</a></div>
                    <div class="title"><a href="{{route('company.detail',$company->slug)}}">{{$company->name}}</a></div>
                    <div class="ptext">{{$company->getLocation()}}</div>
                    <div class="opening">
                        <a href="{{route('company.detail',$company->slug)}}">
                        {{App\Company::countNumJobs('company_id', $company->id)}} {{__('Current Mentoring Opportunities Openings')}}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="companyoverview">
                        <p>{{\Illuminate\Support\Str::limit(strip_tags($company->description), 250, '...')}} <a href="{{route('company.detail',$company->slug)}}">Read More</a></p>
                    </div>
                </div>
                <!-- related jobs start -->
                <div class="relatedJobs">
                    <h3>{{__('Related Opportunity')}}</h3>
                    <ul class="searchList">
                        @if(isset($relatedJobs) && count($relatedJobs))
                        @foreach($relatedJobs as $relatedJob)
                        <?php $relatedJobCompany = $relatedJob->getCompany(); ?>
                        @if(null !== $relatedJobCompany)
                        <!--Job start-->
                        <li>
                            <div class="jobinfo">
                                <h3><a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">{{$relatedJob->title}}</a></h3>
                                <div class="companyName"><a href="{{route('company.detail', $relatedJobCompany->slug)}}" title="{{$relatedJobCompany->name}}">{{$relatedJobCompany->name}}</a></div>
                                <div class="location"><span>{{$relatedJob->getCity('city')}}</span></div>
                                <div class="location">
                                    <label class="fulltime">{{$relatedJob->getJobType('job_type')}}</label>
                                    <label class="partTime">{{$relatedJob->getJobShift('job_shift')}}</label> 
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </li>
                        <!--Job end--> 
                        @endif
                        @endforeach
                        @endif
                        <!-- Job end -->
                    </ul>
                </div>
                <!-- Google Map start -->
                <!--                <div class="job-header">
                    <div class="jobdetail">
                        <h3><i class="fa fa-map-marker" aria-hidden="true"></i> {{__('Google Map')}}</h3>
                        <div class="gmap">
                            {!!$company->map!!}
                        </div>
                    </div>
                    </div>-->
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .view_more{display:none !important;}
</style>
@endpush
@push('scripts') 
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);
    
        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).css('height', 100);
                $(this).css('overflow', 'hidden');
                //alert($( this ).next());
                $(this).next().removeClass('view_more');
            }
        });
    
    
    
    });
</script> 
@endpush