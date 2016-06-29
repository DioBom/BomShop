<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Home'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        // Authentication Routes...
        $this->get('login', 'AuthController@showLoginForm');
        $this->post('login', 'AuthController@login');
        $this->get('logout', 'AuthController@logout');

        // Registration Routes...
        $this->get('register', 'AuthController@showRegistrationForm');
        $this->post('register', 'AuthController@register');

        // Password Reset Routes...
        $this->get('password/reset/{token?}', 'PasswordController@showResetForm');
        $this->post('password/email', 'PasswordController@sendResetLinkEmail');
        $this->post('password/reset', 'PasswordController@reset');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        // Authentication Routes...
        $this->get('login', 'AuthController@showLoginForm')->name('admin.login');
        $this->post('login', 'AuthController@login');
        $this->get('logout', 'AuthController@logout')->name('admin.logout');

        // Password Reset Routes...
        $this->get('password/reset/{token?}', 'PasswordController@showResetForm')->name('admin.password.reset');
        $this->post('password/email', 'PasswordController@sendResetLinkEmail')->name('admin.password.email');
        $this->post('password/reset', 'PasswordController@reset');
    });

    Route::resource('menu', 'MenuController');
    Route::post('menu/tree', 'MenuController@reTree')->name('admin.menu.tree');

    Route::get('/', 'AdminController@index')->name('admin');
});

Route::get('/home', 'HomeController@index');
