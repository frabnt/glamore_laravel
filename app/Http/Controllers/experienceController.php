<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class experienceController extends Controller
{

    public function expByUserId($id){

            return Experience::where('user_id', '=', $id )->get();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Experience::all();
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
        $experience = new Experience;

        $experience->company_name = $request->company_name; 
        $experience->title = $request->title;
        $experience->location   = $request->location  ; 
        $experience->date_start = $request->date_start;
        $experience->date_end = $request->date_end;
        $experience->currently_work_here = $request->currently_work_here;
        $experience->description = $request->description;
        $experience->user_id=$request->user_id;
        $experience->save();

        

        return $experience;  //importante altrimenti bacbone non riceve l'id in ritorno
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Experience::find($id);
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
        
        $experience = Experience::find($id);

        $experience->company_name = $request->company_name; 
        $experience->title = $request->title;
        $experience->location   = $request->location  ;
        $experience->date_start = $request->date_start;
        $experience->date_end = $request->date_end;
        $experience->currently_work_here = $request->currently_work_here;
        $experience->description = $request->description;

        $experience->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience= Experience::find($id)->delete();
    }
}
