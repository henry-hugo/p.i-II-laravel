<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\Usuario;

// Route::get('/', function () {
//     return view('welcome');
// });

// criar uma rota do controller
Route::post('/',[Usuario::class,'store'])->name('produto.index');
Route::match(['get','post'],'/',[ProdutoController::class,'index'])->name('produto.index');

//
Route::get('/produto/{produto}',[ProdutoController::class, 'show'])->name('produto.show');