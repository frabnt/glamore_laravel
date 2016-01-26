<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function showProfile($id){
        

        $user=User::find($id);
        return view('user.user_profile', compact('user'));

        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
        $user = new User;

        $user->name = $request->name; 
        $user->last_name = $request->last_name; 
        $user->birthday_date = $request->birthday_date; 
        $user->marital_status = $request->marital_status; 
        $user->about_me = $request->about_me; 
        $user->facebook_page = $request->facebook_page; 
        $user->twitter_page = $request->twitter_page; 
        $user->linkedin_page = $request->linkedin_page; 
        $user->dribbble_page = $request->dribbble_page; 
        $user->gplus_page = $request->gplus_page ; 

        $user->save();

        

        return $user;  //importante altrimenti bacbone non riceve l'id in ritorno
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
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
        
        $user = User::find($id);

        $user->name = $request->name; 
        $user->last_name = $request->last_name; 
        $user->birthday_date = $request->birthday_date; 
        $user->marital_status = $request->marital_status; 
        $user->about_me = $request->about_me; 
        $user->facebook_page = $request->facebook_page; 
        $user->twitter_page = $request->twitter_page; 
        $user->linkedin_page = $request->linkedin_page; 
        $user->dribbble_page = $request->dribbble_page; 
        $user->gplus_page = $request->gplus_page ; 

        //Save image uploaded
        if($request->upload!=''){
    

            if($request->profile_image != $user->profile_image){
                $decode_prifile_image = base64_decode($request->upload);
                $fileName=time().$request->profile_image;
                $file = \Config::get('upload.upload').$fileName;
                file_put_contents($file, $decode_prifile_image);
                $user->profile_image=$fileName;
            }
    
            if($request->background_image != $user->background_image){
                $decode_prifile_image = base64_decode($request->upload);
                $fileName=time().$request->background_image;
                $file = \Config::get('upload.upload').$fileName;
                file_put_contents($file, $decode_prifile_image);
                $user->background_image=$fileName;
            }

        }

        $user->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id)->delete();
    }
}
