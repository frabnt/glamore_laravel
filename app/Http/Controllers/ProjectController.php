<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;
use View;
use App\User;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function show_my_project($id){
    $user = User::find($id);   
    return view('projects.my-project', compact('user'));
}


    public function project_detail($id){
        $project= Project::find($id);

        return View('projects.project-detail')->with('project_id', $project->id );
    }
    public function index()
    {
        return Project::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project;

        $project->title = $request->title; 
        $project->description=$request->description;
        $project->date_start=$request->date_start;
        $project->date_end=$request->date_end;
        $project->duration_day=$request->duration_day;
        $project->progress=$request->progress;
        $project->priority=$request->priority;
        $project->class_priority=$request->class_priority;
        $project->client=$request->client;
        $project->status=$request->status;
        $project->class_status=$request->class_status;
        $project->team_id=$request->team_id;
        $project->user_id=$request->user_id;
        

        
        $project->save();



        return $project;  //importante altrimenti bacbone non riceve l'id in ritorno
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Project::find($id);
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



     public function prjByUserId($id){

            return Project::where('user_id', '=', $id )->get();
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
        $project = Project::find($id); 
        $project->title = $request->title; 
        $project->description=$request->description;
        $project->date_start=$request->date_start;
        $project->date_end=$request->date_end;
        $project->duration_day=$request->duration_day;
        $project->progress=$request->progress;
        $project->priority=$request->priority;
        $project->client=$request->client;
        $project->status=$request->status;
        $project->team_id=$request->team_id;
        $project->user_id=$request->user_id;
        $project->class_status=$request->class_status;
        $project->class_priority=$request->class_priority;

        

        
        $project->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project= Project::find($id)->delete();
    }
}
