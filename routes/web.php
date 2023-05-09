<?php

use App\Http\Controllers\CulturController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ParcelleController;
use App\Models\Employe;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* le route pour le parcelle */
Route::get('/parcelle',[ParcelleController::class, 'index'])->name('parcelle.index');
Route::post('parcelle/store',[ParcelleController::class, 'store'])->name('parcelle.store');
Route::put('parcelle/update',[ParcelleController::class, 'update'])->name('parcelle.update');
Route::delete('parcelle/delete',[ParcelleController::class, 'destroy'])->name('parcelle.delete');
/* la fin de route */


/* le route pour le employe */
Route::get('/employe',[EmployeController::class, 'index'])->name('employe.index');

Route::get('employe/store',[EmployeController::class, 'store'])->name('employe.store');

Route::post('employe/create',[EmployeController::class, 'create'])->name('employe.create');

Route::put('employe/update',[EmployeController::class, 'update'])->name('employe.update');
Route::delete('employe/delete',[EmployeController::class, 'destroy'])->name('employe.delete');
/* la fin de route */

/* le route pour le culture */
Route::get('/culture',[CulturController::class, 'index'])->name('culture.index');
Route::get('culture/store',[CulturController::class, 'store'])->name('culture.store');


/* la fin de route */