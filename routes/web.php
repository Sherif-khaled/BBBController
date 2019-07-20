<?php

use BBBController\Operations\Base\Commands;
use BBBController\Operations\Bigbluebutton\BigbluebuttonSettings;
use BBBController\Operations\SSH;

Route::get( "test", function () {

    $ff = new SSH();
    $ff->connectionStatus();
    dd( $ff );
} );


Route::group(['middleware' => ['dConfig']], function () {
    Route::get('/','DashboardController@index')->name('dashboard')->middleware('auth');
    Route::post('/changestatus/{id}','DashboardController@changeStates')->middleware('auth');


    Auth::routes();
    //********************** Users *********************************
    Route::get('/getusers','UserController@getUsers')->name('users.getusers');
    Route::post('/checkemail','UserController@checkEmailExist')->name('users.checkEmailExist');
    Route::get('/users/{id}/details','UserController@details')->name('users.details');
    Route::get('/users/{id}/profile','UserController@profile')->name('users.profile');
    Route::post('/changepassword','UserController@changePassword')->name('users.changepassword');
    Route::resource('users','UserController');

    //********************** Records *********************************
    Route::get('/records','RecordController@show')->name('record.show')->middleware('auth');
    Route::post('/delete/{meeting_id}','RecordController@delete')->name('record.delete');






    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/maintenance','MaintenanceController@index')->name('maintenance.index');

    Route::get('/packages','BigbluebuttonPackagesController@index')->name('bbb.index');

    Route::get('/settings','BigbluebuttonSettingsController@index')->name('settings.index');
    Route::post( '/settings', 'BigbluebuttonSettingsController@changeSettings' );

    //********************** Options *********************************
    Route::get('/options','BBBControllerOptionsController@index')->name('options.index');
    Route::post('/options','BBBControllerOptionsController@save')->name('options.save');

});

