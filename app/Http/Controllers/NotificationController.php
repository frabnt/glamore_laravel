<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Team;
use App\Project;
use App\Notification;
use App\UserNotification;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showNotificationByUserId($id)
    {
        //Users in team
               $notifications= \DB::table('notifications')
               ->join('user_notification', 'notifications.id', '=', 'user_notification.notification_id')
               ->select('notifications.*')
               ->where('user_notification.user_id', '=', $id)
               ->orderBy('created_at', 'desc')->take(10)->get();

               return $notifications;
    }

    public function showNotificationByProjectId($id)
    {
               $notifications= \DB::table('notifications')
               ->join('user_notification', 'notifications.id', '=', 'user_notification.notification_id')
               ->join('users', 'users.id', '=', 'user_notification.user_id')
               ->select('users.id', 'users.last_name', 'users.profile_image', 'users.name', 'notifications.title as notification_title',  'notifications.accepted as notification_accepted',
        'notifications.rejected as notification_rejected', 'notifications.read as notification_read')
               ->where('user_notification.project_id', '=', $id)->get();

               return $notifications;
    }

    public function deleteNotificationsByUsrIdAndByProjectId($user_id, $project_id)
    {   

        //delete record and relation
        $relation_id =  \DB::table('user_notification')->select('id')->where('user_id', '=', $user_id)->where('project_id', '=', $project_id)->get();
               
            foreach ($relation_id as $key => $value) {
                    
               
        $relation = UserNotification::find($value->id);
        $notification= Notification::find($relation->notification_id)->delete();
        $relation = UserNotification::find($value->id)->delete(); 

        }


        
        
    }


    public function index()
    {
        return Notification::all();
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
        $notification = new Notification;

        $notification->title = $request->title; 
        $notification->from=$request->from;
        $notification->to=$request->to;
        $notification->type=$request->type;
        $notification->link=$request->link;
        $notification->accepted=$request->accepted;
        $notification->rejected=$request->rejected;
        $notification->read=$request->read;
        $notification->send_mail=$request->send_mail;
        $notification->body=$request->body;
        $notification->icon=$request->icon;
        $notification->module=$request->module;
        
        $notification->save();

        return $notification;  //importante altrimenti bacbone non riceve l'id in ritorno
    }


    public function sendInviteToUser($user_id_to, $user_id_from , $module, $project_id )
    {
        $user_from = User::find($user_id_from);
        $user_to = User::find($user_id_to); 
        $project=Project::find($project_id);
        $notification = new Notification;

        $notification->title = "New invite for ".$module." ".$project->title; 
        $notification->from=$user_from->name." ".$user_from->last_name;
        $notification->to=$user_to->name." ".$user_to->last_name;
        $notification->type="invite";
        $notification->link='/project-detail/'.$project->id;
        $notification->module=$module;

        $notification->user_id_from=$user_id_from;
        $notification->user_id_to=$user_id_to;
        $notification->team_id=$project->team_id;


      

        //Send mail if is true
        //$notification->send_mail=$request->send_mail;
        $notification->body=$project->description;
        //$notification->icon='<i class="icon ion-person-add text-success"></i>';
        
        $notification->save();


        $relation = new UserNotification;
        $relation->project_id=$project_id;
        $relation->user_id=$user_id_to;
        $relation->notification_id=$notification->id;
        $relation->save();

        return $notification;
    }



    // public function sendInviteToUser($user_id, $from, $to, $module )
    // {
    //     $notification = new Notification;

    //     $notification->title = "New invite for ".$module; 
    //     $notification->from=$from->name." ".$from->last_name;
    //     $notification->to=$to->name." ".$to->last_name;
    //     $notification->type="invite";
    //     //$notification->link=$request->link;
    //     //Send mail if is true
    //     //$notification->send_mail=$request->send_mail;
    //     //$notification->body=$request->body;
    //     $notification->icon='<i class="icon ion-person-add text-success"></i>';
        
    //     $notification->save();

    //     $notification->users()->attach($user_id);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Notification::find($id);
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
        $notification = Notification::find($id); 
        $notification->title = $request->title; 
        $notification->from=$request->from;
        $notification->to=$request->to;
        $notification->type=$request->type;
        $notification->accepted=$request->accepted;
        $notification->rejected=$request->rejected;
        $notification->read=$request->read;
        $notification->send_mail=$request->send_mail;
        $notification->body=$request->body;
        $notification->icon=$request->icon;

        $notification->save();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //delete record and relation
        $relation_id =  \DB::table('user_notification')->select('id')->where('notification_id', '=', $id)->get();
        $relation = UserNotification::find($relation_id)->delete();
        $notification= Notification::find($id)->delete();
    }
}
