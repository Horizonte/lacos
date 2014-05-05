<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',            array('as' => 'admin.login',      'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::post('/',           array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));
Route::get('admin/logout', array('as' => 'admin.logout',     'uses' => 'App\Controllers\Admin\AuthController@getLogout'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::get('home',				array('as' => 'admin.homeIn',		'uses' => 'App\Controllers\Admin\HomeInController@getHomeIn'));
    
    // ######## Groups
    Route::get('groups',    		array('as' => 'groups.index',		'uses' => 'App\Controllers\Admin\GroupsController@index'));
    Route::get('groups/create',     array('as' => 'groups.create',      'uses' => 'App\Controllers\Admin\GroupsController@create'));
    Route::post('groups/create',    array('as' => 'groups.store',       'uses' => 'App\Controllers\Admin\GroupsController@store'));
    Route::get('groups/edit',       array('as' => 'groups.edit',        'uses' => 'App\Controllers\Admin\GroupsController@edit'));
    Route::post('groups/edit',      array('as' => 'groups.update',      'uses' => 'App\Controllers\Admin\GroupsController@update'));
    Route::get('groups/destroy',    array('as' => 'groups.delete',      'uses' => 'App\Controllers\Admin\GroupsController@delete'));
    Route::post('groups/destroy',   array('as' => 'groups.destroy',     'uses' => 'App\Controllers\Admin\GroupsController@destroy'));
    Route::get('groups/show',       array('as' => 'groups.show',        'uses' => 'App\Controllers\Admin\GroupsController@show'));

    // ######## Users
    Route::get('users',				array('as' => 'users.index',		'uses' => 'App\Controllers\Admin\UsersController@index'));
    Route::get('users/create',		array('as' => 'users.create',		'uses' => 'App\Controllers\Admin\UsersController@create'));
    Route::get('users/destroy',		array('as' => 'users.destroy',		'uses' => 'App\Controllers\Admin\UsersController@destroy'));
    Route::get('users/photo',		array('as' => 'users.photo',		'uses' => 'App\Controllers\Admin\UsersController@photo'));
    Route::get('users/edit',		array('as' => 'users.edit',			'uses' => 'App\Controllers\Admin\UsersController@edit'));
    Route::get('users/password',	array('as' => 'users.password',		'uses' => 'App\Controllers\Admin\UsersController@password'));
    Route::get('users/show',		array('as' => 'users.show',			'uses' => 'App\Controllers\Admin\UsersController@show'));
    Route::post('users/store',		array('as' => 'users.store',		'uses' => 'App\Controllers\Admin\UsersController@store'));
    Route::get('users/update',		array('as' => 'users.update',		'uses' => 'App\Controllers\Admin\UsersController@update'));
});