<div class="profileban">
    <div class="abtuser">
        <div class="row">
            <div class="col-lg-2 col-md-2">
                <div class="uavatar"><img src="https://peoplebook.starpankaj.com/admin_assets/no-image.png" alt="{{Auth::guard('company')->user()->name}}" title="{{Auth::guard('company')->user()->name}}"></div>
            </div>
            <div class="col-lg-10 col-md-10">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>{{Auth::guard('company')->user()->name}}</h4>  

                        <h6><span>Location</span>{{Auth::guard('company')->user()->location}}</h6>
                    </div>
                    <div class="col-lg-5"><div class="editbtbn"><a href="{{url('producer-profile')}}"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit Profile</a>
                        </div></div>
                </div>
                <ul class="userdata">
                    <li class="user-data-phone"><span>Phone No. : </span> {{Auth::guard('company')->user()->phone}}</li>							
                    <li class="user-data-phone"><span>Email Id :</span> {{Auth::guard('company')->user()->email}}</li>
                </ul>
            </div>
        </div>
    </div>  
</div>
<ul class="row profilestat">
    <li class="col-md-3 col-6">
        <div class="inbox" style="background: #25d9ba;">
            <h6><a href="{{route('posted.jobs')}}">0</a></h6>
            <strong>Profile Views</strong> 
        </div>
    </li>
    <li class="col-md-3 col-6">
        <div class="inbox" style="background: #f462aa;">
            <h6><a href="{{route('company.followers')}}">{{Auth::guard('company')->user()->countFollowers()}}</a></h6>
            <strong>Followings</strong> 
        </div>
    </li>
    <li class="col-md-3 col-6">
        <div class="inbox" style="background: #efc447;">
            <h6><a href="{{route('posted.jobs')}}">{{Auth::guard('company')->user()->countOpenJobs()}}</a></h6>
            <strong>Available Mentoring</strong> 
        </div>
    </li>
    <li class="col-md-3 col-6">
        <div class="inbox" style="background: #807ce6;">
            <h6><a href="{{route('company.messages')}}">{{Auth::guard('company')->user()->countCompanyMessages()}}</a></h6>
            <strong>{{__('Messages')}}</strong> 
        </div>
    </li> 
</ul>