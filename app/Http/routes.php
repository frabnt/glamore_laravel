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
    Route::resource('todos', 'TodoController');
    Route::resource('notifications', 'NotificationController');
    Route::resource('roles', 'RoleController');
    Route::resource('permission', 'PermissionController');
    //get educations by user id
    Route::get('education/user/{id}', 'educationController@eduByUserId');
    //get experiences by user id
    Route::get('experience/user/{id}', 'experienceController@expByUserId');
    //get industries by user id
    Route::get('industry/user/{id}', 'industryController@indByUserId');
    //get projects by user id
    Route::get('project/user/{id}', 'ProjectController@prjByUserId');
    //get todos by user id
    Route::get('todo/user/{id}', 'TodoController@todoByUserId');
    //get todos by project id
    Route::get('todo/project/{id}', 'TodoController@todoByProjectId');
    //get todos by project id and by user id
    Route::get('todo/project/{user_id}/{project_id}', 'TodoController@todoByProjectIdAndByUserId');
    //get notification by user id
    Route::get('notification/user/{id}', 'NotificationController@showNotificationByUserId');
    //add user to team
    Route::get('user/adduser/{user_id}/{team_id}', 'UserController@addUserToTeam');
    //remove user from team
    Route::get('user/removeuser/{user_id}/{team_id}', 'UserController@removeUserFromTeam');
    //get user in team
    Route::get('user/inteam/{team_id}', 'UserController@getUsersInTeam');
    //get user not in team
    Route::get('user/notinteam/{team_id}', 'UserController@getUsersNotInTeam');

    
   
});

    
    



    Route::group(['middleware' => 'web'], function () {




    Route::auth();

    Route::get('/user/{id}','UserController@showProfile');

    Route::get('/search-for-affiliate', function () {
        return view('affiliates.search_for_affiliate');
    });

    Route::get('/under-costruction', function () {
        return view('layouts.under_costruction');
    });

    // Route::get('/my-project', function () {
    //     return view('projects.my-project');
    // });


    Route::get('/my-project/{id}','ProjectController@show_my_project');

    // Route::get('/project-detail/{id}', function () {
    //     //return view('projects.project-detail');
        
    // });

    Route::get('project-detail/{id}', 'ProjectController@project_detail');
    Route::post('project-detail/{id}', 'ProjectController@addUserToTeam');
    
    Route::get('/settings', function () {
        return view('settings');
    });

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