<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;

// Route::get('/', function () {
//     return view('welcome');
// });

// criar uma rota do controller
Route::match(['get','post'],'/',[UsuarioController::class,'create'])->name('produto.index');

Route::post('/',[UsuarioController::class,'store'])->name('registrar');

//
Route::get('/produto/{produto}',[ProdutoController::class, 'show'])->name('produto.show');
Route::match(['get','post'],'/categoria/{categoria}',[ProdutoController::class,'categoria'])->name('produto.categoria');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
