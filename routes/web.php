<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'App\Http\Controllers\MainController@index') ;
//Route::get('/welcome', 'App\Http\Controllers\PostController@ajaxRequest');
//Route::post('/welcome', 'App\Http\Controllers\PostController@ajaxRequestPost');
//Route::post ('/post',[PostController::class,'Submit']);
//Route::get('/', 'App\Http\Controllers\HomeController@ajaxRequest');

Route::post('/ajaxRequest', 'App\Http\Controllers\HomeController@ajaxRequestPost');
