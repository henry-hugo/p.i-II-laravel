<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;




// Route::get('/', function () {
//     return view('welcome');
// });

// criar uma rota do controller

Route::get('/',[ProdutoController::class,'index'])->name('produto.index');
Route::post('/',[ProdutoController::class,'store'])->name('produto.index');


//
Route::get('/produto/{produto}',[ProdutoController::class, 'show'])->name('produto.show');