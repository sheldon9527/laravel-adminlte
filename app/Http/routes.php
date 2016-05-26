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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api\V1'], function ($api) {
    $api->post('login', 'UserController@login');
    $api->group(['middleware' => 'api.auth'], function ($api) {
        $api->get('users/{id}', 'UserController@show');
        $api->get('users', 'UserController@index');
    });
});



Route::group(['namespace' => 'Admin', 'prefix' => 'manager'], function () {

    // 登录页面
    Route::get('/index', [
        'as' => 'admin.index',
        'uses' => 'HomeController@index',
    ]);
});
