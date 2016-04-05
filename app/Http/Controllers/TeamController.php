<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Http\Requests;
use App\UserTeamRole;

class TeamController extends Controller
{

    public function addUser($user_id, $team_id)
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


    public function removeUser($user_id, $team_id)
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::all();
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
        $team = new Team;

        $team->name = $request->name; 
        $team->project_id=$request->project_id;
        //reration to users
        $team->users()->attach($request->user_id);

        $team->save();



        return $team;  //importante altrimenti bacbone non riceve l'id in ritorno
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return Team::find($id);
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
        $team = Team::find($id); 

        $team->name = $request->name; 
        $team->project_id=$request->project_id;
        //reration to users
        $team->users()->attach($request->user_id);

        $team->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team= Team::find($id)->delete();
    }
}
