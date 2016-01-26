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

        $user->company_name = $request->company_name; 
        $user->title = $request->title;
        $user->location   = $request->location  ;
        $user->date_start = $request->date_start;
        $user->date_end = $request->date_end;
        $user->currently_work_here = $request->currently_work_here;
        $user->description = $request->description;

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

        $user->company_name = $request->company_name; 
        $user->title = $request->title;
        $user->location   = $request->location  ;
        $user->date_start = $request->date_start;
        $user->date_end = $request->date_end;
        $user->currently_work_here = $request->currently_work_here;
        $user->description = $request->description;

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
