@extends('layouts.app')
@section('content')
<div class="well">
	<a style="background-color: navy; color: white;" class="btn " href="/tutorials">Go back</a>

	<h1>{{$content['name']}}</h1> <hr>
	<p>{!!$content['mimetype']!!}</p><br>
	<p>Size <small>{{$content['size']}}</small></p>
	<p>Posted on: <small>{{$content['timestamp']}}</small></p><br>
	{{-- @if(!Auth::guest())

	   @if(Auth::user()->id == $book->user_id)
	<a style="background-color: #a01b1b; color: white;" class="btn " href="/books/{{$book->id}}/edit">Edit</a><br><br>

	{!!Form::open(['action'=>['BooksController@destroy', $book->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete',  ['class'=>'btn btn-danger'])}}

	{!!Form::close()!!}
	@endif

	@endif --}}
</div>
    

@stop()