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

$controller_path = 'App\Http\Controllers';

// Main Page Route

// pages


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    $controller_path = 'App\Http\Controllers';

    Route::get('/', $controller_path . '\pages\HomePage@index')->name('pages-home');
    Route::get('/page-2', $controller_path . '\pages\Page2@index')->name('pages-page-2');


    //Rutas de Users
    Route::get('/users', $controller_path . '\pages\Users@index')->name('pages-users');
    Route::get('/users/create', $controller_path . '\pages\Users@create')->name('pages-users-create');
    Route::post('/users/store', $controller_path . '\pages\Users@store')->name('pages-users-store');
    Route::get('/users/show/{user_id}', $controller_path . '\pages\Users@show')->name('pages-users-show');
    Route::post('/users/update', $controller_path . '\pages\Users@update')->name('pages-users-update');
    Route::get('/users/destroy/{user_id}', $controller_path . '\pages\Users@destroy')->name('pages-users-destroy');
    Route::get('/users/switch/{type_id}', $controller_path . '\pages\Users@switch')->name('pages-users-switch');


    //Rutas de types
    Route::get('/types', $controller_path . '\pages\types@index')->name('pages-types');
    Route::get('/types/create', $controller_path . '\pages\types@create')->name('pages-types-create');
    Route::post('/types/store', $controller_path . '\pages\types@store')->name('pages-types-store');
    Route::get('/types/show/{type_id}', $controller_path . '\pages\types@show')->name('pages-types-show');
    Route::post('/types/update', $controller_path . '\pages\types@update')->name('pages-types-update');
    Route::get('/types/destroy/{type_id}', $controller_path . '\pages\types@destroy')->name('pages-types-destroy');
    Route::get('/types/switch/{type_id}', $controller_path . '\pages\types@switch')->name('pages-types-switch');

    //SOS
    Route::get('/sos', $controller_path . '\pages\Sos@index')->name('pages-sos');
    Route::get('/sos/create', $controller_path . '\pages\Sos@create')->name('pages-sos-create');
    Route::post('/sos/store', $controller_path . '\pages\Sos@store')->name('pages-sos-store');
    Route::get('/sos/show/{sos_id}', $controller_path . '\pages\Sos@show')->name('pages-sos-show');
    Route::post('/sos/update', $controller_path . '\pages\Sos@update')->name('pages-sos-update');
    Route::get('/sos/destroy/{sos_id}', $controller_path . '\pages\Sos@destroy')->name('pages-sos-destroy');
    Route::get('/sos/switch/{sos_id}', $controller_path . '\pages\Sos@switch')->name('pages-sos-switch');

    //Devices
    Route::get('/devices', $controller_path . '\pages\devices@index')->name('pages-devices');
    Route::get('/devices/create', $controller_path . '\pages\devices@create')->name('pages-devices-create');
    Route::post('/devices/store', $controller_path . '\pages\devices@store')->name('pages-devices-store');
    Route::get('/devices/show/{devices_id}', $controller_path . '\pages\devices@show')->name('pages-devices-show');
    Route::post('/devices/update', $controller_path . '\pages\devices@update')->name('pages-devices-update');
    Route::get('/devices/destroy/{devices_id}', $controller_path . '\pages\devices@destroy')->name('pages-devices-destroy');
    Route::get('/devices/switch/{devices_id}', $controller_path . '\pages\devices@switch')->name('pages-devices-switch');
    Route::get('/devices/export', $controller_path . '\pages\devices@export')->name('pages-devices-export');

     //Backups
    Route::get('/backups', $controller_path . '\pages\Backups@index')->name('pages-backups');
    Route::get('/backups/create', $controller_path . '\pages\Backups@create')->name('pages-backups-create');
    Route::get('/backups/delete/{id}', $controller_path . '\pages\backups@delete')->name('pages-backups-delete');



});
