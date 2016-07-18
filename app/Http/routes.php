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

//Oauth token
Route::post('oauth/access_token', function() {

 return Response::json(Authorizer::issueAccessToken());

});

/*
|--------------------------------------------------------------------------
| Oauth2 Protected API
|--------------------------------------------------------------------------
*/


    Route::group(['prefix' => 'api', 'middleware' => ['cors','oauth'],'before' => 'oauth'], function () {

        //get info of user authenticated by oauth
        Route::get('/userinfo', function () {
            $user_id=Authorizer::getResourceOwnerId(); // the token user_id
            $user=\App\User::find($user_id);// get the user data from database
            return Response::json($user);
        });

        Route::resource('files', 'FileController');
        Route::resource('experiences', 'experienceController');
        Route::resource('educations', 'educationController');
        Route::resource('users', 'UserController');
        Route::resource('contacts', 'ContactController');
        Route::resource('projects', 'ProjectController');
        Route::resource('todos', 'TodoController');
        Route::resource('notifications', 'NotificationController');
        Route::resource('roles', 'RoleController');
        Route::resource('permission', 'PermissionController');
        Route::resource('user_setting', 'UserSettingController');
        Route::resource('admin_setting', 'AdminSettingController');
        //get educations by user id
        Route::get('education/user/{id}', 'educationController@eduByUserId');
        //get experiences by user id
        Route::get('experience/user/{id}', 'experienceController@expByUserId');
        //get industries by user id
        Route::get('industry/user/{id}', 'industryController@indByUserId');
        //get projects by user id
        Route::get('project/user/{id}', 'ProjectController@prjByUserId');
        //get projects by user id with user info
        Route::get('project/userinfo/{id}', 'ProjectController@prjByUserIdWithUserInfo');
        //get projects with user info
        Route::get('project/userinfo', 'ProjectController@prjWithUserInfo');
         //get projects with user info
        Route::get('project/joined/userinfo/{current_user_id}/', 'ProjectController@joinedProjectWithUserInfo');
        //get files by project
        Route::get('file/project/{id}/', 'FileController@getFilesByProjectId'); 
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
        //get user in team with 
        Route::get('user/notification/project/{project_id}', 'UserController@getAllUsersWithNotificationInfoByProjectId');
        //get user in team with 
        //Route::get('user/notinteam/withnotification/{team_id}', 'UserController@getUsersNotInTeamWithNotificationInfo');
        //get user not in team
        Route::get('user/notinteam/{team_id}', 'UserController@getUsersNotInTeam');
        //send invite to user
        Route::get('user/notification/invite/{user_id_to}/{user_id_from}/{module}/{project_id}', 'NotificationController@sendInviteToUser');
        //send invite to user
        Route::get('/notification/user/{user_id}', 'NotificationController@showNotificationByUserId');
        Route::get('/notification/project/{project_id}', 'NotificationController@showNotificationByProjectId');
        Route::get('/notification/project/delete/{user_id}/{project_id}', 'NotificationController@deleteNotificationsByUsrIdAndByProjectId');
        //get user settingsby user id
        Route::get('/user/setting/{user_id}/', 'UserSettingController@getUserSettingByUserId');
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

Route::group(['middleware' => ['cors','web', 'auth']], function () {

    //Resources
    Route::resource('industries', 'industryController');
    Route::resource('files', 'FileController');
    Route::resource('experiences', 'experienceController');
    Route::resource('educations', 'educationController');
    Route::resource('users', 'UserController');
    Route::resource('contacts', 'ContactController');
    Route::resource('projects', 'ProjectController');
    Route::resource('todos', 'TodoController');
    Route::resource('notifications', 'NotificationController');
    Route::resource('roles', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('user_setting', 'UserSettingController');
    Route::resource('admin_setting', 'AdminSettingController');
    //get educations by user id
    Route::get('education/user/{id}', 'educationController@eduByUserId');
    //get experiences by user id
    Route::get('experience/user/{id}', 'experienceController@expByUserId');
    //get industries by user id
    Route::get('industry/user/{id}', 'industryController@indByUserId');
    //get projects by user id
    Route::get('project/user/{id}', 'ProjectController@prjByUserId');
    //get projects by user id with user info
    Route::get('project/userinfo/{id}', 'ProjectController@prjByUserIdWithUserInfo');
    //get projects with user info
    Route::get('project/userinfo', 'ProjectController@prjWithUserInfo');
     //get projects with user info
    Route::get('project/joined/userinfo/{current_user_id}/', 'ProjectController@joinedProjectWithUserInfo');
    //get files by project
    Route::get('file/project/{id}/', 'FileController@getFilesByProjectId'); 
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
    //get user in team with 
    Route::get('user/notification/project/{project_id}', 'UserController@getAllUsersWithNotificationInfoByProjectId');
    //get user in team with 
    //Route::get('user/notinteam/withnotification/{team_id}', 'UserController@getUsersNotInTeamWithNotificationInfo');
    //get user not in team
    Route::get('user/notinteam/{team_id}', 'UserController@getUsersNotInTeam');
    //send invite to user
    Route::get('user/notification/invite/{user_id_to}/{user_id_from}/{module}/{project_id}', 'NotificationController@sendInviteToUser');
    //send invite to user
    Route::get('/notification/user/{user_id}', 'NotificationController@showNotificationByUserId');
    Route::get('/notification/project/{project_id}', 'NotificationController@showNotificationByProjectId');
    Route::get('/notification/project/delete/{user_id}/{project_id}', 'NotificationController@deleteNotificationsByUsrIdAndByProjectId');
    //get user settingsby user id
    Route::get('/user/setting/{user_id}/', 'UserSettingController@getUserSettingByUserId');



    

        
    //Dasboards
    Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

    Route::get('/next-meetings', function () {
        return view('dashboards.next_meetings');
    });

    Route::get('/task-to-do', function () {
        return view('dashboards.task_to_do');
    });

    Route::get('/card-of-the-last-project', function () {
        return view('dashboards.card_of_the_last_project');
    });

    Route::get('/chart-of-earnings', function () {
        return view('dashboards.chart_of_earnings');
    });

    

    //projects
    Route::get('/my-project/{id}','ProjectController@show_my_project');

    // Route::get('/project-detail/{id}', function () {
    //     //return view('projects.project-detail');
        
    // });

    Route::get('project-detail/{id}', 'ProjectController@project_detail');

    //Route::post('project-detail/{id}', 'ProjectController@addUserToTeam');

    Route::get('/activities', function () {
        return view('projects.activities');
    });

    Route::get('/documents-and-notes', function () {
        return view('projects.documents_and_notes');
    });

    Route::get('/videoconference', function () {
        return view('projects.videoconference');
    });


    //affiliates
    Route::get('/search-for-affiliate', function () {
        return view('affiliates.search_for_affiliate');
    });

    Route::get('/bio-affiliate', function () {
        return view('affiliates.bio_affiliate');
    });

    Route::get('/activities-diary', function () {
        return view('affiliates.activities_diary');
    });

    Route::get('/search-and-join-projects', function () {
        return view('affiliates.search_and_join_projects');
    });


    //reports
    Route::get('/payments-received', function () {
        return view('reports.payments_received');
    });

    Route::get('/summary-of-earnings', function () {
        return view('reports.summary_of_earnings');
    });

    Route::get('/details-of-tax', function () {
        return view('reports.details_of_tax');
    });

    Route::get('/invoice-and-remittance', function () {
        return view('reports.invoice_and_remittance');
    });

    // Route::get('/my-project', function () {
    //     return view('projects.my-project');
    // });


    
    // user profile 
    Route::get('/settings', function () {
        return view('user.settings');
    });

    Route::get('/user/{id}','UserController@showProfile');

    //User
    // Route::get('/user/{id}', function (App\User $user) {
    //    return view('user.user_profile');
    // });

    //email test
    Route::get('/emailtest', function () {

        Mail::send('auth.emails.test', ['name'=> 'Stefano'], function($message){

            $message->to('stefano.stirati@triweb.it', 'test')->subject('Welcome!');

        });

    });


    Route::get('register/verify/{confirmationCode}', [
     'as' => 'confirmation_path',
     'uses' => 'RegistrationController@confirm'
     ]);

    //contacts
    // Route::get('/bbContact', function () {
    //     return view('bbContact');
    // });

});


//Authentication 
Route::group(['middleware' => 'web'], function () {
// The auth() method is a shortcut to defining all route for login/logout
Route::auth();
//socialize
Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');
//Redirect root to home
Route::get('/', function () {
   return redirect()->route('home');
});
});