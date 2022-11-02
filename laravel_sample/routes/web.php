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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('menu', 'MenuController@index');

Route::get('card', 'CardController@index');
Route::post('card', 'CardController@cardAuthorize');
Route::get('card/result/{orderId}', 'CardController@authorizeResult');

Route::get('mpi', 'MpiController@index');
Route::post('mpi', 'MpiController@mpiAuthorize');
Route::post('mpi/result', 'MpiController@result');

Route::get('cvs', 'CvsController@index');
Route::post('cvs', 'CvsController@cvsAuthorize');
Route::get('cvs/result/{orderId}', 'CvsController@authorizeResult');

Route::post('push/mpi', 'PushController@mpi');
