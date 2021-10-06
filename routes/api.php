<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\DragonballController;
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

Route::get('books', [BookController::class, 'getAllBooks']);

Route::get('ver/{id}', [BookController::class, 'getBook']);

Route::post('crear', [BookController::class, 'createBook']);
Route::put('books/{id}', 'Api\BookController@updateBook');

Route::delete('borrar/{id}', [BookController::class, 'deleteBook']);


Route::get('mirar', [DragonballController::class, 'getAll']);

Route::post('agregar', [DragonballController::class, 'createCharacter']);