@extends('layouts.app')
@section('content')<br>
<div class="well">
	<a style="background-color: navy; color: white;" class="btn " href="/books">Go back</a><br>

	<h1>{{$book->book_title}}</h1> <hr>
</div>
<div class="row">
	<div style="background:url({{asset('storage/book_images/'.$book->book_image)}}) no-repeat; background-size:100%; margin-bottom:40px;" class="col-lg-4">

	</div>
	<div class="col-lg-8">
		<p>{!!$book->book_descr!!}</p><br>
		<p>Posted on: <small>{{$book->created_at}}</small></p><br>
	<a class="btn btn-success" href="{{$book->link}}">Download</a>
		@if(!Auth::guest())
	
		   @if(Auth::user()->id == $book->user_id)
		<a style="background-color: #a01b1b; color: white;" class="btn " href="/books/{{$book->id}}/edit">Edit</a><br><br>
	
		{!!Form::open(['action'=>['BooksController@destroy', $book->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
	{{Form::hidden('_method', 'DELETE')}}
	{{Form::submit('Delete',  ['class'=>'btn btn-danger'])}}
	
		{!!Form::close()!!}
		@endif
	
		@endif
			
	
		
	
	@stop()	
	</div>
</div>
	