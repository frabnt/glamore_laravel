<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests;
use View;
use App\User;
use App\Team;
use Config;
use App\UserTeamRole;
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
        
        $user=User::all();
        // new team if not present
        if($project->team_id==""||$project->team_id==null){
            $team= new Team;
            $team->name=$project->title;
            $team->project_id=$id;
           
            $team->save();
            //get id of team created
            $team= \DB::table('teams')->select('id')->where('project_id', '=', $id)->get();
            $team_id='';
            foreach ($team as $key => $value) {
                    
               $team_id=$value->id;
               break;

            }
            //relate team to project
             $project->team_id=$team_id;
             $project->save();

             $team= Team::find($team_id);
             //insert user to team
             $addusrtoteam = (new TeamController)->addUser($project->user_id, $team_id);
             //$team->users()->attach($project->user_id);

             
        }

        
        //Users in team
        $users_in_team= \DB::table('users')
        ->join('user_team_role', 'users.id', '=', 'user_team_role.user_id')
        ->join('teams', 'teams.id', '=', 'user_team_role.team_id')
        ->select('users.id', 'users.last_name', 'users.profile_image', 'users.name')
        ->where('teams.id', '=', $project->team_id)->get();

       // array of all users id in team
        $user_id_array=array();
            foreach ($users_in_team as $key => $value) {
                    
               $user_id_array[]=$value->id;
               

            }
        //users to add in team
       $user_to_add=User::select('name', 'last_name', 'profile_image', 'id')->whereNotIn('id', $user_id_array)->get();
        //users to remove from team
       $user_to_del=User::select('name', 'last_name', 'profile_image', 'id')->whereIn('id', $user_id_array)->get();

       



        return View('projects.project-detail', ['user_to_add' => $user_to_add, 'user_to_del' => $user_to_del, 'users_in_team' => $users_in_team,  'project'=>$project]); 
    }

    public function addUserToTeam(Request $request, $id){


        //get all users id to add 
        $array_id_user=$request->input('*');
        //delete token from json
        unset($array_id_user[0]) ;
        $action="";
        $arr=array();
        foreach ($array_id_user as $key => $value) {
            if($key==1){
                $action=$value;
            }else{
            $arr[]=$value;
            }
        }
        //Get project
        $project= Project::find($id);
      
        //remove relation between team and user
        if($action=="rm"){
            $team= Team::find($project->team_id);
            
            foreach ($arr as $value ) {
            //$team->users()->detach($value);

            }
        }else{
            //add ralation between team and user
            $team= Team::find($project->team_id);
            
            foreach ($arr as $value ) {

            $projectLeader=User::find( $project->user_id);
            $temp_user=User::find($value);
            $link=Config::get('app.url').'/project-detail/'.$project->id;
           
            $getTests = (new NotificationController)->sendInviteToUser($temp_user->id, $projectLeader, $temp_user, "Project", $link, $project->title);
            //$team->users()->attach($value);
            }

        }
        //richiamo il metodo per visualizzare il dettaglio progetto
       return $this->project_detail($id);

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
