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

Route::get('/apps', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'cms'], function () {

  /*CMS*/ /*INICIO*/
  Route::get('/', [App\Http\Controllers\CmsController::class, 'index']);

  Route::get('/diseno', [App\Http\Controllers\CmsController::class, 'diseno']);

  Route::match(['post','get'],'/prensa', [App\Http\Controllers\CmsController::class, 'prensa']);

  Route::get('/prensa/crear', [App\Http\Controllers\CmsController::class, 'prensaCrear']);

});


Route::post('/form', [App\Http\Controllers\HomeController::class, 'form']);
