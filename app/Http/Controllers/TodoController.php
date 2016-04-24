<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function todoByUserId($id){

            return Todo::where('user_id', '=', $id )->get();
    }

    public function todoByProjectId($id){

            return Todo::where('project_id', '=', $id )->get();
    }

    public function todoByProjectIdAndByUserId($user_id, $project_id){

            return Todo::where('project_id', '=', $project_id )
            ->where('user_id', '=', $user_id)->get();
            //select * from todos where user_id =1 and project_id=1;
    }



    public function index()
    {
        return Todo::all();
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
        $todo = new Todo;

        $todo->title = $request->title; 
       // $todo->done = $request->done; 
        $todo->description = $request->description; 
        $todo->project_id=$request->project_id;
        $todo->user_id=$request->user_id;


        
        $todo->save();

        return $todo;  //importante altrimenti bacbone non riceve l'id in ritorno
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Todo::find($id);
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
        $todo = Todo::find($id); 

        $todo->title = $request->title; 
        $todo->done = $request->done; 
        $todo->description = $request->description; 
        $todo->checked = $request->checked; 
        $todo->project_id=$request->project_id;
        $todo->user_id=$request->user_id;


        
        $todo->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo= Todo::find($id)->delete();
    }
}
