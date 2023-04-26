<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FournisseurControler;
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

