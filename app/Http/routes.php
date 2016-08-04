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

Route::group(['namespace' => 'Front'], function () {
    // 首页
    Route::get('', [
        'as' => 'front.index',
        'uses' => 'HomeController@index',
    ]);
});



Route::group(['namespace' => 'Admin', 'prefix' => 'manager'], function () {

    // 登录页面
    Route::get('auth/login', [
        'as' => 'admin.auth.login.get',
        'uses' => 'AuthController@getLogin',
    ]);

    // 登录提交
    Route::post('auth/login', [
        'as' => 'admin.auth.login.post',
        'uses' => 'AuthController@postLogin',
    ]);

    Route::group(['middleware' => ['admin.auth']], function () {

        # 登出
        Route::get('logout', [
            'as' => 'admin.auth.logout',
            'uses' => 'AuthController@logout',
        ]);
        Route::get('/', function () {
            return redirect(route('admin.dashboard'));
        });
        // Dashboard
        Route::get('dashboard', [
            'as' => 'admin.dashboard',
            'uses' => 'DashboardController@dashboard',
        ]);

        //文章
        Route::get('articles/create', [
            'as' => 'admin.articles.create',
            'uses' => 'ArticleController@create',
        ]);

    });

});
