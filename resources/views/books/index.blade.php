@extends('layouts.app')
@section('content') <br><br>
<div class="row">
    <div class="col-lg-12">
 
 
            {!! Form::open(array('action' => 'BooksController@find', 'class'=>'form navbar-form navbar-right searchform', 'method'=>'GET')) !!}
            {!! Form::text('search', null,
                                   array('required',
                                        'class'=>'form-control',
                                        'placeholder'=>'Search for tutorials...')) !!}
             {!! Form::submit('Search',
                                        array('class'=>'btn btn-default btn-block')) !!}
         {!! Form::close() !!}

 

  

    </div>
</div>
    <h1>Tutorials</h1>
    @if(count($books)>0)
<div class="row">
	


       @foreach($books as $book)
       <div style="background:url('storage/book_images/{{$book->book_image}}') no-repeat; background-size:100%; margin-bottom:40px;" class="col-md-12 col-xs-12 col-sm-12 col-lg-3 col-xl-3">
       {{-- <img class="img img-responsive " src=""> --}}

       </div>
       <div style="margin-bottom:40px; margin-left:20px" class="col-md-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6">
       <p class="h2"><a style = "color: #51d8af;"  href="books/{{$book->id}}"> {{$book->book_title}}</a></p> 
       <p> {!!substr($book->book_descr, 0, 200)!!} </p>
       <p> {!!$book->created_at!!} </p>
       <p>{{views($book)->count()}} views</p>
       <a class="btn btn-sm btn-dark" href="books/{{$book->id}}">Read more...</a>
       </div>
       <hr style="margin:2px solid navy;">
           @endforeach
           <div class="col-md-12 col-xs-12 col-sm-12 col-lg-3 col-xl-3">
            <p class="h6" style = "color: #330080;"> Book Categories</p> 
           
            </div>       
</div>
{{$books->links()}}
    @else
    <h2>No books found in the database</h2>
    @endif

@stop()