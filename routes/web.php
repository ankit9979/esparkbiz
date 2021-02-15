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

Route::get('/', function () {
	return view('welcome');
})->name('job');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/job_edit/{id}', 'HomeController@job_edit')->name('job.edit');
Route::PUT('/job_update/{id}', 'HomeController@job_update')->name('job.update');
Route::DELETE('job_delete/{id}', 'HomeController@delete')->name('job.delete');
Route::get('/job_view/{id}', 'HomeController@view')->name('job.view');



Route::post('/job_register', 'JobController@register')->name('job_register');



