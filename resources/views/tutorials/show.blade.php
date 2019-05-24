@extends('layouts.app')
@section('content')
<div class="well"> <br><br>
	<a style="background-color: navy; color: white;" class="btn " href="/tutorials">Go back</a>
<br>
	<h1 style="color:#51d8af;">{{$tutorial->tutorial_name}}</h1> <hr>
	<p>Posted on: <small>{{$tutorial->created_at}}</small></p><br>
<a class="btn btn-sm btn-success" href="/download/{{$tutorial->id}}">Download</a><br><br>
@if(Auth::user())
   @if(Auth::user()->email=='simonnabuko@gmail.com')
   <a  class="btn btn-sm btn-info" href="{{route('tutorials.edit', $tutorial->id)}}">Edit Tutorial</a><br><br>
@endif
@endif   

</div>
    

@stop()