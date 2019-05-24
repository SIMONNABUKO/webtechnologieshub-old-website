@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<a href="/books/create" class="btn" style="background-color: #330080; color: white;">Add a book</a><br><br><hr>
                    <h6>Books Posted by you</h6><br>

                    @if(count($books)> 0)
                    <table class="table table-stripped">
                        
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($books as $book)

                        <tr>
                            <td>{{$book->book_title}}</td>
                            <td  style="color: #330080;"><a href="/books/{{$book->id}}/edit">Edit</a></td>
                        <td>{!!Form::open(['action'=>['BooksController@destroy', $book->id], 'method'=>'POST', 'class'=>'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete',  ['class'=>'btn btn-default'])}}

                        {!!Form::close()!!}</td>
                        </tr>


                        @endforeach
                    </table>
                    @else
                    <p>There are no books added by you</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
