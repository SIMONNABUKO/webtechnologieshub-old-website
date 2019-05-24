@extends('layouts.app')
@section('content') <br><br>
<div class="row">
    <div class="col-lg-12">
 
 
            {!! Form::open(array('action' => 'TutorialsController@search', 'class'=>'form navbar-form navbar-right searchform', 'method'=>'GET')) !!}
            {!! Form::text('search', null,
                                   array('required',
                                        'class'=>'form-control',
                                        'placeholder'=>'Search for a tutorial...')) !!}
             {!! Form::submit('Search',
                                        array('class'=>'btn btn-default btn-block')) !!}
         {!! Form::close() !!}

 

  

    </div>
</div>
    <h1>e-Books</h1>
    @if(count($books)>0)
<div class="row">
	


       @foreach($books as $book)
       <div style="background:url('storage/book_images/{{$book->book_image}}') no-repeat; background-size:100%; margin-bottom:40px;" class="col-md-12 col-xs-12 col-sm-12 col-lg-3 col-xl-3">
       {{-- <img class="img img-responsive " src=""> --}}

       </div>
       <div style="margin-bottom:40px; margin-left:20px" class="col-md-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6">
       <p class="h2"><a style = "color: #51d8af;"  href="tutorials/{{$book->id}}"> {{$book->tutorial_name}}</a></p> 
       {{-- <p> {!!substr($book->book_descr, 0, 200)!!} </p> --}}
       <p> {!!$book->created_at!!} </p>
       <a class="btn btn-sm btn-dark" href="tutorials/{{$book->id}}">Read more...</a>
       </div>
       <hr style="margin:2px solid navy;">
           @endforeach
           <div class="col-md-12 col-xs-12 col-sm-12 col-lg-3 col-xl-3">
            <p class="h6" style = "color: #330080;"> Book Categories</p> 
            
           
            </div>       
</div>

    @else
    <h2>No books found in the database</h2>
    @endif

@stop()