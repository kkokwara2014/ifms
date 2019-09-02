<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
$timeIt = '2019-10-31';

if ($timeIt > date('Y-m-d')) {
    // Route::get('/', 'TimerController@index');

Route::group(['prefix'=>'admin','middleware'=>'auth'], function(){

    Route::get('/','AdminController@index')->name('admin.index');

    // Handling all about the Admins
    Route::get('/all','AdminController@allAdmins')->name('admin.admins.all');
    Route::get('/create/new','AdminController@create')->name('admin.admins.create');
    Route::post('/create/new','AdminController@store')->name('admin.admins.store');
    Route::get('/edit/{id}','AdminController@edit')->name('admin.admins.edit');
    Route::match(['put', 'patch'],'update/{id}','AdminController@update')->name('admin.admins.update');

});


    // Route::get('/', 'Auth\LoginController@showLogin')->name('homepage');

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    

    Route::get('/home', 'HomeController@index')->name('home');
} else {
    Route::get('/', 'TimerController@calldeveloper');
}

