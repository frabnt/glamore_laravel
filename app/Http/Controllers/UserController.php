<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;
use App\User;
use App\UserTeamRole;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function showProfile($id){
        

        $user=User::find($id);
        return view('user.user_profile', compact('user'));

        
    }

    public function addUserToTeam($user_id, $team_id)
    {
        $user_team_role_id= \DB::table('user_team_role')
        //->select('user_team_role.id')
        ->where('user_team_role.user_id', '=', $user_id)
        ->where('user_team_role.team_id', '=', $team_id)->pluck('id');

        //$UserTeamRole = UserTeamRole::find($user_team_role_id);
        //If relation exist return false, else add user to team
        if(count($user_team_role_id)==0){
                //insert user to team
                $user_team_role= new UserTeamRole;
                $user_team_role->user_id=$user_id;
                $user_team_role->team_id=$team_id;
                $user_team_role->save();
        }else{
            return "Relation already exist";
        }
    }


    public function removeUserFromTeam($user_id, $team_id)
    {
        $user_team_role_id= \DB::table('user_team_role')
        ->where('user_team_role.user_id', '=', $user_id)
        ->where('user_team_role.team_id', '=', $team_id)->pluck('id');
        if(count($user_team_role_id)==0){

        }else{
            $UserTeamRole = UserTeamRole::find($user_team_role_id[0])->delete();
        }
    }


    public function getUsersInTeam($team_id)
    {
        $users_in_team= \DB::table('users')
        ->join('user_team_role', 'users.id', '=', 'user_team_role.user_id')
        ->join('teams', 'teams.id', '=', 'user_team_role.team_id')
        ->select('users.id', 'users.last_name', 'users.profile_image', 'users.name')
        ->where('teams.id', '=', $team_id)->get();
        return $users_in_team;
    }

    public function getUsersNotInTeam($team_id)
    {
        $user_in_team = $this->getUsersInTeam($team_id);

        $user_id_array=array();
            foreach ($user_in_team as $key => $value) {
                    
               $user_id_array[]=$value->id;
            }

        $user_to_add=User::select('name', 'last_name', 'profile_image', 'id')->whereNotIn('id', $user_id_array)->get();

        return  $user_to_add; //$user_to_add;
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
                Storage::disk('userimgupload')->put($fileName, $decode_prifile_image);
            
                //$file = \Config::get('upload.upload').$fileName;
                //file_put_contents($file, $decode_prifile_image);
                $user->profile_image=$fileName;
            }
    
            if($request->background_image != $user->background_image){
                $decode_prifile_image = base64_decode($request->upload);
                $fileName=time().$request->background_image;
                Storage::disk('userimgupload')->put($fileName, $decode_prifile_image);
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
