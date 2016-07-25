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
use Storage;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

public function show_my_project($id){
    //$user = User::find($id);   
    return view('projects.my-project');//, compact('user'));
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
             $addusrtoteam = (new UserController)->addUserToTeam($project->user_id, $team_id);
             //$team->users()->attach($project->user_id);

             
        }

        
       //  //Users in team
       //  $users_in_team= \DB::table('users')
       //  ->join('user_team_role', 'users.id', '=', 'user_team_role.user_id')
       //  ->join('teams', 'teams.id', '=', 'user_team_role.team_id')
       //  ->select('users.id', 'users.last_name', 'users.profile_image', 'users.name')
       //  ->where('teams.id', '=', $project->team_id)->get();

       // // array of all users id in team
       //  $user_id_array=array();
       //      foreach ($users_in_team as $key => $value) {
                    
       //         $user_id_array[]=$value->id;
               

       //      }
       //  //users to add in team
       // $user_to_add=User::select('name', 'last_name', 'profile_image', 'id')->whereNotIn('id', $user_id_array)->get();
       //  //users to remove from team
       // $user_to_del=User::select('name', 'last_name', 'profile_image', 'id')->whereIn('id', $user_id_array)->get();

       



        return View('projects.project-detail', ['project'=>$project]); 
    }

    // public function addUserToTeam(Request $request, $id){


    //     //get all users id to add 
    //     $array_id_user=$request->input('*');
    //     //delete token from json
    //     unset($array_id_user[0]) ;
    //     $action="";
    //     $arr=array();
    //     foreach ($array_id_user as $key => $value) {
    //         if($key==1){
    //             $action=$value;
    //         }else{
    //         $arr[]=$value;
    //         }
    //     }
    //     //Get project
    //     $project= Project::find($id);
      
    //     //remove relation between team and user
    //     if($action=="rm"){
    //         $team= Team::find($project->team_id);
            
    //         foreach ($arr as $value ) {
    //         //$team->users()->detach($value);

    //         }
    //     }else{
    //         //add ralation between team and user
    //         $team= Team::find($project->team_id);
            
    //         foreach ($arr as $value ) {

    //         $projectLeader=User::find( $project->user_id);
    //         $temp_user=User::find($value);
    //         $link=Config::get('app.url').'/project-detail/'.$project->id;
           
    //         $getTests = (new NotificationController)->sendInviteToUser($temp_user->id, $projectLeader, $temp_user, "Project", $link, $project->title);
    //         //$team->users()->attach($value);
    //         }

    //     }
    //     //richiamo il metodo per visualizzare il dettaglio progetto
    //    return $this->project_detail($id);

    // }

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
        //Create new tem for project 
        $team= new Team;
        $team->name=$request->title;
        //$team->project_id=$id;
        $team->save();
        

        //create new project
        $project = new Project;

        $project->title = $request->title; 
        $project->description=$request->description;
        $project->date_start=$request->date_start;
        $project->date_end=$request->date_end;
        $project->duration_day=$request->duration_day;
        $project->progress=$request->progress;
        $project->priority=$request->priority;
        // $project->class_priority=$request->class_priority;
        $project->client=$request->client;
        $project->status=$request->status;
        // $project->class_status=$request->class_status;
        // //$project->team_id=$request->team_id;
        $project->user_id=$request->user_id;
        $project->team_id=$team->id;
        $project->save();

        $team->project_id=$project->id;
        $team->save();

        $addusrtoteam = (new UserController)->addUserToTeam($project->user_id, $team->id);



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

    public function prjByUserIdWithUserInfo($id){

            $projects= \DB::table('projects')
                          ->join('users', 'users.id', '=', 'projects.user_id')
                          ->select('projects.*', 'users.id as user_id' , 'users.profile_image as user_profile_image', 'users.name as user_name', 'users.last_name as user_last_name')
                          ->where('projects.user_id', '=', $id)
                          ->where('projects.deleted', '=', 0)
                          ->get();

            return $projects;
    }

    public function prjWithUserInfo(){

            $projects= \DB::table('projects')
                          ->join('users', 'users.id', '=', 'projects.user_id')
                          ->select('projects.*', 'users.id as user_id' , 'users.profile_image as user_profile_image', 'users.name as user_name', 'users.last_name as user_last_name')
                          ->where('projects.deleted', '=', 0)
                          ->get();

            return $projects;
    }

        public function joinedProjectWithUserInfo($current_user_id){





        $projects = \DB::select( \DB::raw("select projects.*, users.id as user_id , users.profile_image as user_profile_image, users.name as user_name, users.last_name as user_last_name
from users
join user_team_role on  user_team_role.user_id = users.id
join projects on user_team_role.team_id = projects.team_id
join teams on teams.id = user_team_role.team_id
where projects.user_id !=".$current_user_id." and users.id !=".$current_user_id." and teams.id in (
SELECT team_id FROM user_team_role where user_id =".$current_user_id." 
)") );
            return $projects;
            
    }
	
	public function allProjects() {
		return view('projects.all-projects');
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

        //Save image uploaded
        if($request->upload!=''){
        


            if($request->profile_image != $project->profile_image){
                $decode_prifile_image = base64_decode($request->upload);
                $fileName=time()."_".$request->user_id."_".$id."_".$request->profile_image;
                Storage::disk('projectimgupload')->put($fileName, $decode_prifile_image);
                //$file = \Config::get('upload.upload').$fileName;
                //file_put_contents($file, $decode_prifile_image);
                $project->profile_image=$fileName;
            }
        
            if($request->background_image != $project->background_image){
                $decode_prifile_image = base64_decode($request->upload);
                $fileName=time()."_".$request->user_id."_".$id."_".$request->background_image;
                Storage::disk('projectimgupload')->put($fileName, $decode_prifile_image);
                $project->background_image=$fileName;
            }

        }

        
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
