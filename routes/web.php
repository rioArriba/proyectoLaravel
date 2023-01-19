<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\LibroController;

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
Route::get('fecha', function() {
    return date("d/m/y h:i:s");
   });
Route::get('posts/{nombre?}/{id?}', function ($nombre="Invitado") {
    return "href={{ route('miPost') }} " . $nombre;
})->where('nombre', "[A-Za-z]+")
->name('miPost')
->where('id', "\d+");

Route::get('prueba',[PruebaController::class,'__invoke']);

Route::get('libro', [LibroController::class, 'index']);

Route::get('libro/{id}', [LibroController::class, 'show'])->where('id','\d+');

//Route::resource('libro', [LibroController::class]).only(['index','show']);
