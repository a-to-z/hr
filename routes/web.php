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


Auth::routes();


Route::group(['middleware' => 'auth'], function() {
    Route::get('/leaves','leavesController@index')->name('leaves');
    Route::get('/leaves/details','leavesController@details')->name('details');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/list', 'employeesController@index')->name('list');

});


Route::get('/info', function (){
    phpinfo();
});

