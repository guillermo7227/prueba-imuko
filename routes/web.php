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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('cities', 'CityController');
    Route::resource('clients', 'ClientController');
    Route::resource('users', 'UserController');
});

Route::group([
    'middleware' => 'guest',
    'prefix' => 'users',
    'as' => 'users.',
    'namespace' => 'Auth',
], function() {
    Route::get('{user}/activate', 'ActivationController@show')->name('activate');
    Route::put('{user}/activate', 'ActivationController@update')->name('perform-activate');
});

