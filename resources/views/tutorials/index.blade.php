@extends('layouts.app')
@section('content') <br><br>

<div class="row">
        <div class="col-lg-12">
     
     
                {!! Form::open(array('action' => 'TutorialsController@search', 'class'=>'form navbar-form navbar-right searchform', 'method'=>'GET')) !!}
                {!! Form::text('search', null,
                                       array('required',
                                            'class'=>'form-control',
                                            'placeholder'=>'Search for e-book...')) !!}
                 {!! Form::submit('Search',
                                            array('class'=>'btn btn-default btn-block')) !!}
             {!! Form::close() !!}
    
     
    
      
    
        </div>
    </div>
    <h1 class="btn btn-dark" style="border-color:#51d8af; background-color:#51d8af; color:white;">e-Books</h1>
    @if(count($tutorials)>0)
<div class="row">
<div class="col-lg-9" style="border-right: 1px solid navy;">

    <div class="row">
        <table class="table table-stripped">
            <thead>
                <tr>
                <td>Book Name</td>
                <!--<td>Date Added</td>-->
                <!--<td>More Information</td>-->
                <td>Views</td>
                
            </tr>
            </thead>
            <tbody>
                    @foreach($tutorials as $tutorial)

                <tr>
                    <th><a style = "color: #51d8af;" href="{{route('tutorials.show', $tutorial->id)}}">{!!$tutorial->tutorial_name!!}</a></th>
                    <!--<th>{!!$tutorial->created_at!!}</th>-->
                    <!--<th><a style="border-color:navy; background-color:navy; color:white;" class="btn btn-sm btn-dark" href="{{route('tutorials.show', $tutorial->id)}}">Download</a></th>-->
                    {{-- <th><div style="background:url('storage/book_images/{{$tutorial->tutorial_image}}') no-repeat; background-size:100%; margin-bottom:40px; border-right: 1px solid #330080;" class="col-md-12 col-xs-12 col-sm-12 col-lg-4 col-xl-4">
                      
                         
                        </div></th> --}}
                <th>{{views($tutorial)->count()}}</th>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
       
        </div>
        <div class="col-lg-3">
            <p class="btn btn-dark" class="h4" style = "border-color:navy; background-color: navy;color:white;"> Book Categories</p> 
        </div>
                    
</div>
<div  class="text-center">
  <p style = "color: #51d8af;" class="text-justify">{{$tutorials->links()}}</p>
</div>

    @else
    <h2>No tutorials found in the database</h2>
    @endif

@stop()