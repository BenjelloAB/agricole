<?php

use App\Http\Controllers\CqualiteController;
use App\Http\Controllers\CulturController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FinanceCultureController;
use App\Http\Controllers\ParcelleController;
use App\Http\Controllers\RecolteController;
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
Route::post('culture/creat',[CulturController::class, 'creat'])->name('culture.creat');
Route::delete('culture/delete',[CulturController::class, 'destroy'])->name('culture.delete');

Route::get('ressource',[CulturController::class, 'show'])->name('culture.ressource');
Route::post('ressource/store',[CulturController::class, 'add'])->name('culture.storeRessource');
Route::put('ressource/update',[CulturController::class, 'edit'])->name('culture.updateRessource');
Route::delete('ressource/delete',[CulturController::class, 'delet'])->name('culture.deleteRessource');

/* la fin de route */

/* le route pour le recolte */
Route::get('/recolte',[RecolteController::class, 'index'])->name('recolte.index');
Route::get('recolte/store',[RecolteController::class, 'store'])->name('recolte.store');
Route::post('recolte/creat',[RecolteController::class, 'creat'])->name('recolte.creat');
Route::delete('recolte/delete',[RecolteController::class, 'destroy'])->name('recolte.delete');

Route::get('/ressource/show',[RecolteController::class, 'show'])->name('ressource.show');
Route::post('ressource/recolet/store',[RecolteController::class, 'add'])->name('ressource.storeRessource');
Route::put('ressource/recolte/update',[RecolteController::class, 'update'])->name('ressource.updateRessource');
Route::delete('ressource/recolte/delete',[RecolteController::class, 'delete'])->name('ressource.deleteRessource');

/* la fin de route */

/* le route pour le control de qualite */
Route::get('/control_qualite',[CqualiteController::class, 'index'])->name('control_qualite.index');
Route::post('control_qualite/store',[CqualiteController::class, 'add'])->name('control_qualite.store');
Route::put('control_qualite/update',[CqualiteController::class, 'update'])->name('control_qualite.update');
Route::delete('control_qualite/delete',[CqualiteController::class, 'destroy'])->name('control_qualite.delete');

/* la fin de route */


/* le route pour le finance */
Route::get('/finance',[FinanceCultureController::class, 'index'])->name('finance.index');
Route::post('finance/store',[FinanceCultureController::class, 'store'])->name('finance.store');
Route::put('finance/update',[FinanceCultureController::class, 'updat'])->name('finance.update');
Route::delete('finance/delete',[FinanceCultureController::class, 'destroy'])->name('finance.delete');

Route::get('/finance_recolte',[FinanceCultureController::class, 'show'])->name('finance_recolte.show');
Route::post('finance/add',[FinanceCultureController::class, 'add'])->name('finance_recolte.add');
Route::put('finance/edit',[FinanceCultureController::class, 'edit'])->name('finance_recolte.edit');
Route::delete('finance/delete',[FinanceCultureController::class, 'delete'])->name('finance_recolte.delete');

Route::get('/finance_employe',[FinanceCultureController::class, 'show2'])->name('finance_employe.show');
Route::post('finance_employe/add',[FinanceCultureController::class, 'add2'])->name('finance_employe.add');
Route::put('finance_employe/edit',[FinanceCultureController::class, 'edit2'])->name('finance_employe.edit');
Route::delete('finance_employe/delete',[FinanceCultureController::class, 'delete2'])->name('finance_employe.delete');


/* la fin de route */

Route::get('/empty',function(){
    return view('empty');
});

Route::fallback(function () {
    return view('404');
});