<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class educationController extends Controller
{



    // relazione uno a molti
    public function user(){
        return $this->belongsTo('App\User');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Education::all();
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
        $education = new Education;

        $education->school = $request->school; 
        $education->dates_attended = $request->dates_attended; 
        $education->degree = $request->degree; 
        $education->field_of_Study = $request->field_of_Study; 
        $education->grade = $request->grade; 
        $education->activities_and_societies = $request->activities_and_societies; 
        $education->description = $request->description; 

        $education->save();

        

        return $education;  //importante altrimenti bacbone non riceve l'id in ritorno
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Education::find($id);
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
        
        $user = Education::find($id);

        $education->school = $request->school; 
        $education->dates_attended = $request->dates_attended; 
        $education->degree = $request->degree; 
        $education->field_of_Study = $request->field_of_Study; 
        $education->grade = $request->grade; 
        $education->activities_and_societies = $request->activities_and_societies; 
        $education->description = $request->description; 
        
        $education->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education= Education::find($id)->delete();
    }
}