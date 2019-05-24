@extends('layouts.app')
@section('content')
    <h1>Add a book.</h1>

 {!! Form::open(['action'=> ['BooksController@update', $book->id] , 'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
    
    <div class="form-group">
    	
    	{{FORM::label('book_title', 'Title')}}
    	{{Form::text('book_title', $book->book_title , ['class'=>'form-control', 'placeholder' => 'Book title'])}}
    </div>

    <div class="form-group">
    	
    	{{FORM::label('slug', 'Slug')}}
    	{{Form::text('slug',$book->slug, ['class'=>'form-control', 'placeholder' => 'Tutorial Slug'])}}
    </div>

    <div class="form-group">
    	
            {{FORM::label('link', 'Tutorial link:')}}
            {{Form::text('link',$book->link, ['class'=>'form-control', 'placeholder' => 'Tutorial link'])}}
        </div>
    
    <div class="form-group">
    	
    	{{FORM::label('book_descr', "Book's Description")}}
    	{{Form::textarea('book_descr',$book->book_descr, ['class'=>'form-control', 'placeholder' => 'Enter a short description about the book', 'id'=>'article-ckeditor'])}}
    </div>

    <div class="form-group">
    	
            
            {{Form::file('book_image')}}
        </div>

    {{FORM::hidden('_method', 'PUT')}}
    <div class="form-group">
    	
    	
    	{{Form::submit('update book', ['class'=> 'btn btn-success'])}}
    </div>

{!! Form::close() !!}

@stop()