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
    
    // ######## Menus
    Route::get('menus',             array('as' => 'menus.index',        'uses' => 'App\Controllers\Admin\MenusController@index'));
    Route::post('menus',            array('as' => 'menus.index',        'uses' => 'App\Controllers\Admin\MenusController@filterMenus'));
    Route::get('menus/create',      array('as' => 'menus.create',       'uses' => 'App\Controllers\Admin\MenusController@create'));
    Route::post('menus/create',     array('as' => 'menus.store',        'uses' => 'App\Controllers\Admin\MenusController@store'));
    Route::get('menus/edit',        array('as' => 'menus.edit',         'uses' => 'App\Controllers\Admin\MenusController@edit'));
    Route::post('menus/edit',       array('as' => 'menus.update',       'uses' => 'App\Controllers\Admin\MenusController@update'));
    Route::get('menus/destroy',     array('as' => 'menus.delete',       'uses' => 'App\Controllers\Admin\MenusController@delete'));
    Route::post('menus/destroy',    array('as' => 'menus.destroy',      'uses' => 'App\Controllers\Admin\MenusController@destroy'));
    Route::get('menus/show',        array('as' => 'menus.show',         'uses' => 'App\Controllers\Admin\MenusController@show'));
    Route::get('menus/filter',      array('as' => 'menus.filter',       'uses' => 'App\Controllers\Admin\MenusController@filter'));

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


    // ################################################ BEGIN AJAX FORMS ADMIN ###################################################
    
    Route::post('menus/cbxMenus',           array('as' => 'menus.cbxMenus',             'uses' => 'App\Controllers\Admin\MenusController@cbxMenus'));
    Route::post('menus/cbxSubmenus',        array('as' => 'menus.cbxSubmenus',          'uses' => 'App\Controllers\Admin\MenusController@cbxSubmenus'));

    // ################################################ END AJAX FORMS ADMIN #####################################################
});