<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'index'
]);

Route::resource('tasks', 'HomeController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/edit/{id}', [
	'uses' => 'HomeController@editTask',
	'as' => 'edit',
]);