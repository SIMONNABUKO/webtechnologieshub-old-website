@extends('layouts.app')
            @section('content') <br><br><br>
            <h1 style="background-color:#51dfa0; border-color:#51dfa0; color:white" 
            class="btn btn-default"><a href="/groups/index">View Groups</a></h1>
            
<div class="row">
    <div class="col-lg-10">
        <div class="container">
           

{!! Form::open(array('action'=>'GroupsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data'))!!}
{{Form::label('group_name', 'Your Group\'s Name:')}}
{{Form::text('group_name',null,array('class'=>'form-control') )}}

{{Form::label('group_country', 'Country:')}}
{{Form::text('group_country',null,array('class'=>'form-control') )}}

{{Form::label('group_link', 'Enter the group link:')}}
{{Form::text('group_link',null,array('class'=>'form-control') )}}
@if(Auth::user())
<input type="text" name="group_user_id" value="{{Auth::user()->id}}" hidden>
@endif
<label for="group_provider">Group type:</label>
<select class="form-control"  name="group_provider" id="">
        <option value="facebook">Facebook Group </option>
        <option value="telegram">Telegram Group </option>
        <option value="whatsapp">WhatsApp Group </option>
        
</select><br>

{{Form::label('group_description', 'Group descrition:')}}
{{Form::textarea('group_description',null,array('class'=>'form-control') )}}

{{Form::submit('Add group', array('class'=>'btn  btn-success btn-block'))}}<br>
{!!Form::close()!!}
        </div><br><br><br>
        
        
    </div>
    <div class="col-lg-2">
        <p>Another column</p>
    </div>
</div>
            
           @stop