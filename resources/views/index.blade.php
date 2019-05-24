
            @extends('layouts.app')
            @section('content') <br>
            <div class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                    <div class="owl-item"><img src="{{asset('storage/slider_images/1.png')}}" alt=""></div>
                    <div class="owl-item"><img src="{{asset('storage/slider_images/2.png')}}" alt=""></div>
                    <div class="owl-item"><img src="{{asset('storage/slider_images/3.png')}}" alt=""></div>
                    <div class="owl-item"><img src="{{asset('storage/slider_images/4.png')}}" alt=""></div>
                    </div>
                </div>


            </div>
<div class="row">
    <div class="col-lg-12">
        <h3 style="color:#51d8af;" class="text-center">Who we are</h3>
        <p>Website Technologies Hub
            commonly known as WEBTECHUB
            is a website development, Graphic
            Design and Digital Marketing
            Company fully registered and globally recognized website development company.Our aim is changing the
            web development landscape by
            introducing development of
            websites with marketing incorporated. This is by
            improving the website's SEO as
            opposed to many companies who
            develop for you websites that will
            never appear in the search engine
            results, making no difference
            between having a website and
            having none.
            
            </p>
    </div>
</div>
@if(Auth::user())
   @if(Auth::user()->email=='simonnabuko@gmail.com')
<a class="btn" style="background-color:#51d8af; border-color:51d8af; color:white"  href="/services/create">Add New Service</a>
@endif
@endif           
<h2 class="">Our Services</h2>
            
<div class="row">
    <div class="col-lg-9">
        <div class="container">
                @if(count($services)>0)

                <div class="row">
                   @foreach ($services as $service)
                               
                   
                        <div style="float:left;  margin-bottom:30px; background:url('storage/service_images/{{$service->service_image}}') no-repeat;" class="col-lg-3 ">
            
                        </div>
                        <div style="float-right" class="col-lg-9">
                                <h2>{{$service->service_title}}</h2>
                                <p>{{substr($service->service_description, 0, 200)}}</p>
                                <p>No. of Views: {{views($service)->count()}}</p>
                                <a style="background-color:#51d8af; color:white; border-color:#51d8af;" class="btn btn-sm btn-info" href="/services/show/{{$service->id}}">More information</a>
                        </div>
                        @endforeach
                    </div>
                @endif


        </div>
        
        
    </div>
    <div class="col-lg-3">
        <p>Another column</p>
    </div>
</div>
            
           @stop