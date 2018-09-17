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

Route::get('home', function() {
    return view('home');
});

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('perfil', 'ProfileController');
    Route::resource('cita', 'EventController');
    Route::get('allevent', 'EventController@events');
    Route::get('myevents', 'EventController@myevents');
});

Route::middleware(['auth', 'profile'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/especialidad', 'EspecialidadController@index')->name('especialidad');
    Route::get('/{id}/cita', 'EventController@create')->name('add_event');
});

