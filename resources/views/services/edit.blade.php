@extends('layouts.app')
@section('content')
<br>
<h1 style="background-color:#51d8af; border-color:51d8af; color:white" 
class="btn btn-default">Update Service</h1>

<div class="row">
    <div class="col-lg-10 col-lg-offset-2">
{!! Form::open(['action'=>['ServicesController@update',$service->id],'method'=>'PUT', 'enctype'=>'multipart/form-data'])!!}
{{Form::label('service_title', 'Service Title:')}}
{{Form::text('service_title', $service->service_title, array('class'=>'form-control'))}}

{{Form::label('service_description', 'Service Description:')}}
{{Form::textarea('service_description', $service->service_description, array('class'=>'form-control', 'style'=>'margin-bottom:20px;'))}}

{{Form::file('service_image')}}
<br>
{{Form::submit('update service', array('class'=>'btn btn-sm btn-success'))}}
{!!Form::close()!!}
<br>
    </div>
</div>
            
@stop