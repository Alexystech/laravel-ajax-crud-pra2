<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

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

//rutas para el controlador animal
Route::get('animal', [AnimalController::class, 'index'])->name('animal.index');
Route::post('animal', [AnimalController::class, 'registrar'])->name('animal.registrar');
Route::delete('animal/aliminar/{id}', [AnimalController::class, 'elimianr'])->name('animal_eliminar');
