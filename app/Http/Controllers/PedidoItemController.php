<?php

namespace App\Http\Controllers;


use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\PedidoItem;

class PedidoItemController extends Controller
{
    public function index(Pedido $pedido){
        $enderecos = Endereco::where('USUARIO_ID',$pedido->USUARIO_ID)->get();
        $itens = PedidoItem::where([['PEDIDO_ID', '=', $pedido->PEDIDO_ID],['ITEM_QTD','>','0']])->get();
        return view ('carrinho.show', compact('enderecos', 'pedido' ,'itens'));
    }
}
 