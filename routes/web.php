<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FournisseurControler;
use App\Http\Controllers\ProduitControler;
use App\Http\Controllers\EtablissementControler;
use App\Http\Controllers\ReceptionControler;
use App\Http\Controllers\FormControler;
use App\Http\Controllers\StockController;



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

Route::get('/fournisseurs',[FournisseurControler::class,'index'])->name('fournisseurs.index');

Route::get('/fournisseurs/create',[FournisseurControler::class,'create'])->name('fournisseurs.create');
Route::post('/fournisseurs',[FournisseurControler::class,'store'])->name('fournisseurs.store');
Route::get('/fournisseurs/{fournisseur}/edit',[FournisseurControler::class,'edit'])->name('fournisseurs.edit');
Route::put('/fournisseurs/{fournisseur}',[FournisseurControler::class,'update'])->name('fournisseurs.update');
Route::delete('/fournisseurs/{fournisseur}',[FournisseurControler::class,'destroy'])->name('fournisseurs.destroy');


Route::get('/produits',[ProduitControler::class,'index'])->name('produits.index');

Route::get('/produits/create',[ProduitControler::class,'create'])->name('produits.create');
Route::post('/produits',[ProduitControler::class,'store'])->name('produits.store');
Route::get('/produits/{produit}/edit',[ProduitControler::class,'edit'])->name('produits.edit');
Route::put('/produits/{produit}',[ProduitControler::class,'update'])->name('produits.update');
Route::delete('/produits/{produit}',[ProduitControler::class,'destroy'])->name('produits.destroy');



Route::get('/etablissements',[EtablissementControler::class,'index'])->name('etablissements.index');

Route::get('/etablissements/create',[EtablissementControler::class,'create'])->name('etablissements.create');
Route::post('/etablissements',[EtablissementControler::class,'store'])->name('etablissements.store');
Route::get('/etablissements/{etablissement}/edit',[EtablissementControler::class,'edit'])->name('etablissements.edit');
Route::put('/etablissements/{etablissement}',[EtablissementControler::class,'update'])->name('etablissements.update');
Route::delete('/etablissements/{etablissement}',[EtablissementControler::class,'destroy'])->name('etablissements.destroy');


Auth::routes();

Route::get('/receptions/{reception}',[ReceptionControler::class,'index'])->name('receptions.index');
//Route::get('/receptions/{reception}',[ReceptionControler::class,'index'])->name('receptions.index');



Route::get('/', function () {
    return redirect('form/select');
});
Route::get('/form/select', [App\Http\Controllers\FormControler::class, 'index'])->name('form/select');
Route::post('/form/select',[App\Http\Controllers\FormControler::class,'store'])->name('form.store');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('em/dashboard', [App\Http\Controllers\HomeController::class, 'emDashboard'])->name('em/dashboard');


Route::get('/stock',[StockController::class,'index'])->name('stock.index');
Route::get('/stock/create',[StockController::class,'create'])->name('stock.create');
Route::post('/stock',[StockController::class,'store'])->name('stock.store');
Route::get('/stock/{stock}/edit',[StockController::class,'edit'])->name('stock.edit');
Route::put('/stock/{stock}',[StockController::class,'update'])->name('stock.update');
Route::delete('/stock/{stock}',[StockController::class,'destroy'])->name('stock.destroy');