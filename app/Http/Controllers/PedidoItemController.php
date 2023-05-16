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
    public function index(Pedido $pedido){
        $enderecos = Endereco::where('USUARIO_ID',$pedido->USUARIO_ID)->get();
        $items = PedidoItem::where([['PEDIDO_ID', '=', $pedido->PEDIDO_ID],['ITEM_QTD','>','0']])->get();
        return view ('carrinho.show', compact('enderecos', 'pedido' ,'items'));
    }
}
