@if(Auth::guard('company')->check())
<h3 class="seekertxt"><span style="color: #17d27c">Your next step. </span>{{__('Connect with mentors to achieve educational,')}} <span>{{__('professional and personal goals.')}}.</span></h3>
<form action="{{route('job.seeker.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox seekersrch">		
		<div class="input-group">
		  <input type="text"  name="search" id="empsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or Producer Details')}}" autocomplete="off" />
		  <span class="input-group-btn">
			<input type="submit" class="btn" value="{{__('Search')}}">
		  </span>
		</div>
		</div>
		
       
        
    </div>
</form>
@else
<h3><span style="color: #17d27c">Your next step. </span>{{__('Connect with mentors to achieve educational,')}} <span>{{__('professional and personal goals.')}}.</span></h3>
<form action="{{route('job.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox">
		
		<div class="row">
			<div class="col-lg-5">
				<label for=""> {{__('Keywords / Producer')}}</label>
				<input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or Producer Details')}}" autocomplete="off" />
                        </div>
                        <div class="col-lg-5">
			<label for="">{{__('Support Sector ')}}</label>
            {!! Form::select('functional_area_id[]', ['' => __('Select Support Sector ')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
        </div>
			<div class="col-lg-2">
				<label for="">&nbsp;</label>
				<input type="submit" class="btn" value="{{__('Search')}}"></div>
		</div>
				
		<div class="srcsubfld additional_fields">
			<div class="row">
<!--        <div class="col-lg-{{((bool)$siteSetting->country_specific_site)? 6:3}}">
			<label for="">{{__('Support Sector ')}}</label>
            {!! Form::select('functional_area_id[]', ['' => __('Select Support Sector ')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
        </div>-->

        @if((bool)$siteSetting->country_specific_site)
        {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}
        @else
<!--        <div class="col-lg-3">
			<label for="">{{__('Select Country')}}</label>
            {!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
        </div>-->
        @endif

<!--        <div class="col-lg-3">
			<label for="">{{__('Select State')}}</label>
            <span id="state_dd">
                {!! Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')) !!}
            </span>
        </div>
        <div class="col-lg-3">
			<label for="">{{__('Select City')}}</label>
            <span id="city_dd">
                {!! Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')) !!}
            </span>
        </div>-->
		</div>
		</div>	
			
			
			
		</div>
      
		
		
		
		
    </div>
</form>

@endif