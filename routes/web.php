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

Route::get('/instalar', [App\Http\Controllers\DisenoController::class, 'instalar']);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/apps', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'cms'], function () {

  /*CMS*/ /*INICIO*/
  Route::get('/', [App\Http\Controllers\CmsController::class, 'index']);

  Route::get('/diseno/{pestana}', [App\Http\Controllers\DisenoController::class, 'diseno']);

  Route::group(['prefix' => 'config'], function () {
    Route::patch('head', [App\Http\Controllers\DisenoController::class, 'head']);

    Route::match(['post','delete'],'meta/{id?}', [App\Http\Controllers\DisenoController::class, 'meta']);

    Route::match(['post','delete'],'link/{id?}', [App\Http\Controllers\DisenoController::class, 'link']);

    Route::get('css/', [App\Http\Controllers\DisenoController::class, 'css']);
  });

  Route::match(['post','get','patch','delete'],'/prensa/{noticiaId?}', [App\Http\Controllers\CmsController::class, 'prensa']);

  Route::delete('/prensa/{noticiaId}/img/{imagenNo}', [App\Http\Controllers\CmsController::class, 'prensaBorrarImg']);

  Route::delete('/prensa/{noticiaId}/mp3/{mp3No}', [App\Http\Controllers\CmsController::class, 'prensaBorrarMp3']);

});


Route::post('/form', [App\Http\Controllers\HomeController::class, 'form']);
