<?php

use App\Questions;

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
	$questions = Questions::all();
    return view('welcome', compact('questions'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/next', 'HomeController@next');

Route::get('/skipnext', 'HomeController@skipnext');

Route::get('/scoreboard', 'HomeController@score');

Route::get('/timer', 'HomeController@timer');
