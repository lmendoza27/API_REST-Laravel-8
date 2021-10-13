<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\DragonballController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Api\WrestlingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::get('books', 'Api\BookController@getAllBooks');

///// MIS PRIMEROS PASOS

Route::get('books', [BookController::class, 'getAllBooks']);

Route::get('ver/{id}', [BookController::class, 'getBook']);

Route::post('crear', [BookController::class, 'createBook']);
Route::put('books/{id}', 'Api\BookController@updateBook');

Route::delete('borrar/{id}', [BookController::class, 'deleteBook']);

////// CREACIÓN CON VUEJS DENTRO DE LARAVEL PARA EL CONSUMO

Route::get('mirar', [DragonballController::class, 'getAll']);

Route::get('ranking', [DragonballController::class, 'getRanking']);

Route::get('power', [DragonballController::class, 'onethousandpower']);

Route::post('agregar', [DragonballController::class, 'createCharacter']);

Route::delete('borrado/{id}', [DragonballController::class, 'destruir']);

Route::patch('update/{id}', [DragonballController::class, 'actualizar']);

Route::get('personaje/{id}', [DragonballController::class, 'show']);

////// SUBIR ARCHIVOS

Route::post('uplo', [FileController::class, 'testeo']);

Route::post('upload', [FileController::class, 'upload']);

Route::post('upload_resize', [FileController::class, 'upload3']);

Route::post('upload_baw', [FileController::class, 'upload4']);

Route::post('upload_valid', [FileController::class, 'upload5']);

Route::post('luchar', [WrestlingController::class, 'create']);

Route::get('ring', [WrestlingController::class, 'getAll']);
