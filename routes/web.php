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

use App\Especialidad;

Route::get('/', function () {
    $especialidad = Especialidad::all();
    return view('welcome', compact('especialidad'));
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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('especialidades', 'admin\EspecialidadController');
        Route::resource('citas', 'admin\CitaController');
        Route::resource('administradores', 'admin\AdminController');
        Route::resource('doctores', 'admin\DoctorController');
        Route::resource('pacientes', 'admin\PacienteController');
        Route::get('pacientes/profile/{id}', 'admin\PacienteController@create_profile')->name('pacientes.profile');
        Route::post('pacientes/profile/store/{id}', 'admin\PacienteController@store_profile')->name('pacientes.profile.store');
        Route::get('pacientes/profile/edit/{id}', 'admin\PacienteController@edit_profile')->name('pacientes.profile.edit');
        Route::put('pacientes/profile/update/{id}', 'admin\PacienteController@update_profile')->name('pacientes.profile.update');
        Route::resource('horarios','admin\ScheduleController');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('api')->group(function () {
        Route::resource('doctor', 'Api\DoctorController');
        Route::resource('paciente', 'Api\PacienteController');
        Route::resource('category', 'Api\EspecialidadController');
        Route::resource('eventos', 'Api\CitaController');
        Route::resource('apiadmin','Api\AdminController');
        Route::get('filter','Api\CitaController@filter');
    });
});

