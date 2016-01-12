<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/emailtest', function () {

	Mail::send('auth.emails.test', ['name'=> 'Stefano'], function($message){

		$message->to('stefano.stirati@triweb.it', 'test')->subject('Welcome!');

	});


    
});





Route::get('user', function () {
//echo "welcome home. " ;
//$id= Auth::id();


//echo $id;
//return $user=Auth::User();
//echo Session::get(); 
//echo Auth::instance()->get_user_id(); //return  an array  containing 'SimpleAuth' and 0
//Debug::dump(Session::get()); // return nothing!!
// if (Auth::check())
// {
//     	//$user = Auth::User();     
//         //$userId = $user->id;
//      echo "welcome home. " . Auth::user()->email ;
// }else{
// 	return "ko";
// }


return Auth::user();

});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
