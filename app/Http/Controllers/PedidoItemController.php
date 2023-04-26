<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Pedido;

class PedidoItemController extends Controller
{
    public function index($pedido){

        $pedidos = Pedido::where('PEDIDO_ID', $pedido)->get();


        $enderecos = Endereco::where('USUARIO_ID',$pedidos[0]->USUARIO_ID)->get();
        return view ('carrinho.show')->with('endereco', $endereco);

    }
}
