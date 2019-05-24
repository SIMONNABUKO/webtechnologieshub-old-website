@extends('layouts.app')
@section('content')
    <h1>Add a book.</h1>

 {!! Form::open(['action'=> 'BooksController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
    	
    	{{FORM::label('book_title', 'Title')}}
    	{{Form::text('book_title', '', ['class'=>'form-control', 'placeholder' => 'Book title'])}}
    </div>

    <div class="form-group">
    	
    	{{FORM::label('slug', 'Slug:')}}
    	{{Form::text('slug','', ['class'=>'form-control', 'placeholder' => 'Tutorial Slug'])}}
    </div>

    <div class="form-group">
    	
            {{FORM::label('link', 'Tutorial link:')}}
            {{Form::text('link','', ['class'=>'form-control', 'placeholder' => 'Tutorial link'])}}
        </div>
 
    <div class="form-group">
    	
    	{{FORM::label('book_descr', "Book's Description")}}
    	{{Form::textarea('book_descr','', ['class'=>'form-control', 'placeholder' => 'Enter a short description about the book', 'id'=>'article-ckeditor'])}}
    </div>
<div class="form-group">
        
        {{FORM::file('book_image')}}
        </div>
    <div class="form-group">
    	
    	
    	{{Form::submit('Add book', ['class'=> 'btn btn-success'])}}
    </div>

{!! Form::close() !!}

@stop()