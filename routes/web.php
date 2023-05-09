<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoItemController; 

// Route::get('/', function () {
//     return view('welcome');
// });

// criar uma rota do controller
Route::match(['get','post'],'/',[UsuarioController::class,'create'])->name('produto.index');

Route::post('/',[UsuarioController::class,'store'])->name('registrar');

Route::get('/dashboard', function(){
    return redirect(route('produto.index'));
});

//
Route::get('/produto/{produto}',[ProdutoController::class, 'show'])->name('produto.show');
Route::match(['get','post'],'/categoria/{categoria}',[ProdutoController::class,'categoria'])->name('produto.categoria');

route::post('/carrinho/{produto}',[CarrinhoController::class,'store'])->name('carrinho.store');
route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');

route::get('/carrinho/pagamento', [CarrinhoController::class, 'pagamento'])->name('carrinho.pagamento');

route::post('/endereco/{USUARIO_ID}',[EnderecoController::class, 'store'])->name('endereco');

route::post('/carrinho/pagamento/{USUARIO_ID}',[PedidoController::class, 'store'])->name('finalizar');

route::get('/carrinho/checkout',[CarrinhoController::class, 'checkout'])->name('carrinho.checkout');

route::post('/pedido/{pedido}',[PedidoItemController::class, 'index'])->name('carrinho.pedido');


Route::get('/', function () {
    return view('produto.index');
})->middleware(['auth', 'verified'])->name('produto.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
