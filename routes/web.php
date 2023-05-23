<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoItemController; 
use App\Http\Controllers\ProfileController; 

// Route::get('/', function () {
//     return view('welcome');
// });

// criar uma rota do controller
Route::get('/dashboard', function(){
    return redirect(route('produto.index'));
});

//
Route::get('/perfil',[ProfileController::class, 'index'])->name('perfil');
Route::get('/produto/{produto}',[ProdutoController::class, 'show'])->name('produto.show');
Route::match(['get','post'],'/categoria/{categoria}',[ProdutoController::class,'categoria'])->name('produto.categoria');

Route::post('/carrinho/{produto}',[CarrinhoController::class,'store'])->name('carrinho.store');
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');

Route::get('/carrinho/pagamento', [CarrinhoController::class, 'pagamento'])->name('carrinho.pagamento');

Route::post('/endereco/{USUARIO_ID}',[EnderecoController::class, 'store'])->name('endereco');

Route::post('/carrinho/pagamento/{USUARIO_ID}',[PedidoController::class, 'store'])->name('finalizar');

Route::get('/carrinho/checkout',[CarrinhoController::class, 'checkout'])->name('carrinho.checkout');

Route::post('/pedido/{pedido}',[PedidoItemController::class, 'index'])->name('carrinho.pedido');


Route::get('/', function () {
    return view('produto.index')->with('produtos', \App\Models\Produto::where('PRODUTO_ATIVO', 1)->orderBy('PRODUTO_ID')->cursorPaginate(20));
})->middleware(['auth', 'verified'])->name('produto.index');


require __DIR__.'/auth.php';
