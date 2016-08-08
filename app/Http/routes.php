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

Route::group(['namespace' => 'Front', 'middleware' => ['manager.delete']], function () {
    // 首页
    Route::get('{customPath?}', [
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

    Route::get('auth/signup', [
        'as' => 'admin.auth.signup.get',
        'uses' => 'AuthController@getSignup',
    ]);

    Route::post('auth/signup', [
        'as' => 'admin.auth.signup.post',
        'uses' => 'AuthController@postSignup',
    ]);

    Route::post('auth/sendCode', [
        'as' => 'admin.auth.sendCode.post',
        'uses' => 'AuthController@sendCode',
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

        //基本信息

        Route::get('blog/setting', [
            'as' => 'admin.users.blog.edit',
            'uses' => 'AdminController@editBlog',
        ]);
        Route::put('blog/setting', [
            'as' => 'admin.users.blog.update',
            'uses' => 'AdminController@updateBlog',
        ]);
        Route::get('profile', [
            'as' => 'admin.users.edit',
            'uses' => 'AdminController@edit',
        ]);
        Route::put('profile', [
            'as' => 'admin.users.update',
            'uses' => 'AdminController@update',
        ]);
        Route::get('email', [
            'as' => 'admin.users.email.edit',
            'uses' => 'AdminController@editEmail',
        ]);
        Route::put('email', [
            'as' => 'admin.users.email.update',
            'uses' => 'AdminController@updateEmail',
        ]);
        Route::get('password', [
            'as' => 'admin.users.password.edit',
            'uses' => 'AdminController@editPassword',
        ]);
        Route::put('password', [
            'as' => 'admin.users.password.update',
            'uses' => 'AdminController@updatePassword',
        ]);

        //文章
        Route::get('articles/create', [
            'as' => 'admin.articles.create',
            'uses' => 'ArticleController@create',
        ]);
        Route::post('articles', [
            'as' => 'admin.articles.store',
            'uses' => 'ArticleController@store',
        ]);
        Route::get('articles', [
            'as' => 'admin.articles.index',
            'uses' => 'ArticleController@index',
        ]);
        Route::get('articles/{id}/edit', [
            'as' => 'admin.articles.edit',
            'uses' => 'ArticleController@edit',
        ]);
        Route::put('articles/{id}', [
            'as' => 'admin.articles.update',
            'uses' => 'ArticleController@update',
        ]);
        Route::get('articles/{id}', [
            'as' => 'admin.articles.show',
            'uses' => 'ArticleController@show',
        ]);
        Route::delete('articles/{id}', [
            'as' => 'admin.articles.destory',
            'uses' => 'ArticleController@destory',
        ]);
        Route::post('articles/{id}', [
            'as' => 'admin.articles.update.status',
            'uses' => 'ArticleController@updateStatus',
        ]);

        //分类
        Route::get('categories', [
            'as' => 'admin.categories.index',
            'uses' => 'CategoryController@index',
        ]);
        Route::post('categories', [
            'as' => 'admin.categories.store',
            'uses' => 'CategoryController@store',
        ]);
        Route::put('categories/{id}', [
            'as' => 'admin.categories.update',
            'uses' => 'CategoryController@update',
        ]);
        Route::delete('categories/{id}', [
            'as' => 'admin.categories.destroy',
            'uses' => 'CategoryController@destroy',
        ]);

        //tags
        Route::get('tags', [
            'as' => 'admin.tags.index',
            'uses' => 'TagController@index',
        ]);

    });

});
