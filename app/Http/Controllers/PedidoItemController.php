<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\ProdutoImagem;

class PedidoItemController extends Controller
{
    public function index($pedido){

        $pedidos = Pedido::where('PEDIDO_ID', $pedido)->get();
        $enderecos = Endereco::where('USUARIO_ID',$pedidos[0]->USUARIO_ID)->get();
        $produtos = Carrinho::where('USUARIO_ID',$pedidos[0]->USUARIO_ID)->get();
        

        return view ('carrinho.show')->with('enderecos', $enderecos)->with('pedidos' , $pedidos)->with('produtos', $produtos);

    }
}
