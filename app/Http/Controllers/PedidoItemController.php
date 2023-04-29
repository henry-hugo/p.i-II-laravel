<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\Carrinho;
use App\Models\ProdutoImagem;
use App\Models\PedidoItem;
use Illuminate\Support\Facades\Auth;

class PedidoItemController extends Controller
{
    public function index($pedido){

        $pedidos = Pedido::where('PEDIDO_ID', $pedido)->get();
        $enderecos = Endereco::where('USUARIO_ID',$pedidos[0]->USUARIO_ID)->get();

        $carrinho = PedidoItem::where('PEDIDO_ID', $pedido)->get();

        $produtos = Carrinho::where('USUARIO_ID',$pedidos[0]->USUARIO_ID)->whereIn('PRODUTO_ID', $carrinho[]['PRODUTO_ID'])->get();


        return view ('carrinho.show', compact('enderecos', 'pedidos' ,'produtos','carrinho'));

    }
}
