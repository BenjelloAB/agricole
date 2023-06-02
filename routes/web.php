<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CqualiteController;
use App\Http\Controllers\CulturController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\FinanceCultureController;
use App\Http\Controllers\ParcelleController;
use App\Http\Controllers\RecolteController;
use App\Models\Categorie;
use App\Models\Cultur;
use App\Models\Employe;
use App\Models\Finance_employe;
use App\Models\List_Legume;
use App\Models\Parcelle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Calendar;
use App\Models\Event;

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
// Livewire::component('calendar', Calendar::class);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
if (Auth::check() && Auth::user()->role == 0) {
    $count_emp = Employe::where('user_id', auth()->user()->id)->count('id');
    $count_parcelle = Parcelle::where('user_id', auth()->user()->id)->count('id');

    $cout_semences = DB::table('finance__cultures')->where('user_id', auth()->user()->id)->sum('coût_semences');
    $cout_engrais = DB::table('finance__cultures')->where('user_id', auth()->user()->id)->sum('coût_engrais');
    $cout_pesticides = DB::table('finance__cultures')->where('user_id', auth()->user()->id)->sum('coût_pesticides');
    $cout_machines_culture = DB::table('finance__cultures')->where('user_id', auth()->user()->id)->sum('coût_machines_culture');
    $cout_consommation_eau = DB::table('finance__cultures')->where('user_id', auth()->user()->id)->sum('cout_consommation_eau');

    $cout_total = $cout_semences + $cout_engrais + $cout_pesticides + $cout_machines_culture + $cout_consommation_eau;

    $cout_recolte= DB::table('finance__recoltes')->where('user_id', auth()->user()->id)->sum('coût_récolte');
    $employe = DB::table('finance_employes')->where('user_id', auth()->user()->id)->sum('salair');

    $hhh = Finance_employe::where('user_id', auth()->user()->id)->paginate(3);

    $cout_CRE = $cout_total + $cout_recolte + $employe;
    $legumeData = Cultur::where('user_id', auth()->user()->id)->select('nom', DB::raw('COUNT(*) as count'))
    ->groupBy('nom')
    ->get();

    $employee=Employe::where('user_id', auth()->user()->id)->get();
    $categorie= Categorie::where('user_id', auth()->user()->id)->get();
    $user =   User::where('id',auth()->user()->id)->pluck('capital')->first();

    return view('dashboard', compact('count_emp', 'count_parcelle', 'cout_CRE', 'hhh', 'legumeData', 'employee', 'categorie','user'));
} else {
    return redirect()->route('admin');
}
})->middleware(['auth'])->name('dashboard');


/* le route pour le parcelle */
Route::get('/parcelle',[ParcelleController::class, 'index'])->middleware(['auth'])->name('parcelle.index');
Route::post('parcelle/store',[ParcelleController::class, 'store'])->middleware(['auth'])->name('parcelle.store');
Route::put('parcelle/update',[ParcelleController::class, 'update'])->middleware(['auth'])->name('parcelle.update');
Route::delete('parcelle/delete',[ParcelleController::class, 'destroy'])->middleware(['auth'])->name('parcelle.delete');
/* la fin de route */


/* le route pour le employe */
Route::get('/employe',[EmployeController::class, 'index'])->middleware(['auth'])->name('employe.index');

Route::get('employe/store',[EmployeController::class, 'store'])->middleware(['auth'])->name('employe.store');

Route::post('employe/create',[EmployeController::class, 'create'])->middleware(['auth'])->name('employe.create');

Route::put('employe/update',[EmployeController::class, 'update'])->middleware(['auth'])->name('employe.update');
Route::delete('employe/delete',[EmployeController::class, 'destroy'])->middleware(['auth'])->name('employe.delete');
/* la fin de route */

/* le route pour le culture */
Route::get('/culture',[CulturController::class, 'index'])->middleware(['auth'])->name('culture.index');
Route::get('culture/store',[CulturController::class, 'store'])->middleware(['auth'])->name('culture.store');
Route::post('culture/creat',[CulturController::class, 'creat'])->middleware(['auth'])->name('culture.creat');
Route::delete('culture/delete',[CulturController::class, 'destroy'])->middleware(['auth'])->name('culture.delete');

Route::get('ressource',[CulturController::class, 'show'])->middleware(['auth'])->name('culture.ressource');
Route::post('ressource/store',[CulturController::class, 'add'])->middleware(['auth'])->name('culture.storeRessource');
Route::put('ressource/update',[CulturController::class, 'edit'])->middleware(['auth'])->name('culture.updateRessource');
Route::delete('ressource/delete',[CulturController::class, 'delet'])->middleware(['auth'])->name('culture.deleteRessource');

/* la fin de route */

/* le route pour le recolte */
Route::get('/recolte',[RecolteController::class, 'index'])->middleware(['auth'])->name('recolte.index');
Route::get('recolte/store',[RecolteController::class, 'store'])->middleware(['auth'])->name('recolte.store');
Route::post('recolte/creat',[RecolteController::class, 'creat'])->middleware(['auth'])->name('recolte.creat');
Route::delete('recolte/delete',[RecolteController::class, 'destroy'])->middleware(['auth'])->name('recolte.delete');

Route::get('/ressource/show',[RecolteController::class, 'show'])->middleware(['auth'])->name('ressource.show');
Route::post('ressource/recolet/store',[RecolteController::class, 'add'])->middleware(['auth'])->name('ressource.storeRessource');
Route::put('ressource/recolte/update',[RecolteController::class, 'update'])->middleware(['auth'])->name('ressource.updateRessource');
Route::delete('ressource/recolte/delete',[RecolteController::class, 'delete'])->middleware(['auth'])->name('ressource.deleteRessource');

/* la fin de route */

/* le route pour le control de qualite */
Route::get('/control_qualite',[CqualiteController::class, 'index'])->middleware(['auth'])->name('control_qualite.index');
Route::post('control_qualite/store',[CqualiteController::class, 'add'])->middleware(['auth'])->name('control_qualite.store');
Route::put('control_qualite/update',[CqualiteController::class, 'update'])->middleware(['auth'])->name('control_qualite.update');
Route::delete('control_qualite/delete',[CqualiteController::class, 'destroy'])->middleware(['auth'])->name('control_qualite.delete');

/* la fin de route */


/* le route pour le finance */
Route::get('/finance',[FinanceCultureController::class, 'index'])->middleware(['auth'])->name('finance.index');
Route::post('finance/store',[FinanceCultureController::class, 'store'])->middleware(['auth'])->name('finance.store');
Route::put('finance/update',[FinanceCultureController::class, 'updat'])->middleware(['auth'])->name('finance.update');
Route::delete('finance/delete',[FinanceCultureController::class, 'destroy'])->middleware(['auth'])->name('finance.delete');

/* le route ajax */
Route::get('/plante/{id}',[FinanceCultureController::class, 'getplant']);
Route::get('/taille/{id}',[FinanceCultureController::class, 'gettaille']);
Route::get('/machine/{id}',[FinanceCultureController::class, 'getmachine']);
Route::get('/machine1/{id}',[FinanceCultureController::class, 'getmachine1']);
Route::get('/semences/{id}',[FinanceCultureController::class, 'getsemences']);
Route::get('/engrais/{id}',[FinanceCultureController::class, 'getengrais']);
Route::get('/pesticides/{id}',[FinanceCultureController::class, 'getpesticides']);
Route::get('/besoin_en_eau/{id}',[FinanceCultureController::class, 'getbesion']);
/* end route ajax */

Route::get('/finance_recolte',[FinanceCultureController::class, 'show'])->middleware(['auth'])->name('finance_recolte.show');
Route::post('finance_recolte/add',[FinanceCultureController::class, 'add'])->middleware(['auth'])->name('finance_recolte.add');
Route::put('finance_recolte/edit',[FinanceCultureController::class, 'edit'])->middleware(['auth'])->name('finance_recolte.edit');
Route::delete('finance_recolte/delete',[FinanceCultureController::class, 'delete'])->middleware(['auth'])->name('finance_recolte.delete');

Route::get('/finance_employe',[FinanceCultureController::class, 'show2'])->middleware(['auth'])->name('finance_employe.show');
Route::post('finance_employe/add',[FinanceCultureController::class, 'add2'])->middleware(['auth'])->name('finance_employe.add');
Route::put('finance_employe/edit',[FinanceCultureController::class, 'edit2'])->middleware(['auth'])->name('finance_employe.edit');
Route::delete('finance_employe/delete',[FinanceCultureController::class, 'delete2'])->middleware(['auth'])->name('finance_employe.delete');


/* la fin de route */

Route::get('/empty',function(){
    return view('empty');
})->middleware(['auth']);
Route::get('/total',function(){
     $cout_semences = DB::table('finance__cultures')->where('user_id',auth()->user()->id)->sum('coût_semences');
     $cout_engrais = DB::table('finance__cultures')->where('user_id',auth()->user()->id)->sum('coût_engrais');
     $cout_pesticides = DB::table('finance__cultures')->where('user_id',auth()->user()->id)->sum('coût_pesticides');
     $cout_machines_culture = DB::table('finance__cultures')->where('user_id',auth()->user()->id)->sum('coût_machines_culture');
     $cout_consommation_eau = DB::table('finance__cultures')->where('user_id', auth()->user()->id)->sum('cout_consommation_eau');

     $cout_total = $cout_semences + $cout_engrais + $cout_pesticides + $cout_machines_culture + $cout_consommation_eau;

     $cout_recolte= DB::table('finance__recoltes')->where('user_id',auth()->user()->id)->sum('coût_récolte');
     $employe = DB::table('finance_employes')->where('user_id',auth()->user()->id)->sum('salair');

     $user = User::where('id',auth()->user()->id)->pluck('capital')->first();
     $cout_CRE = $cout_total + $cout_recolte + $employe;
    return view('finance.total',compact('cout_total','cout_recolte','employe','cout_CRE','user'));

})->middleware(['auth'])->name('total');



// Route::post('/categories', [CategorieController::class,'enregistrerCategorie'])->name('categories.store');

Route::post('/categories', [CategorieController::class,'enregistrerCategorie'])->name('categories.store');

Route::get('/chart', [CategorieController::class,'index']);

Route::post('/events', [CategorieController::class, 'store'])->name('events.store');


Route::fallback(function () {
    return view('404');
});

/* le route pour le admin */

    Route::get('/respo', [AdminController::class, 'index'])->middleware(['auth'])->name('respo.index');
    Route::post('respo/store', [AdminController::class, 'create'])->middleware(['auth'])->name('respo.store');
    Route::put('respo/update', [AdminController::class, 'edit'])->middleware(['auth'])->name('respo.update');
    Route::delete('respo/delete', [AdminController::class, 'destroy'])->middleware(['auth'])->name('respo.delete');


    Route::get('/index2/parcelle', [AdminController::class, 'index2'])->middleware(['auth'])->name('index2.parcelle');
    Route::get('/index3/employe/show', [AdminController::class, 'index3'])->middleware(['auth'])->name('index3.show');
    Route::get('/index4/culture', [AdminController::class, 'index4'])->middleware(['auth'])->name('index4.culture');
    Route::get('/index5/ressorce', [AdminController::class, 'index5'])->middleware(['auth'])->name('index5.ressorce');
    Route::get('/index6/recolte', [AdminController::class, 'index6'])->middleware(['auth'])->name('index6.recolte');
    Route::get('/index7/ressource', [AdminController::class, 'index7'])->middleware(['auth'])->name('index7.ressource');
    Route::get('/index8/control', [AdminController::class, 'index8'])->middleware(['auth'])->name('index8.control');
    Route::get('/index9/finance_culture', [AdminController::class, 'index9'])->middleware(['auth'])->name('index9.finance_culture');
    Route::get('/index10/finance_recolte', [AdminController::class, 'index10'])->middleware(['auth'])->name('index10.finance_recolte');
    Route::get('/index11/finance_employe', [AdminController::class, 'index11'])->middleware(['auth'])->name('index11.finance_employe');

/* la fin de route */

Route::get('/admin/dashboard',function(){
if (Auth::check() && Auth::user()->role == 1) {
     $nbr =count($users = User::where('role',0)->get());
     $ct = ($users = User::where('role',0)->sum('capital'));


      $cout_semences = DB::table('finance__cultures')->sum('coût_semences');
    $cout_engrais = DB::table('finance__cultures')->sum('coût_engrais');
    $cout_pesticides = DB::table('finance__cultures')->sum('coût_pesticides');
    $cout_machines_culture = DB::table('finance__cultures')->sum('coût_machines_culture');
    $cout_consommation_eau = DB::table('finance__cultures')->sum('cout_consommation_eau');

    $cout_total = $cout_semences + $cout_engrais + $cout_pesticides + $cout_machines_culture + $cout_consommation_eau;

    $cout_recolte= DB::table('finance__recoltes')->sum('coût_récolte');
    $employe = DB::table('finance_employes')->sum('salair');

    $count_emp = Employe::count('id');
    $cout_CRE = $cout_total + $cout_recolte + $employe;
    return view('admin',compact('nbr','ct','cout_CRE','count_emp'));

}
else{
    return redirect()->route('home');
}
})->middleware(['auth'])->name('admin');



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');