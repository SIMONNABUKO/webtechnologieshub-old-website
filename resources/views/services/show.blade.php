@extends('layouts.app')
@section('content')
<div class="well"> <br><br>
	<a style="background-color: navy; color: white;" class="btn " href="/">Go back</a>
<br>
	<h1 style="color:#51d8af;">{{$service->service_title}}</h1> <hr>
	<p>{!!$service->service_description!!}</p><br>
	<div class="row">
		<div class="col-lg-12">
			<h3 class="text-center">Our Pricing</h3>
				<div class="owl-carousel owl-theme owl-loaded">
						<div class="owl-stage-outer">
							<div class="owl-stage">
							<div class="owl-item">
								<h3 class="text-center">Basic </h3>
								<ol>
									<li>A dynamic Website</li>
									<li>User registration system</li>
									<li>Database backed</li>
									<li>Email alert system</li>
									<li>Live chat intergration</li>
									<li>Social media buttons</li>
								</ol>
								<p style="background-color:#51d8af;color:white;" class="btn btn-block">Price: $200</p>
							</div>
							<div class="owl-item">
									<h3 class="text-center">Advanced</h3>
									<ol>
										<li>All basic package features</li>
										<li>Newsletter system</li>
										<li>Blog incorporation</li>
										<li>Blog develops a community</li>
										<li>Basic Marketing Plan</li>
										<li>SEO</li>
									</ol>
									<p style="background-color:#000080;color:white;" class="btn btn-block">Price: $500</p>
							</div>
							<div class="owl-item">
									<h3 class="text-center">Premium</h3>
									<ol>
										<li>All advanced package features</li>
										<li>RSS incorporation</li>
										<li>Full Content Management system</li>
										<li>Full e-Commerce system</li>
										<li>Advanced SEO</li>
										<li>Rental CMS</li>
									</ol>
									<p style="background-color:#51d8af;color:white;" class="btn btn-block">Price: $1000</p>
							</div>
							
							</div>
						</div>
		
		
					</div>
		</div>
	</div>
	<div class ="row">
	    <div class ="container shadow p-3 mb-5 bg-white rounded">
	        <p class="h3">Need any of our services? Email us on: <em>info@webtechnologieshub.com</em></p>
	        <a class="btn btn-sm btn-primary btn-block" href="https://t.me/webtechnologieshub"><i class="fa fa-telegram"></i>Subscribe to our telegram channel to chat with us</a>
	    </div>
	</div>
{{-- <a class="btn btn-sm btn-success" href="/download/{{$tutorial->id}}">Download</a> --}}
@if(Auth::user())
   @if(Auth::user()->email=='simonnabuko@gmail.com')
   <a  class="btn btn-sm btn-info" href="/services/edit/{{$service->id}}">Edit service</a>
@endif
@endif 

</div>
    

@stop()