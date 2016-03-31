<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Team;
use App\Notification;

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
               $notifications= \DB::table('notification')
               ->join('user_notification', 'notification_id', '=', 'user_notification.notification_id')
               ->select('notification.*')
               ->where('user_notification.user_id', '=', $id)->get();

               return $notifications;
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
        
        $notification->save();

        return $notification;  //importante altrimenti bacbone non riceve l'id in ritorno
    }

    public function sendInviteToUser($user_id, $from, $to, $module )
    {
        $notification = new Notification;

        $notification->title = "New invite for ".$module; 
        $notification->from=$from->name." ".$from->last_name;
        $notification->to=$to->name." ".$to->last_name;
        $notification->type="invite";
        //$notification->link=$request->link;
        //Send mail if is true
        //$notification->send_mail=$request->send_mail;
        //$notification->body=$request->body;
        $notification->icon='<i class="icon ion-person-add text-success"></i>';
        
        $notification->save();

        $notification->users()->attach($user_id);
    }

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
        $notification= Notification::find($id)->delete();
    }
}
