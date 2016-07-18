<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\AdminSetting;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return AdminSetting::all();
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

        $AdminSetting = AdminSetting::find($id);

        $AdminSetting->timezone=$request->timezone;
        $AdminSetting->currency_name=$request->currency_name;
        $AdminSetting->currency_symbol=$request->currency_symbol;
        $AdminSetting->date_format=$request->date_format;
        $AdminSetting->time_format=$request->time_format;
        $AdminSetting->thousand_separator=$request->thousand_separator;
        $AdminSetting->decimal_symbol=$request->decimal_symbol;

        $AdminSetting->save();

        return $AdminSetting;
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
        $AdminSetting = AdminSetting::find($id);

        $AdminSetting->timezone=$request->timezone;
        $AdminSetting->currency_name=$request->currency_name;
        $AdminSetting->currency_symbol=$request->currency_symbol;
        $AdminSetting->date_format=$request->date_format;
        $AdminSetting->time_format=$request->time_format;
        $AdminSetting->thousand_separator=$request->thousand_separator;
        $AdminSetting->decimal_symbol=$request->decimal_symbol;

        $AdminSetting->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $AdminSetting= AdminSetting::find($id)->delete();
    }
}
