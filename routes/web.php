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

Route::get('/list', 'employeesController@index')->name('list');

Route::get('/kek', function (){
   echo "<pre>";
   var_dump(\App\employees::select('emp_no')->where([['emp_no','>',90000],['active_emp','Y']])->get());
   echo "</pre>";
});

Route::get('/info', function (){
    phpinfo();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
