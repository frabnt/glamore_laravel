<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\UserSetting;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserSetting::all();
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
        $UserSetting = UserSetting::find($id);

        $UserSetting->user_id=$request->user_id;
        $UserSetting->timezone=$request->timezone;
        $UserSetting->currency_name=$request->currency_name;
        $UserSetting->currency_symbol=$request->currency_symbol;
        $UserSetting->user_type=$request->user_type;
        $UserSetting->date_format=$request->date_format;
        $UserSetting->time_format=$request->time_format;
        $UserSetting->1000s_separator=$request->1000s_separator;
        $UserSetting->decimal_symbol=$request->decimal_symbol;
        $UserSetting->send_notification_by_mail=$request->send_notification_by_mail;
        $UserSetting->first_access=$request->first_access;

        $UserSetting->save();

        return $UserSetting;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $UserSetting = UserSetting::find($id);

        $UserSetting->user_id=$request->user_id;
        $UserSetting->timezone=$request->timezone;
        $UserSetting->currency_name=$request->currency_name;
        $UserSetting->currency_symbol=$request->currency_symbol;
        $UserSetting->user_type=$request->user_type;
        $UserSetting->date_format=$request->date_format;
        $UserSetting->time_format=$request->time_format;
        $UserSetting->1000s_separator=$request->1000s_separator;
        $UserSetting->decimal_symbol=$request->decimal_symbol;
        $UserSetting->send_notification_by_mail=$request->send_notification_by_mail;
        $UserSetting->first_access=$request->first_access;

        $UserSetting->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $UserSetting= UserSetting::find($id)->delete();
    }
}
