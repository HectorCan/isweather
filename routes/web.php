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

Route::namespace('Sensor')->group(function () {
  Route::prefix('sensor')->group(function () {
    Route::get('test', 'SensorController@test')->name('sensor.test');
    Route::get('notification', 'SensorController@sendNotification')->name('sensor.notification');
    Route::post('save', 'SensorController@saveSensorData')->name('sensor.save');
  });
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('user', 'UserController', ['except' => ['show']]);

    Route::prefix('profile')->group(function () {
      Route::get('/', 'ProfileController@edit')->name('profile.edit');
      Route::put('/', 'ProfileController@update')->name('profile.update');
      Route::put('/password', 'ProfileController@password')->name('profile.password');
    });

    Route::namespace('Sensor')->group(function () {
      Route::prefix('sensor')->group(function () {
        Route::get('/', 'SensorController@index')->name('sensor.index');
        Route::get('data', 'SensorController@ChartData')->name('sensor.data');
      });
    });

    Route::prefix('template')->group(function () {
      Route::get('dashboard', function () {
        return view('template.dashboard');
      })->name('dashboard');

      Route::get('table-list', function () {
        return view('template.pages.table_list');
      })->name('table');

      Route::get('typography', function () {
        return view('template.pages.typography');
      })->name('typography');

      Route::get('icons', function () {
        return view('template.pages.icons');
      })->name('icons');

      Route::get('map', function () {
        return view('template.pages.map');
      })->name('map');

      Route::get('notifications', function () {
        return view('template.pages.notifications');
      })->name('notifications');

      Route::get('rtl-support', function () {
        return view('template.pages.language');
      })->name('language');

      Route::get('upgrade', function () {
        return view('template.pages.upgrade');
      })->name('upgrade');
    });
});
