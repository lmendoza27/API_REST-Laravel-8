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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('somos', function () {
    return view('appsdad');
})->where('any', '.*');



/// Routes/web.php se ejecuta por línea, por lo que es idóneo colocar este any al final. De por sí PHP se corre línea por línea.

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

/*Route::get('vuejs', function () {
    return view('app');
})->where('any', '.*');
*/
