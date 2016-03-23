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

   Route::get('register/verify/{confirmationCode}', [
       'as' => 'confirmation_path',
       'uses' => 'RegistrationController@confirm'
   ]);

    //contacts
    Route::get('/bbContact', function () {
        return view('bbContact');
    });

Route::group(['middleware' => 'cors'], function(){
    Route::resource('industries', 'industryController');
    Route::resource('experiences', 'experienceController');
    Route::resource('educations', 'educationController');
    Route::resource('users', 'UserController');
    Route::resource('contacts', 'ContactController');
    Route::resource('projects', 'ProjectController');
    //Educations
    //get educations by user id
    Route::get('education/user/{id}', 'educationController@eduByUserId');
    //Experience
    //get experiences by user id
    Route::get('experience/user/{id}', 'experienceController@expByUserId');
    //Industry
    //get industries by user id
    Route::get('industry/user/{id}', 'industryController@indByUserId');
    //Project
    //get projects by user id
    Route::get('project/user/{id}', 'projectController@prjByUserId');
   
});

    
    



    Route::group(['middleware' => 'web'], function () {




    Route::auth();

    Route::get('/user/{id}','UserController@showProfile');

    Route::get('/search-for-affiliate', function () {
        return view('affiliates.search_for_affiliate');
    });

    // Route::get('/my-project', function () {
    //     return view('projects.my-project');
    // });


    Route::get('/my-project/{id}','projectController@show_my_project');

    // Route::get('/project-detail/{id}', function () {
    //     //return view('projects.project-detail');
        
    // });

    Route::get('project-detail/{id}', 'projectController@project_detail');
    Route::post('project-detail/{id}', 'projectController@addUserToTeam');
    


    //User
    // Route::get('/user/{id}', function (App\User $user) {
    //    return view('user.user_profile');
    // });

    //Auth
    Route::get('/', function () {
       return redirect()->route('home');
    });

    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);






    
});