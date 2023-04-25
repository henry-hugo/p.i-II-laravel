<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Carrinho;
use App\Models\PedidoItem;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function store(Request $request , $usuario){
        
        $pedido = Pedido::create([
            'USUARIO_ID'=> $usuario,
            'STATUS_ID'=> 1 ,
            'PEDIDO_DATA'=> date('y-m-d')
        ]);

        $itens = Carrinho::where('USUARIO_ID', Auth::user()->USUARIO_ID)->get();


        foreach($itens as $item){
            $item->update([
                'ITEM_QTD'=> 0
            ]);

            PedidoItem::create([
                'PRODUTO_ID'=> $item->PRODUTO_ID,
                'PEDIDO_ID'=> $pedido->PEDIDO_ID,
                'ITEM_QTD'=> $item->ITEM_QTD,
                'ITEM_PRECO'=> $item->Produto->PRODUTO_PRECO
            ]);
        }

        return redirect(route('carrinho.checkout'));
    }
}
