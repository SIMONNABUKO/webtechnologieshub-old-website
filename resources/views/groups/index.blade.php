@extends('layouts.app')
            @section('content') <br><br><br>
            <h1 style="background-color:#51dfa0; border-color:#51dfa0; color:white" 
            class="btn btn-default"><a style="color:white" href="/groups/create">Add your Group</a></h1>

<div class="jumbotron">
    <div class="container text-center">
      <h1 style="color:#51dfa0;">Join Your favourite Social Media Groups Today</h1>      
      <p style="color:#000080;">Telegram, Facebook, WhatsApp</p>
    </div>
  </div>
  
<div class="row">
        @if(count($groups)>0)
        @foreach ($groups as $group)
        
            <div class="col-sm-6">
                <div class="panel panel-primary shadow p-3 mb-5 bg-white rounded">
                    <div class="panel-heading h4">{{str_limit($group->group_name, 25) }} </div>
                    <div class="panel-body">{{str_limit($group->group_description, 55) }}
                    <span class="p"><a style="background-color:#51dfa0; color:white" class ="badge " href="#">{{$group->group_provider}}</a></span></div>
                <div style="background-color:;"  class="panel-footer btn-block btn btn-sm bg-dark "> <a style="color:white" href="{{$group->group_link}}">Join Group</a> </div>
                </div>
            </div>   
        @endforeach
    
    @endif

    </div>
  </div><br><br><br><br><br><br>
  @stop