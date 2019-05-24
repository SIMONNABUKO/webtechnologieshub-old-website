@extends('layouts.app')
@section('content')
    

 <div class="row">
     <div class="col-lg-8 col-lg-offset-2">
            <h1>Update tutorial.</h1>
         
         {!!Form::open(['action'=> ['TutorialsController@update', $tutorial->id] , 'method'=>'PUT', 'files' => true,  'enctype'=>'multipart/form-data'])!!}
         
           {{Form::label('tutorial_name', 'Tutorial Name:')}}
           {{Form::text('tutorial_name', $tutorial->tutorial_name, array('class'=>'form-control'))}}

           {{Form::label('tutorial_size', 'Tutorial Size')}}
           {{Form::number('tutorial_size', $tutorial->tutorial_size, array('class'=>'form-control'))}}

           {{Form::label('tutorial_type', 'Tutorial Type')}}
           {{Form::text('tutorial_type', $tutorial->tutorial_type, array('class'=>'form-control'))}}

           {{Form::label('tutorial_path', 'Tutorial Path')}}
           {{Form::text('tutorial_path', $tutorial->tutorial_path, array('class'=>'form-control'))}}

           {{Form::label('tutorial_dirname', 'Tutorial Folder Name')}}
           {{Form::text('tutorial_dirname', $tutorial->tutorial_dirname, array('class'=>'form-control'))}}

           {{Form::label('tutorial_filename', 'Tutorial File Name')}}
           {{Form::text('tutorial_filename', $tutorial->tutorial_filename, array('class'=>'form-control'))}}
           
           {{Form::label('tutorial_mimetype', 'Tutorial Mimetype')}}
           {{Form::text('tutorial_mimetype', $tutorial->tutorial_mimetype, array('class'=>'form-control'))}}

           {{Form::label('tutorial_extension', 'Tutorial Extension')}}
           {{Form::text('tutorial_extension', $tutorial->tutorial_extension, array('class'=>'form-control'))}}
<br>
           {{Form::label('tutorial_image', 'Tutorial Image')}}
           {{Form::file('tutorial_image', null, array('class'=>'form-control'))}}
<br>
           {{Form::label('tutorial_description', 'Tutorial Description')}}
           {{Form::textarea('tutorial_description', $tutorial->tutorial_description, array('class'=>'form-control'))}}
<br>
           {{Form::submit('Update Tutorial', array('class'=>'btn btn-sm btn-success btn-block'))}}
           
         {!!Form::close()!!}
         <br><br>
     </div>
 </div>

@stop()