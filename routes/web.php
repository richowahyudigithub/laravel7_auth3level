<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterTravelController;

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


// Route role conditional
Route::get('/admin', 'AdminController@index');
Route::get('/user','UserController@index');

Route::get('/register_travel','RegisterTravelController@index');
Route::post('/insert_usertravel','RegisterTravelController@store');