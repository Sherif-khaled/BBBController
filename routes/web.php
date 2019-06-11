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

Route::group(['middleware' => ['dConfig']], function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('auth');




    Route::get('/records','RecordController@show')->name('record.show')->middleware('auth');
    Route::post('/delete/{meeting_id}','RecordController@delete')->name('record.delete');

    Auth::routes();

    Route::get('/users','UserController@show')->name('user.show');
    Route::get('/create','UserController@create')->name('user.create');
    Route::post('/create','UserController@store')->name('user.store');


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/maintenance','MaintenanceController@index')->name('maintenance.index');

    Route::get('/packages','BigbluebuttonPackagesController@index')->name('bbb.index');

    Route::get('/settings','BigbluebuttonSettingsController@index')->name('settings.index');

    Route::get('/options','BBBControllerOptionsController@index')->name('options.index');
    Route::post('/options','BBBControllerOptionsController@save')->name('options.save');

});

