@extends('layouts.app')
@section('content')
    

 <div class="row">
     <div class="col-lg-8 col-lg-offset-2">
            <h1>Add a tutorial.</h1>
         
         {!!Form::open(array('route'=>'tutorials.store', 'enctype'=>'multipart/form-data'))!!}
         
           {{Form::label('tutorial_name', 'Tutorial Name:')}}
           {{Form::text('tutorial_name', null, array('class'=>'form-control'))}}

           {{Form::label('tutorial_size', 'Tutorial Size')}}
           {{Form::number('tutorial_size', null, array('class'=>'form-control'))}}

           {{Form::label('tutorial_type', 'Tutorial Type')}}
           {{Form::text('tutorial_type', null, array('class'=>'form-control'))}}

           {{Form::label('tutorial_path', 'Tutorial Path')}}
           {{Form::text('tutorial_path', null, array('class'=>'form-control'))}}

           {{Form::label('tutorial_dirname', 'Tutorial Folder Name')}}
           {{Form::text('tutorial_dirname', null, array('class'=>'form-control'))}}

           {{Form::label('tutorial_filename', 'Tutorial File Name')}}
           {{Form::text('tutorial_filename', null, array('class'=>'form-control'))}}
           {{Form::label('tutorial_mimetype', 'Tutorial Mimetype')}}
           {{Form::text('tutorial_mimetype', null, array('class'=>'form-control'))}}

           {{Form::label('tutorial_extension', 'Tutorial Extension')}}
           {{Form::text('tutorial_extension', null, array('class'=>'form-control'))}}
<br>
           {{Form::label('tutorial_image', 'Tutorial Image')}}
           {{Form::file('tutorial_image', null, array('class'=>'form-control'))}}
<br>
           {{Form::label('tutorial_description', 'Tutorial Description')}}
           {{Form::textarea('tutorial_description', null, array('class'=>'form-control'))}}
<br>
           {{Form::submit('Add Tutorial', array('class'=>'btn btn-sm btn-success btn-block'))}}
           
         {!!Form::close()!!}
         <br><br>
     </div>
 </div>

@stop()