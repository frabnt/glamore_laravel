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







//email test
Route::get('/emailtest', function () {

    Mail::send('auth.emails.test', ['name'=> 'Stefano'], function($message){

        $message->to('stefano.stirati@triweb.it', 'test')->subject('Welcome!');

    });


    
});


 



// Route::get('user', function () {
//echo "welcome home. " ;
//$id= Auth::id();


//echo $id;
//return $user=Auth::User();
//echo Session::get(); 
//echo Auth::instance()->get_user_id(); //return  an array  containing 'SimpleAuth' and 0
//Debug::dump(Session::get()); // return nothing!!
// if (Auth::check())
// {
//      //$user = Auth::User();     
//         //$userId = $user->id;
//      echo "welcome home. " . Auth::user()->email ;
// }else{
//  return "ko";
// }


// return Auth::user();

// });


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

   

    //contacts
    Route::get('/bbContact', function () {
        return view('bbContact');
    });


    
    Route::resource('industries', 'IndustryController');
    Route::resource('experiences', 'ExperienceController');
    Route::resource('educations', 'EducationController');
    Route::resource('users', 'UserController');
    Route::resource('contacts', 'ContactController');



    Route::group(['middleware' => 'web'], function () {




    Route::auth();



    
    


    Route::get('/user/{id}','UserController@showProfile');
   //Educations
    //get education by user id
    Route::get('education/user/{id}', 'educationController@eduByUserId');


    //User
    // Route::get('/user/{id}', function (App\User $user) {
    //    return view('user.user_profile');
    // });

    //Auth
    Route::get('/', function () {
       return redirect()->route('home');
    });

    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);


    //Messenger
    Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);

    
   //Route::post('/user/{id}', array('uses' => 'UserController@upload'));



});



    
});