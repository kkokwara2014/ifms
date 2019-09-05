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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});
$timeIt = '2019-10-31';

if ($timeIt > date('Y-m-d')) {
    // Route::get('/', 'TimerController@index');

Route::group(['prefix'=>'dashboard','middleware'=>'auth'], function(){

    Route::get('/','AdminController@index')->name('admin.index');

    Route::resource('mda','MdaController');
    Route::resource('contractor','ContractorController');
    Route::resource('supplier','SupplierController');
    Route::resource('department','DepartmentController');

    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

});


    // Route::get('/', 'Auth\LoginController@showLogin')->name('homepage');

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    

    Route::get('/home', 'HomeController@index')->name('home');
} else {
    Route::get('/', 'TimerController@calldeveloper');
}

