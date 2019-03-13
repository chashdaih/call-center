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

Route::resource('callers', 'CallerController')->except(['show']);
Route::resource('students', 'StudentController')->except(['show']);
// Route::resource('offices', 'OfficeController')->except(['show']);
Route::resource('options/{model}', 'OptionsController')->parameters([
    '{model}' => 'id'
]);
// Route::resource('reasons', 'ReasonController')->except(['show']);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', 'UserController@edit')->name('users.edit');
Route::patch('users/{user}/update', 'UserController@update')->name('users.update');
