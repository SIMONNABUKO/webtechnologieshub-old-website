<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Group;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;
class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = \App\Group::all();
        return view('groups.index')->withGroups($groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return groups.create
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating
        $this->validate($request, array('group_name'=>'required', 
        'group_link'=>'required', 'group_country'=>'required', 
        'group_description'=>'required'));
        $group = new \App\Group;
        $group->group_name = $request->input('group_name');
        $group->group_link = $request->input('group_link');
        $group->group_country = $request->input('group_country');
        $group->group_user_id = $request->input('group_user_id');
        $group->group_description = $request->input('group_description');
        $group->group_provider = $request->input('group_provider');
        $group->save();
        
           return redirect('/groups/index')->with('success', 'Your group has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
