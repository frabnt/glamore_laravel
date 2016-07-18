<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\File;
use Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return File::all();
    }

    public function getFilesByProjectId($id)
    {
        return File::where('project_id', '=', $id )->take(10)->orderBy('created_at', 'desc')->get(); 
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
       $file = new File;
       $file->name=$request->name;
       $file->description=$request->description;
       $file->path=$request->path;
       $file->user_id  =$request->user_id;
       $file->project_id =$request->project_id;
       //upload file
       $decode_file = base64_decode($request->upload);
       $fileName=time()."_".$request->user_id."_".$request->project_id."_".$request->name;
       Storage::disk('projectfileupload')->put($fileName, $decode_file);
       $file->path=$fileName;

       $file->save();
       
       return $file;  //importante altrimenti bacbone non riceve l'id in ritorno
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return File::find($id);
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
        $file = File::find($id);
        $file->name=$request->name;
        $file->description=$request->description;
        $file->path=$request->path;
        $file->user_id  =$request->user_id;
        $file->project_id =$request->project_id;
        $file->deleted=$request->deleted;
        
        $file->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo= File::find($id)->delete();
    }
}
